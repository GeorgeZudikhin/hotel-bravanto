<?php

    if(!empty($_POST))
    {
      //validate
      $errors = [];
      
      if(empty($_POST['begin_of_stay']))
      {
        $errors['begin_of_stay'] = "Please choose when you would like to visit us!";
      }

      if(empty($_POST['end_of_stay']))
      {
        $errors['end_of_stay'] = "Please choose when you would like to leave!";
      }

      if(empty($_POST['guests']))
      {
        $errors['guests'] = "Please choose the number of guests!";
      }
      else if($_POST['guests'] > 10)
      {
        $errors['guests'] = "Please choose the number of guests lesser than 10!";
      }

  
      if(empty($errors))
      {
        //save to database
        $data = [];
        $data['user_id'] = user('id');
        $data['username'] = user('username');
        $data['begin_of_stay'] = $_POST['begin_of_stay'];
        $data['end_of_stay'] = $_POST['end_of_stay'];
        $data['guests'] = $_POST['guests'];
        $data['parking'] = $_POST['parking'];
        $data['breakfast'] = $_POST['breakfast'];
        $data['pets'] = $_POST['pets'];
        $data['status_reservation'] = "neu";
  
        $query = "insert into reservations (user_id, username, begin_of_stay, end_of_stay, guests, parking, breakfast, pets, status_reservation) values (:user_id, :username, :begin_of_stay, :end_of_stay, :guests, :parking, :breakfast, :pets, :status_reservation)";
        query($query, $data);
        
        header("Location: res_ansehen");
  
      }  
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Blog - Hotel Bravanto</title>
    <link href="<?=ROOT?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=ROOT?>/assets/css/style.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin><link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;1,700&display=swap" rel="stylesheet">
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

    
    <link href="<?=ROOT?>/assets/css/headers.css" rel="stylesheet">
</head>
<body>

  <?php include "includes/navbar.php"; ?>

<!--Title-->
<!--Container-fluid to make the bg cover the entire width of the screen-->
<div class="container-fluid">
    <div class="row py-5 bg-hotel">
        <div class="col-12 my-5">
            <h1 class="display-3 ft-title-playfair text-center fst-italic text-decoration-underline">Reserve your stay...</h1>
        </div>
    </div>
</div>
 
<div class="container border-dark">
    <div class="row">
        <!--Form on the left-->
        <!--For devices smaller than "md", the form will appear fist and the contact info below-->
        <div class="col-md col-12 my-4">
            <form method="post" class="form-control bg-res-form no-border">

                <?php if(!empty($errors)):?>
                <div class="alert alert-danger mt-5">Please fix the problems below:</div>
                <?php endif;?>

                <div class="mt-5 mb-3 mx-5">
                    <label for="begin_of_stay" class="form-label label-text">Begin of stay:*</label>
                    <!--Alter range? Other options?-->
                    <input type="date" value="<?=old_value('begin_of_stay')?>" class="form-control" min="<?php $date = new DateTime(); echo $date->format("Y-m-d");?>" max="<?php $date_limit = new DateTime('+1 months'); echo $date_limit->format('Y-m-d');?>" name="begin_of_stay" id="begin_of_stay" >
                </div>
                    <?php if(!empty($errors['begin_of_stay'])):?>
                        <div class="text-danger"><?=$errors['begin_of_stay']?></div>
                    <?php endif;?>
                <div class="mb-3 mx-5">
                    <label for="end_of_stay" class="form-label label-text">End of stay:*</label>
                    <input type="date" value="<?=old_value('end_of_stay')?>" min="<?php $date = new DateTime(); echo $date->format("Y-m-d");?>" max="<?php $date_limit = new DateTime('+1 months'); echo $date_limit->format('Y-m-d');?>" class="form-control" name="end_of_stay" id="end_of_stay">
                </div>
                    <?php if(!empty($errors['end_of_stay'])):?>
                        <div class="text-danger"><?=$errors['end_of_stay']?></div>
                    <?php endif;?>
                <div class="mb-3 mx-5">
                    <label for="guests" class="form-label label-text">Number of guests:*</label>
                    <input type="number" value="<?=old_value('guests')?>" class="form-control" min="1" max="10" name="guests" id="guests">
                </div>
                    <?php if(!empty($errors['guests'])):?>
                        <div class="text-danger"><?=$errors['guests']?></div>
                    <?php endif;?>
                <br>
                <div class="mb-3 mx-5 form-check form-switch">
                    <label for="parking" class="form-label label-text">Parking included</label>
                    <input class="form-check-input" type="checkbox" value="1" name="parking" id="parking" checked>
                    <div class="form-text">Including parking services into your reservation will cost <b>28€</b></div>
                </div>
                <div class="mb-3 mx-5 form-check form-switch">
                    <label for="breakfast" class="form-label label-text">Add breakfast</label>
                    <input class="form-check-input" type="checkbox" value="1" name="breakfast" id="breakfast">
                    <div class="form-text">Adding daily breakfast into your reservation will cost <b>55€</b></div>
                </div>
                <div class="mb-3 mx-5 form-check form-switch">
                    <label for="pets" class="form-label label-text">Pets</label>
                    <input class="form-check-input" type="checkbox" value="1" name="pets" id="pets">
                    <div class="form-text">If you want to bring pets, you will be charged an additional fee of <b>75€</b></div>
                </div>
                <div class="d-flex justify-content-center mt-5 mb-4 label-text">
                    <button type="submit" class="btn btn-outline-primary">Book</button>
                </div>
            </form>
        </div>
        
        <!--Contact info on the right-->
        <div class="col-md my-4"> <!-- What do you think about putting empty columns and rows? Seems ok, or should we look for another solution?-->
            <h1 class="my-3 ft-playfair text-center">Need help?</h1>
            <h1 class="display-6 my-3 text-center">Contact us</h1>
            <!-- TO DO: Create hotel email, facebook, twitter -->
            <div class="row my-5 mx-5">
                <div class="col"></div>
                <div class="col d-flex justify-content-center"><a href="#"><i class="fa-regular fa-2x fa-at"></i></i></a></div>
                <div class="col d-flex justify-content-center"><a href="#"><i class="fa-brands fa-2x fa-facebook-f"></i></a></div>
                <div class="col d-flex justify-content-center"><a href="#"><i class="fa-brands fa-2x fa-square-twitter"></i></a></div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col px-5"><p class="text-center px-5">Or ask us direcly at <b>Carrer Lioel Dormiló 12 3/A</b> from <b>9.00</b> to <b>15.00</b> from Monday to Thursday</p></div>
            </div>
            <div class="row px-5 mb-5">
                <img src="https://cdn.pixabay.com/photo/2021/08/01/15/54/berries-6514669_960_720.jpg">
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>

<script src="<?=ROOT?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>