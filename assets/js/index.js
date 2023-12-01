function viewDetails(q) {
  window.location.href = `/movieverse/movie/${q}/`;
}
// swiper
var swiper = new Swiper(".mySwiper", {
  slidesPerView: 5,
  spaceBetween: 16,
  breakpoints: {
    0: {
      slidesPerView: 2
    },
    520: {
      slidesPerView: 3
    },
    800: {
      slidesPerView: 4
    },
    1024: {
      slidesPerView: 5
    },
  }
}
);


$('documen').ready(function () {

  function loadMovies(page, limit) {
    $.ajax({
      url: './admin/fetchdata.php',
      type: 'POST',
      data: {
        'page-number': page,
        'limit': limit
      },
      success: function (res) {
        let data = JSON.parse(res);
        let cards = "";
        console.log(JSON.parse(res));
        if (data.rescode == 0) {
          let num = "";
          for (row in data.data) {
            if (row == 0) {
              num = 'ist'
            } else if (row == 1) {
              num = 'second'
            } else if (row == 2) {
              num = 'third'
            } else {
              num = 'fourth'
            }
            let id = data.data[row]._id;
            let name = (data.data[row]._name + "").replace("'", "&#39");;
            let link = data.data[row]._link;
            let desc = (data.data[row]._desc + "").replace("'", "&#39");
            let queryString = data.data[row].query_string;
            cards +=
              `<div class="card swiper-slide" onclick='viewDetails("${queryString}")'>
              <div class="card-header"><img src="./uploads/spiderman.jpeg" alt=""></div>
              <div class="card-footer">
              <span >${name}</span>
              </div>
              </div>`
          }
          $('.__movies').html(cards);
          $('.__latest').html(cards);
          $('.__popular').html(cards);

        }
      }
    })
  }

  loadMovies(1, 5);
})