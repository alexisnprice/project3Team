<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>NovaEats</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template 
  <link href="css/landing-page.min.css" rel="stylesheet">-->
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="theme/vendor/bootstrap/css/bootstrap-grid.css">
</head>

<body>
    <?php
    //Loads header.php so the page has a header
        include "header.php";
    ?>
    <!-- Mast Head -->
    <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">Look no further than NovaEats to decide what your next meal will be!</h1>
        </div>
      </div>
    </div>
  </header>

    <!-- Icons -->
  <section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <img src="imgs/onCampus.png">
            </div>
            <h3>On Campus</h3>
            <p class="lead mb-0">See which Dining Halls and A La Carte options are right for you!</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
             <img src="imgs/delivery.png">
            </div>
            <h3>Delivery</h3>
            <p class="lead mb-0">Check out a bunch of local restaurants that will deliver to campus!</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <img src="imgs/nearBy.png">
            </div>
            <h3>Near By</h3>
            <p class="lead mb-0">All of these options are a short walk or drive away!</p>
          </div>
        </div>
      </div>
    </div>
  </section>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
    </body>
</html>