<?php
require_once('../database/connection.php');
if (isset($_POST['queryString'])) {
  $qString = mysqli_escape_string($con, $_POST['queryString']);
  if (!empty($qString)) {
    $getItemByIdQuery = "SELECT * FROM `movies` WHERE `query_string` = '{$qString}'";
    $result = $result = mysqli_query($con, $getItemByIdQuery);
    if (mysqli_num_rows($result) > 0) {
      $dataArray = array();
      while ($row = mysqli_fetch_assoc($result)) {
        $dataArray[] = $row;
      }
      echo json_encode($dataArray);
    }
  }
} else {
  //this will take user back to home page if he/she tries to access this php file
  header('Location:/movieverse'); //remove movieverse in production
}
