<?php

    if(!empty($_POST))
    {
      // Validating the input
      $errors = [];
      
      if(empty($_POST['anrede']))
      {
        $errors['anrede'] = "Please enter your form of address!";
      }
      else if(!preg_match("/^[a-zA-Z]+$/", $_POST['anrede']))
      {
        $errors['anrede'] = "Form of address can only contain letters!";
      }
      else if(strlen($_POST['anrede']) > 32)
      {
        $errors['anrede'] = "Form of address can be no longer than 32 characters!";
      }


      if(empty($_POST['vorname']))
      {
        $errors['vorname'] = "Please enter your first name!";
      }
      else if(!preg_match("/^[a-zA-Z]+$/", $_POST['vorname']))
      {
        $errors['vorname'] = "First name can only contain letters!";
      }
      else if(strlen($_POST['vorname']) > 32)
      {
        $errors['vorname'] = "First name can be no longer than 32 characters!";
      }



      if(empty($_POST['nachname']))
      {
        $errors['nachname'] = "Please enter your last name!";
      }
      else if(!preg_match("/^[a-zA-Z]+$/", $_POST['nachname']))
      {
        $errors['nachname'] = "Last name can only contain letters!";
      }
      else if(strlen($_POST['nachname']) > 32)
      {
        $errors['nachname'] = "Last name can be no longer than 32 characters!";
      }


      $query = "select id from users where email = :email limit 1";
      $email = query($query, ['email'=>$_POST['email']]);
  
      if(empty($_POST['email']))
      {
        $errors['email'] = "Please enter an email!";
      }
      else if($email)
      {
        $errors['email'] = "The email is already in use!";
      }
  


      if(empty($_POST['username']))
      {
        $errors['username'] = "Please enter a username!";
      }
      else if(!preg_match("/^[a-zA-Z0-9-]+$/", $_POST['username']))
      {
        $errors['username'] = "Username can only contain letters and numbers!";
      }
      else if(strlen($_POST['username']) > 64)
      {
        $errors['username'] = "Username can be no longer than 64 characters!";
      }



      if(empty($_POST['password']))
      {
        $errors['password'] = "Please enter a password!";
      }
      else if(strlen($_POST['password']) < 8)
      {
        $errors['password'] = "Password must contain 8 character or more!";
      }
      else if($_POST['password'] !== $_POST['repeat_password'])
      {
        $errors['password'] = "Passwords do not match!";
      }
  
      if(empty($_POST['accept_terms']))
      {
        $errors['accept_terms'] = "Please accept the terms and conditions!";
      }
  
      if(empty($errors))
      {
        // Saving variables to the database, if there are no errors
        $data = [];
        $data['anrede'] = $_POST['anrede'];
        $data['vorname'] = $_POST['vorname'];
        $data['nachname'] = $_POST['nachname'];
        $data['email'] = $_POST['email'];
        $data['username'] = $_POST['username'];
        $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $data['role'] = "user";
        $data['status'] = "active";
  
        $query = "insert into users (anrede, vorname, nachname, email, username, password, role, status) values (:anrede, :vorname, :nachname, :email, :username, :password, :role, :status)";
        query($query, $data);
  
        header("Location: login");
  
      }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Sign Up - Hotel Bravanto</title>
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
<body class="text-center">
    
    <?php include "includes/navbar.php"; ?>

    <main class="form-signin w-25 m-auto">
    <form method="post">
        <a href="home">
        <img class="mb-4 mt-5" src="<?=ROOT?>/assets/images/logo.png" alt="" width="172" height="157">
        </a>

        <h1 class="h3 mb-4 fw-normal"><b>Sign Up</b></h1>

        <?php if(!empty($errors)):?>
            <div class="alert alert-danger">Please fix the problems below:</div>
        <?php endif;?>

        <div class="form-floating">
        <input value="<?=old_value('anrede')?>" type="text" name="anrede" class="form-control my-2" id="floatingInput" placeholder="Anrede">
        <label for="floatingInput">Anrede</label>
        </div>
            <?php if(!empty($errors['anrede'])):?>
                <div class="text-danger"><?=$errors['anrede']?></div>
            <?php endif;?>
        <div class="form-floating">
        <input value="<?=old_value('vorname')?>" type="text" name="vorname" class="form-control my-2" id="floatingInput" placeholder="Vorname">
        <label for="floatingInput">Vorname</label>
        </div>
            <?php if(!empty($errors['vorname'])):?>
                <div class="text-danger"><?=$errors['vorname']?></div>
            <?php endif;?>
        <div class="form-floating">
        <input value="<?=old_value('nachname')?>" type="text" name="nachname" class="form-control my-2" id="floatingInput" placeholder="Nachname">
        <label for="floatingInput">Nachname</label>
        </div>
            <?php if(!empty($errors['nachname'])):?>
                <div class="text-danger"><?=$errors['nachname']?></div>
            <?php endif;?>
        <div class="form-floating">
        <input value="<?=old_value('email')?>" type="email" name="email" class="form-control my-2" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
        </div>
            <?php if(!empty($errors['email'])):?>
                <div class="text-danger"><?=$errors['email']?></div>
            <?php endif;?>
        <div class="form-floating">
        <input value="<?=old_value('username')?>" type="text" name="username" class="form-control my-2" id="floatingInput" placeholder="Username">
        <label for="floatingInput">Username</label>
        </div>
            <?php if(!empty($errors['username'])):?>
                <div class="text-danger"><?=$errors['username']?></div>
            <?php endif;?>
        <div class="form-floating">
        <input value="<?=old_value('password')?>" type="password" name="password" class="form-control my-2" id="floatingPassword" placeholder="Passwort">
        <label for="floatingPassword">Passwort</label>
        </div>
            <?php if(!empty($errors['password'])):?>
                <div class="text-danger"><?=$errors['password']?></div>
            <?php endif;?>
        <div class="form-floating">
        <input value="<?=old_value('repeat_password')?>" type="password" name="repeat_password" class="form-control my-2" id="floatingPassword" placeholder="Passwort wiederholen">
        <label for="floatingPassword">Passwort wiederholen</label>
        </div>
        <div class="my-2">Already have an account? <a href="login">Login here!</a></div>

        <div class="checkbox mb-3">
        <label>
            <input type="checkbox" name="accept_terms" value="remember-me">   Accept <a href="https://www.designhotels.com/terms/" target=”_blank”>terms and conditions</a> 
        </label>
        </div>
            <?php if(!empty($errors['accept_terms'])):?>
                <div class="text-danger"><?=$errors['accept_terms']?></div>
            <?php endif;?>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
        <p class="mt-5 mb-3 text-muted">&copy; <?= date("d-m-Y")?></p>
    </form>
    </main>


    <script src="<?=ROOT?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
