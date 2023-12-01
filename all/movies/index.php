<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../assets/css/index.css">
  <title>Document</title>
</head>

<body>
  <div class="main">
    <div class="wrapper">

      <div class="container movies">
        <div class="grid _movies">

        </div>
      </div>
    </div>
  </div>

  <script src="../../admin/assets/js/jquery-3.6.1.min.js"></script>
  <script>
    function viewDetails(id) {
      window.location.href = `../../details.php?id=${id}`;
    }

    $(document).ready(function() {
      function loadAll(page, limit) {
        $.ajax({
          url: '../../admin/fetchdata.php',
          type: 'POST',
          data: {
            'page-number': page,
            'limit': limit
          },
          success: function(res) {
            let data = JSON.parse(res);
            let cards = "";
            if (data.rescode == 0) {
              for (row in data.data) {
                let id = data.data[row]._id;
                let name = (data.data[row]._name + "").replace("'", "&#39");;
                let link = data.data[row]._link;
                let desc = (data.data[row]._desc + "").replace("'", "&#39");
                cards +=
                  `<div class="card" onclick='viewDetails(${id})'>
                   <div class="card-header"><img src="../../uploads/spiderman.jpeg" alt=""></div>
                   <div class="card-footer">
                   <span >${name}</span>
                   </div>
                   </div>`
              }
              $('.grid._movies').html(cards);
            }
          }
        })
      }
      loadAll(1, 12)
    })
  </script>
</body>

</html>