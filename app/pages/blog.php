<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Blog - Hotel Bravanto</title>
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

  <?php include "includes/navbar.php"; ?>

  <div class="mx-auto col-md-10">
        <main class="p-2">
            <h3 class="mx-4 mt-5 mb-5">Blog</h3>

            <div class="row mb-2 me-1">

                <?php
                $query = "select posts.*, categories.category from posts join categories on posts.category_id = categories.id order by id desc";
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
