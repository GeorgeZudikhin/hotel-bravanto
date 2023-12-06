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

    <div class="containter">
        <div class="row my-5 mx-5">
            <div class="col-md-3 text-center">
                <img src="<?=get_image(user('image'))?>" alt="mdo" width="300" height="300" class="rounded-circle">
            </div>
            <div class="col-md-9 py-5 mx-auto ">
                <h1 class="h3 mb-4 fw-normal"><b>Your profile</b></h1>
                <?php
                    $id = user('id');
                    $sql = "SELECT * FROM users WHERE id = :id LIMIT 1";
                    $row = query($sql, ['id'=>$id]);
                    
                    if (!empty($row)):
                        $anrede = $row[0]['anrede'];
                        $vorname = $row[0]['vorname'];
                        $nachname = $row[0]['nachname'];
                        $email = $row[0]['email'];
                        $username = $row[0]['username'];
                        $password = $row[0]['password'];
                ?>
                <form method="post">
                    <div class="form-floating">
                    <input value="<?=$anrede?>" type="text" name="anrede" class="form-control my-2" id="floatingInput" placeholder="Anrede" readonly>
                    <label for="floatingInput">Anrede</label>
                    </div>
                    <div class="form-floating">
                    <input value="<?=$vorname?>" type="text" name="vorname" class="form-control my-2" id="floatingInput" placeholder="Vorname" readonly>
                    <label for="floatingInput">Vorname</label>
                    </div>
                    <div class="form-floating">
                    <input value="<?=$nachname?>" type="text" name="nachname" class="form-control my-2" id="floatingInput" placeholder="Nachname" readonly>
                    <label for="floatingInput">Nachname</label>
                    </div>
                    <div class="form-floating">
                    <input value="<?=$email?>" type="email" name="email" class="form-control my-2" id="floatingInput" placeholder="name@example.com" readonly>
                    <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating">
                    <input value="<?=$username?>" type="text" name="username" class="form-control my-2" id="floatingInput" placeholder="Username" readonly>
                    <label for="floatingInput">Username</label>
                    </div>
                    <p>Forgot your password? Change it by editing your profile</p>
                    
                    <a class="btn btn-primary" href="<?=ROOT?>/profile_edit" role="button">Edit Profile</a>
                    <p class="mt-5 mb-3 text-muted">&copy; <?= date("d-m-Y")?></p>
                </form>
                <?php else:?>
                        <div class="text-center alert alert-danger">That profile was not found</div>
                <?php endif;?>
            </div>
        </div>
    </div>

<script src="<?=ROOT?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>