<?php
define("TITLE", "HOME | Moviesverse");
$PATH = "./assets/css/index.css";
$PAGE = 'HOME';
include("includes/header.php"); ?>

<div class="main">
  <div class="movies">
    <div class="cats">
      <div class="cat">
        <img src="./assets/icons/videocam-ic.png" alt="">
        <span class="cat-title">Movies</span>
      </div><a href="./movies" class="view-all">View All &gt;&gt;</a>

    </div>
    <!-- Swiper -->
    <div class="swiper mySwiper">
      <div class="swiper-wrapper __movies">


      </div>

    </div>

  </div>
  <hr>
  <div class="latest">
    <div class="cats">
      <div class="cat">
        <img src="./assets/icons/videocam-ic.png" alt="">
        <span class="cat-title">Latest</span>
      </div><a href="./all/movies/" class="view-all">View All &gt;&gt;</a>
    </div>
    <div class="swiper mySwiper">
      <div class="swiper-wrapper __latest">


      </div>

    </div>
  </div>

  <hr>
  <div class="popular">
    <div class="cats">
      <div class="cat">
        <img src="./assets/icons/videocam-ic.png" alt="">
        <span class="cat-title">Popular</span>
      </div><a href="viewall.php?all=popular" class="view-all">View All &gt;&gt;</a>
    </div>
    <div class="swiper mySwiper">
      <div class="swiper-wrapper __popular">


      </div>

    </div>
  </div>
</div>
<?php include("includes/footer.php"); ?>