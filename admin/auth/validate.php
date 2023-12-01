<?php
session_start();
include('../../database/connection.php');
if ($con) {
  if (isset($_POST['user']) && isset($_POST['pwd'])) {
    if (!empty($_POST['user']) && !empty($_POST['pwd'])) {
      $UID = $_POST['user'];
      $PWD = $_POST['pwd'];
      $loginQuery = "SELECT * FROM `admin` WHERE `_admin_id` = '{$UID}' AND `_pwd` = '{$PWD}'";
      $qResult = mysqli_query($con, $loginQuery);
      if (mysqli_num_rows($qResult) == 1) {
        $_SESSION['user'] = $UID;
        // header('Location: ../index.php');
        $result['res'] = 0;
        $result['message'] = 'login successfull';
      } else {
        $result['res'] = 1;
        $result['message'] = 'invalid username or password';
      }
    } else {
      $result['res'] = 2;
      $result['message'] = 'all fields are required';
    }
  }
} else {
  $result['res'] = 4;
  $result['message'] = 'server error';
}
echo json_encode($result);
