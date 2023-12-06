<?php

$id = user('id');
$sql = "SELECT * FROM users WHERE id = :id LIMIT 1";
$row = query($sql, ['id'=>$id]);

if (!empty($row)):
    $anrede = $row[0]['anrede'];
    $vorname = $row[0]['vorname'];
    $nachname = $row[0]['nachname'];
    $current_email = $row[0]['email'];
    $username = $row[0]['username'];
    $password = $row[0]['password'];
    
    if (!empty($_POST)){
            
        //validate
        $errors = [];

        if (empty($_POST['anrede'])){
            $errors['anrede'] = "Please enter your form of address!";
        }
        else if (!preg_match("/^[a-zA-Z]+$/", $_POST['anrede'])){
            $errors['anrede'] = "Form of address can only contain letters!";
        }
        else if (strlen($_POST['anrede']) > 32){
            $errors['anrede'] = "Form of address can be no longer than 32 characters!";
        }

        if (empty($_POST['vorname'])){
            $errors['vorname'] = "Please enter your first name!";
        }
        else if (!preg_match("/^[a-zA-Z]+$/", $_POST['vorname'])){
            $errors['vorname'] = "First name can only contain letters!";
        }
        else if (strlen($_POST['vorname']) > 32){
            $errors['vorname'] = "First name can be no longer than 32 characters!";
        }

        if (empty($_POST['nachname'])){
            $errors['nachname'] = "Please enter your last name!";
        }
        else if (!preg_match("/^[a-zA-Z]+$/", $_POST['nachname'])){
            $errors['nachname'] = "Last name can only contain letters!";
        } 
        else if(strlen($_POST['nachname']) > 32){
            $errors['nachname'] = "Last name can be no longer than 32 characters!";
        }

        $query = "select id from users where email = :email limit 1";
        $email = query($query, ['email'=>$_POST['email']]);
    
        if(empty($_POST['email']))
        {
            $errors['email'] = "Please enter an email!";
        }


        if(empty($_POST['username']))
        {
            $errors['username'] = "Please enter a username!";
        }
        else if(!preg_match("/^[a-zA-Z0-9-]+$/", $_POST['username']))
        {
            $errors['username'] = "Username can only contain letters and numbers!";
        }
        else if (strlen($_POST['username']) > 64)
        {
            $errors['username'] = "Username can be no longer than 64 characters!";
        }

        if (!empty($_POST['new_password']))
        {
            if (empty($_POST['prev_password'])) 
            {
                $errors['password'] = "Previous password must be written!";

            } else if (!password_verify($_POST['prev_password'], $password))
            {
                $errors['password'] = "Incorrect password!";

            } else if (strlen($_POST['new_password']) < 8)
            {
                $errors['password'] = "Password must contain 8 character or more!";

            } else if($_POST['new_password'] != $_POST['repeat_password'])
            {
              $errors['password'] = "Passwords do not match! (New and Confirm)";
            }
        }

    
        if(empty($errors)){
            //update database
            
            $data = [];
            $data['anrede'] = $_POST['anrede'];
            $data['vorname'] = $_POST['vorname'];
            $data['nachname'] = $_POST['nachname'];
            $data['email'] = $_POST['email'];
            $data['username'] = $_POST['username'];
            if (!empty($_POST['new_password'])){
                $data['password'] = password_hash($_POST['new_password'], PASSWORD_DEFAULT);  
            } else {
                $data['password'] = $password;
            }

            $query = "UPDATE users SET anrede = :anrede, vorname = :vorname, nachname = :nachname, email = :email, username = :username, password = :password WHERE id = $id";
            query($query, $data);
            header("Location: profile");
        }
    }
?>

<!DOCTYPE html>
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
                <form method="post">
    
                    <h1 class="h3 mb-4 fw-normal"><b>Upgrade Profile</b></h1>

                    <?php if(!empty($errors)):?>
                        <div class="alert alert-danger">Please fix the problems below:</div>
                    <?php endif;?>

                    <div class="form-floating">
                    <input value="<?=$anrede?>" type="text" name="anrede" class="form-control my-2" id="floatingInput" placeholder="Anrede">
                    <label for="floatingInput">Anrede</label>
                    </div>
                        <?php if(!empty($errors['anrede'])):?>
                            <div class="text-danger"><?=$errors['anrede']?></div>
                        <?php endif;?>
                    <div class="form-floating">
                    <input value="<?=$vorname?>" type="text" name="vorname" class="form-control my-2" id="floatingInput" placeholder="Vorname">
                    <label for="floatingInput">Vorname</label>
                    </div>
                        <?php if(!empty($errors['vorname'])):?>
                            <div class="text-danger"><?=$errors['vorname']?></div>
                        <?php endif;?>
                    <div class="form-floating">
                    <input value="<?=$nachname?>" type="text" name="nachname" class="form-control my-2" id="floatingInput" placeholder="Nachname">
                    <label for="floatingInput">Nachname</label>
                    </div>
                        <?php if(!empty($errors['nachname'])):?>
                            <div class="text-danger"><?=$errors['nachname']?></div>
                        <?php endif;?>
                    <div class="form-floating">
                    <input value="<?=$current_email?>" type="email" name="email" class="form-control my-2" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                    </div>
                        <?php if(!empty($errors['email'])):?>
                            <div class="text-danger"><?=$errors['email']?></div>
                        <?php endif;?>
                    <div class="form-floating">
                    <input value="<?=$username?>" type="text" name="username" class="form-control my-2" id="floatingInput" placeholder="Username">
                    <label for="floatingInput">Username</label>
                    </div>
                        <?php if(!empty($errors['username'])):?>
                            <div class="text-danger"><?=$errors['username']?></div>
                        <?php endif;?>
                    <br>

                    <h1 class="h3 mb-4 fw-normal"><bold>Change Password</bold></h1>
                    <h5 class="">Please type in your old password!<h5>

                    <div class="form-floating">
                    <input value="" type="password" name="prev_password" class="form-control my-2" id="prePassword">
                    <label for="floatingPassword">Previous Passwort</label>
                    </div>

                    <div class="form-floating">
                    <input value="" type="password" name="new_password" class="form-control my-2" id="newPassword">
                    <label for="floatingPassword">New Passwort</label>
                    </div>

                    <div class="form-floating">
                    <input value="" type="password" name="repeat_password" class="form-control my-2" id="repeatPassword">
                    <label for="floatingPassword">Confirm Passwort</label>
                    </div>
                    <?php if (!empty($errors['password'])):?>
                        <div class="text-danger"><?=$errors['password']?></div>
                    <?php endif;?>
                    <div class="my-3 form-floating">
                        <a class="btn btn-primary" href="<?=ROOT?>/profile" role="button">Nevermind</a>
                        <button class="btn btn-md btn-primary" type="submit">Upgrade</button>
                    </div>
                    
                    <p class="mt-5 mb-3 text-muted">&copy; <?= date("d-m-Y")?></p>
                </form>
            </div>
        </div>
    </div>
    <?php endif;?>


<script src="<?=ROOT?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>