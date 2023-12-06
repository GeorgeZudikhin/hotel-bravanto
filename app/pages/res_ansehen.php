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

    <div class="col-md-6 mx-auto">
    <form method="post" enctype="multipart/form-data">

        <h3 class="ft-playfair pt-5 pb-3">My Reservations</h3>

        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>Begin of stay</th>
                    <th>End of stay</th>
                    <th>Number of Guests</th>
                    <th>Parking</th>
                    <th>Breakfast</th>
                    <th>Pets</th>
                </tr>

                <?php  
                    $limit = 10;
                    $offset = ($PAGE['page_number'] - 1) * $limit;

                    $id = user('id');
                    $query = "SELECT * FROM reservations WHERE user_id = $id ORDER BY id desc limit $limit offset $offset";
                    $rows = query($query);
                ?>

                <?php if(!empty($rows)):?>
                    <?php foreach($rows as $row):?>
                    <tr>
                        <td><?=$row['begin_of_stay']?></td>
                        <td><?=$row['end_of_stay']?></td>
                        <td><?=$row['guests']?></td>
                        <td><?=$row['parking']?></td>
                        <td><?=$row['breakfast']?></td>
                        <td><?=$row['pets']?></td>
                    </tr>
                <?php endforeach;?>
            <?php endif;?>
            </table>

            <div class="col-md-12 mb-4">
                <a href="<?=$PAGE['first_link']?>">
                    <button class="btn btn-primary">First Page</button>
                </a>
                <a href="<?=$PAGE['prev_link']?>">
                    <button class="btn btn-primary">Prev Page</button>
                </a>
                <a href="<?=$PAGE['next_link']?>">
                    <button class="btn btn-primary float-end">Next Page</button>
                </a>
            </div>
        </div>
        
        <div class="row my-5 border-3 border-white"> </div>
    </form>
</div>

<script src="<?=ROOT?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>