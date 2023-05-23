<!DOCTYPE html>
<html lang="en">

<?php
include_once "parts/head.php";
include_once "scripts.php";
$gamesOBJ = new games();
$games = $gamesOBJ->getGames();
$genresOBJ = new games();
$genre = $genresOBJ->getGenre();
?>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <?php
  include_once "parts/header.php";
  ?>
  <!-- ***** Header Area End ***** -->

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Our Shop</h3>
          <span class="breadcrumb"><a href="#">Home</a> > Our Shop</span>
        </div>
      </div>
    </div>
  </div>

  <div class="section trending">
    <div class="container">
      <ul class="trending-filter">
        <li>
          <a class="is_active" href="#!" data-filter="*">Show All</a>
        </li>
<!--        <li>
          <a href="#!" data-filter=".Action">Action</a>
        </li>
        <li>
          <a href="#!" data-filter=".Strategy">Strategy</a>
        </li>
        <li>
          <a href="#!" data-filter=".rac">Racing</a>
        </li>
          <li>
              <a href="#!" data-filter=".sim">Simulator</a>
          </li>-->
          <?php echo $genresOBJ->printGenre_name($genre); ?>
      </ul>
      <div class="row trending-box">
          <?php echo $gamesOBJ->printGames($games); ?>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <ul class="pagination">
          <li><a href="#"> &lt; </a></li>
            <li><a href="#">1</a></li>
            <li><a class="is_active" href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#"> &gt; </a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <?php
  include_once "parts/footer.php";
  ?>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>

  </body>
</html>