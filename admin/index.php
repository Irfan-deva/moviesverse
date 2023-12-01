<?php
session_start();
session_regenerate_id(true);
if (!isset($_SESSION['user'])) {
  header('Location: ./auth/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/index.css">
  <title>ADMIN</title>
</head>

<body>
  <div class="wrapper">
    <div class="header">
      <div class="cta-cat">
        <a href="">MOVIES</a>
        <a href="">ANIME</a>
        <a href="">SERIES</a>
      </div>

    </div>
    <div class="main">
      <div class="container">
        <div class="cta-addnew"><button id="add">ADD NEW +</button></div>
        <div class="content">

        </div>

      </div>
    </div>
    <!-- popups -->

  </div>

  <div class="form-popup">
    <form method="post" id="form" enctype="multipart/form-data">
      <span class="form-heading">Add movie</span>
      <hr>
      <div class="response"></div>
      <div> <label for="title">Movie title</label>
        <input type="text" name="title" id="title">
      </div>

      <div> <label for="query-string">Query string</label>
        <input type="text" name="query-string" id="query-string">
      </div>

      <div> <label for="link">Movie link</label>
        <input type="text" name="link" id="link">
      </div>

      <div> <label for="cover">Cover</label>
        <input type="file" id="cover" name="cover">
      </div>

      <div> <label for="desc">Movie description</label>
        <textarea name="desc" id="desc" cols="auto" rows="6"></textarea>
      </div>

      <input type="submit" value="submit" id="submit" />
      <span id="cancel" aria-hidden="true" onclick="hideAddForm()">&times;</span>
    </form>
  </div>
  <!-- form popup ends -->
  <!-- edit popup -->
  <div class="edit-popup-bg">
    <form method="post" id="edit-form">

    </form>
  </div>
  <!-- delete confirmation popup -->
  <div class="alert-bg">

  </div>
  <script src="./assets/js/jquery-3.6.1.min.js"></script>
  <script src="./assets/js/script.js" type="text/javascript"></script>

</body>

</html>