<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Home - Hotel Bravanto</title>
    <link href="<?=ROOT?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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

    
    <link href="<?=ROOT?>/assets/css/headers.css" rel="stylesheet">
</head>
<body>

    <?php include 'includes/navbar.php'; ?>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="<?=ROOT?>/assets/images/hotel_pic_4.jpg" class="d-block w-100">
        </div>
        <div class="carousel-item">
        <img src="<?=ROOT?>/assets/images/hotel_pic_6.jpg" class="d-block w-100">
        </div>
        <div class="carousel-item">
        <img src="<?=ROOT?>/assets/images/hotel_pic_7.jpg" class="d-block w-100">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>

    <div class="mx-auto col-md-10">
    <main class="p-2">
        <h3 class="mx-4 mt-5 mb-5">Featured</h3>

        <div class="row mb-2 me-1 justify-content-center">

            <?php
            $query = "select posts.*, categories.category from posts join categories on posts.category_id = categories.id order by id desc limit 2";
            $rows = query($query);
            if($rows)
            {
              foreach($rows as $row)
              {
                include '../app/pages/includes/post-card.php';
              }

            }
            else
            {
              echo "No items found!";
            }
            
            ?>

            

       </div>
    </main>
    </div>

  <?php include "includes/footer.php"; ?>

  <script src="<?=ROOT?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
