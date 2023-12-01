
$('document').ready(function () {
  $('#login-form').on('submit', function (e) {

    $.ajax({
      url: './validate.php',
      type: 'POST',
      data: new FormData(this),
      processData: false,
      contentType: false,
      success: function (res) {
        let result = JSON.parse(res);
        if (result.res == 0) {
          window.location.replace('../');
        }
      }
    })
    e.preventDefault();
  })
})

