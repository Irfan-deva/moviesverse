<?php
require('../database/connection.php');

$countQuery = "SELECT * FROM `movies`";
$count = 0;
$result = mysqli_query($con, $countQuery);
if ($result) {
  $count = mysqli_num_rows($result);
} else {
  echo json_encode(array("rescode" => 1, "data" => "no record found"));
}

if (isset($_POST['page-number']) && isset($_POST['limit'])) {
  $page = $_POST['page-number'];
  $limit = $_POST['limit'];
} else {
  $page = 1;
}
$offset = ($page - 1) * $limit;
$fetchQuery = "SELECT * FROM `movies` LIMIT {$offset} , {$limit}";
$fetchResult = mysqli_query($con, $fetchQuery);
if (mysqli_num_rows($fetchResult) > 0) {
  $dataArray = array();
  while ($row = mysqli_fetch_assoc($fetchResult)) {
    $dataArray[] = $row;
  }
  echo json_encode(array(
    "rescode" => 0,
    "total_records" => $count,
    "data" => $dataArray
  ));
} else {
  echo json_encode(array("rescode" => 1, "data" => "no record found"));
}
