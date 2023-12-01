<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/index.css">
  <title>Login</title>
</head>

<body>
  <div class="login-container">
    <form enctype="multipart/form-data" id="login-form">
      <span class="form-heading">Login</span>
      <hr>
      <div> <label for="user">User name</label>
        <input type="text" name="user" id="user">
      </div>

      <div> <label for="pwd">Password</label>
        <input type="password" name="pwd" id="pwd">
      </div>
      <input type="submit" value="Login">
    </form>
  </div>
  <script src="../assets/js/jquery-3.6.1.min.js"></script>
  <script src="../assets/js/login.js" type="text/javascript"></script>

</body>

</html>