<?php

if (!isset($_GET['q'])) {
  header('Location:index.php');
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $_GET['q'] ?></title>
</head>

<body>
  <h1>DETAILS PAGE</h1>
  <div class="details-container">

  </div>
  <script src="http://localhost/movieverse/admin/assets/js/jquery-3.6.1.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $.ajax({
        url: 'http://localhost/movieverse/admin/get_details.php',
        type: 'POST',
        data: {
          'queryString': '<?= $_GET['q'] ?>'
        },
        success: function(res) {
          console.log(res);
          let data = JSON.parse(res);

          let divContent =
            `<p>${data[0]._name}</p>
           <p>${data[0]._desc}</p>
           <h4>LINKS</h4>
           <span>720px</span> : <a href=${data[0]._link}>DOWNLOAD</a>
           `;
          $('.details-container').html(divContent);
        }
      })
    })
  </script>
</body>

</html>