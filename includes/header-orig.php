<!DOCTYPE html>
<html lang="en">
<?php
function base_url()
{
  return sprintf(
    "%s://%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME']
  );
}
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- remove /practice in production -->
  <link rel="stylesheet" href=<?php echo base_url() . "/practice/assets/css/index.css" ?>>
  <title><?php echo TITLE ?> </title>
</head>

<body>
  <div class="header">
    <div class="top">
      <div class="logo"><span>Moviesverse</span></div>
      <div class="menu">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="container">
      <div class="navlist">
        <ul>
          <!-- remove /practice in production -->
          <li class=<?php echo ($PAGE == "HOME") ? 'active' : '' ?>><a href=<?php echo base_url() . "/practice/"; ?>>Home</a></li>
          <li class=<?php echo ($PAGE == "MOVIES") ? 'active' : '' ?>><a href=<?php echo base_url() . "/practice/cat/movies/"; ?>>Movies</a></li>
          <li class=<?php echo ($PAGE == "SERIES") ? 'active' : '' ?>><a href=<?php echo base_url() . "/practice/cat/series"; ?>>Series</a></li>
          <li class=<?php echo ($PAGE == "ANIME") ? 'active' : '' ?>><a href=<?php echo base_url() . "/practice/cat/anime"; ?>>Anime</a></li>

        </ul>
      </div>

      <div class="search">
        <input type="text" id="filter" class="search-box" placeholder="search movies series etc...">
        <div class="search-icon">
          <!-- remove /practice in production -->
          <img src=<?php echo base_url() . "/practice/assets/images/search-ic.png"; ?> alt="" width="20">
        </div>
      </div>

    </div>
  </div>