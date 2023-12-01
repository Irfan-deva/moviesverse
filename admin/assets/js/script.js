
let addButton = $('#add');
let form = $('.form-popup');

// edit button
function showPopup() {
  $('.edit-popup-bg').css('display', 'flex');
}

function hideEditForm() {
  $('.edit-popup-bg').css('display', 'none');
}

function hideAddForm() {
  $('.form-popup').css('display', 'none');
}

// dismiss delete confirm popup
function dismiss() {
  $('.alert-bg').css('display', 'none');
}
// edit an entry
function editEntry(id, name, link, desc) {

  $formContent =
    '<span class="form-heading">Edit movie</span>'
    + '<hr>'
    + '<div class="response"></div>'
    + `<div> <label for="id">Id</label><input type="number" name="id" id="id" value=${id} readonly></div>`
    + `<div> <label for="title">Movie title</label><input type="text" name="title" id="title" value="${name}"></div>`
    + `<div> <label for="link">Movie link</label><input type="text" name="link" id="link" value="${link}"></div>`
    + '<div> <label for="cover">Cover</label><input type="file" id="cover" name="cover"></div>'
    + `<div> <label for="desc">Movie description</label><textarea name="desc" id="desc" cols="auto" rows="6" >${desc}</textarea></div>`
    + '<input type="submit" value="UPDATE" id="submit">'
    + ' <span id="cancel" aria-hidden="true" onclick="hideEditForm()">&times;</span>'

  $('.edit-popup-bg form').html($formContent);
  showPopup();
}
// delete an entry

function showDeletePopup(id) {
  let deleteAlert =
    `
  <div class="alert">
  <div class="head">
    <p>Are you sure you want to delete this entry?</p>
  </div>
  <div class="action"> <button id="cancel" onclick="dismiss()">Cancel</button> <button id="ok" onclick="deleteEntry('${id}')">Ok</button></div>
  </div>
  `;
  $('.alert-bg').html(deleteAlert);
  $('.alert-bg').css('display', 'flex');
}
function deleteEntry(id) {
  $.ajax({
    url: './delete.php',
    type: 'POST',
    data: {
      'movie_id': id
    },
    success: function (res) {
      console.log(res);
      let result = JSON.parse(res);
      dismiss();
      alert(result.message)
    },
    failed: function (res) {
      console.log(res);
    }
  })
}


$(document).ready(function () {
  addButton.on('click', function () {
    // form.show();
    form.css('display', 'flex');

  });
  // submit form
  $('#form').on('submit', function (e) {
    $.ajax({
      url: './upload.php',
      type: 'POST',
      data: new FormData(this),
      processData: false,
      contentType: false,
      success: function (res) {
        console.log(res);
        let data = JSON.parse(res);
        if (data.status == '1') {
          $('#form .response').html(`<span class="success">${data.message}<span>`);
        } else {
          $('#form .response').html(`<span class="error">${data.message}<span>`);
        }

      }
    });
    e.preventDefault();
  }); //submit form ends

  // update
  $('#edit-form').on('submit', function (e) {
    $.ajax({
      url: './update.php',
      type: 'POST',
      data: new FormData(this),
      processData: false,
      contentType: false,
      success: function (res) {
        let data = JSON.parse(res);
        if (data.status == '1') {
          $('#edit-form .response').html(`<span class="success">${data.message}<span>`);
        } else {
          $('#edit-form .response').html(`<span class="error">${data.message}<span>`);
        }
      }
    });
    e.preventDefault();
  });


  function fetchData(page) {
    let limit = 8;
    $.ajax({
      url: './fetchdata.php',
      type: 'POST',
      data: {
        'page-number': page,
        'limit': limit
      },
      success: function (response) {
        let data = JSON.parse(response);
        let tableRows = "";
        if (data.rescode == 0) {
          let totalRecords = data.total_records
          console.log(`total records ${totalRecords}`);
          //put table head in tableRows 
          tableRows +=
            `<table id="movie-table">
          <thead>
            <tr>
              <th>&num;</th>
              <th>POSTER</th>
              <th>NAME</th>
              <th>ACTIONS</th>
            </tr>
          </thead>
          <tbody id="table-body">`;
          for (row in data.data) {
            let id = data.data[row]._id;
            let name = (data.data[row]._name + "").replace("'", "&#39");;
            let link = data.data[row]._link;
            let desc = (data.data[row]._desc + "").replace("'", "&#39");
            let rowIndex = parseInt(row) + 1;
            //append table data to tableRows
            tableRows +=
              `<tr>
              <td>${rowIndex}</td>
              <td>poster.jpg</td>
              <td>${name}</td>
              <td><button class='edit-button' 
              onclick='editEntry("${id}","${name}","${link}","${desc}")'>EDIT</button> <button onclick='showDeletePopup("${id}")'>DELETE</button></td>
              </tr>`;

          }
          //append  tbody,table  closing  tags, also append new div at the end for pagination
          tableRows +=
            `</tbody>
            </table>
            <div id="pagination">`;
          let totalPages = Math.ceil(totalRecords / limit);
          for (i = 1; i <= totalPages; i++) {
            let mClass = "";
            if (page == i) {
              mClass = "active";
            } else {
              mClass = "";
            }
            //append pagination buttons/links
            tableRows += `<a href="" class='${mClass}' id='${i}'>${i}</a>`;
          }
          //append closing div for pagination
          tableRows += `</div>`;
          $('.content').html(tableRows);
        } else {
          console.log('error');
        }
      }
    })

  }
  //call fetchData when admin visits the admin page.
  fetchData(1);

  //call fetchData when admin clicks on any pagination button, pass buttons's id(which is page number) to the function
  $(document).on('click', '#pagination a', function (e) {
    e.preventDefault();
    let pageNumber = $(this).attr('id');
    fetchData(pageNumber)
  })

});