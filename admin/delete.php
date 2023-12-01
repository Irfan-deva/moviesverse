<?php
include('../database/connection.php');
if (isset($_POST['movie_id'])) {
  $id =  $_POST['movie_id'];
  $deleteQuery = "DELETE FROM `movies` WHERE `_id` = {$id}";
  if (mysqli_query($con, $deleteQuery)) {
    $result['status'] = '1';
    $result['message'] = 'deleted successfully';
  } else {
    $result['status'] = '0';
    $result['message'] = 'error while deleting';
  }
  echo json_encode($result);
} else {
  header('Location:http://localhost/movieverse');
}
