<?php
include('../database/connection.php');
if ($con) {
  if ((isset($_POST['title']) && isset($_POST['link']) && isset($_FILES['cover']) &&  isset($_POST['desc'])) && isset($_POST['query-string']) &&
    (!empty($_POST['title']) && !empty($_POST['link']) && ($_FILES['cover']['name'] != "") && !empty($_POST['desc']) && !empty($_POST['query-string']))
  ) {

    if (move_uploaded_file($_FILES['cover']['tmp_name'], '/opt/lampp/htdocs/movieverse/uploads/' . $_FILES['cover']['name'])) {
      $cover = $_FILES['cover']['name'];
      $title = mysqli_escape_string($con, $_POST['title']);
      $link = mysqli_escape_string($con, $_POST['link']);
      $desc = mysqli_escape_string($con, $_POST['desc']);
      $queryString = mysqli_escape_string($con, $_POST['query-string']);
      // default fields
      $isPub = '1';
      $cat = 'movie';

      $sql = "INSERT INTO movies(_name,_link,_desc,_cover,_cat,_isPub,query_string) VALUES('$title','$link','$desc','$cover','$cat','$isPub','$queryString')";
      if (mysqli_query($con, $sql)) {
        $result['status'] = '1';
        $result['message'] = 'movie added successfully';
      } else {
        $result['status'] = '0';
        $result['message'] = 'error' . mysqli_errno($con);
      }
    } else {
      $result['status'] = '2';
      $result['message'] = 'unable to load image';
    }
  } else {
    $result['status'] = '3';
    $result['message'] = 'error! all fields are required';
  }
} else {
  $result['status'] = '4';
  $result['message'] = 'error connecting to database';
}
echo json_encode($result);
