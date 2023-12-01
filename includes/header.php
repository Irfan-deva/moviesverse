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
  <link rel="stylesheet" href=<?php echo base_url() . "/movieverse/assets/css/index.css" ?>>
  <!-- Swiper JS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />


  <title><?php echo TITLE ?> </title>
</head>

<body>
  <div class="wrapper">
    <div class="header">
      <div class="top">
        <div class="logo"><img src=<?php echo base_url() . "/movieverse/assets/icons/logo.png"; ?> alt="logo"></div>
        <div class="navbar">
          <input type="checkbox" id="toggle-check">
          <label class="toggle active" for="toggle-check">
            <span></span>
            <span></span>
            <span></span>
          </label>
          <ul class="navlist">
            <!-- remove /practice in production -->
            <li><a href=<?php echo base_url() . "/movieverse/"; ?> class=<?php echo ($PAGE == "HOME") ? 'active' : '' ?>>Home</a></li>
            <li><a href=<?php echo base_url() . "/movieverse/dmca.php"; ?> class=<?php echo ($PAGE == "DMCA") ? 'active' : '' ?>>DMCA</a></li>
            <li><a href=<?php echo base_url() . "/movieverse/privacypolicy.php"; ?> class=<?php echo ($PAGE == "PRIVACYPOLICY") ? 'active' : '' ?>>Privacy policy</a></li>
            <li><a href=<?php echo base_url() . "/movieverse/contact.php"; ?> class=<?php echo ($PAGE == "CONTACT") ? 'active' : '' ?>>Contact us</a></li>
          </ul>

        </div>

      </div>
      <div class=<?php echo ($PAGE == "DMCA" || $PAGE == "CONTACT" || $PAGE == "PRIVACYPOLICY") ? '"search-container hide"' : "search-container" ?>>
        <div class="search">
          <input type="text" id="filter" class="search-box" placeholder="search movies series etc...">
          <div class="search-icon">
            <!-- remove /practice in production -->
            <img src=<?php echo base_url() . "/movieverse/assets/images/search-ic.png"; ?> alt="" width="20">
          </div>
        </div>

      </div>
    </div>