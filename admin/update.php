<?php
include('../database/connection.php');
if ($con) {
  if (isset($_POST['title']) && isset($_POST['link']) &&  isset($_POST['desc'])) {
    $id = $_POST['id'];
    $title = mysqli_escape_string($con, $_POST['title']);
    $link = mysqli_escape_string($con, $_POST['link']);
    $desc = mysqli_escape_string($con, $_POST['desc']);

    $updateQuery = "UPDATE movies SET `_name`='{$title}' , `_link`='{$link}',`_desc`='{$desc}' WHERE `_id` = {$id}";
    if (mysqli_query($con, $updateQuery)) {
      $result['status'] = '1';
      $result['message'] = 'updated successfully';
    } else {
      $result['status'] = '0';
      $result['message'] = 'error while updating';
    }
  } else {
    $result['status'] = '2';
    $result['message'] = 'fields have not been set';
  }
} else {
  $result['status'] = '3';
  $result['message'] = 'error connecting to database';
}
echo json_encode($result);
