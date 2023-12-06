<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Blog - Hotel Bravanto</title>
    <link href="<?=ROOT?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;1,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/96eab153a0.js" crossorigin="anonymous"></script>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <link href="<?=ROOT?>/assets/css/style.css" rel="stylesheet">
    <link href="<?=ROOT?>/assets/css/headers.css" rel="stylesheet">
</head>
<body>

  <?php include "includes/navbar.php"; ?>

<div class="container-fluid">
    <div class="row py-5 bg-hotel">
        <div class="col-12 my-5">
            <h1 class="display-3 ft-title-playfair text-center fst-italic text-decoration-underline">Reserve your stay...</h1>
        </div>
    </div>
</div>
<div class="container-fluid bg-res-form">
    <div class="row">
        <div class="col-md-5 m-3">
            <h2 class="my-5 ft-playfair text-center"><bold>Reserve now</bold></h2>
            <div class="my-5 text-center">
                <a href="<?=ROOT?>/res_anlegen"><i class="fa-solid fa-5x fa-square-plus"></i></a>
            </div>
        </div>
        <div class="col-md my-5 bg-primary">
            <div class="row my-5">
                <h1 class="ft-title-playfairb display-3 text-center">Upcoming stays</h1>
                <a class="text-center" href="<?=ROOT?>/res_ansehen">Display</a>
            </div>
        </div>
</div>

<script src="<?=ROOT?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>