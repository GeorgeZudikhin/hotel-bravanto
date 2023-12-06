<?php
    if(!empty($_POST))
    {
      //validate
      $errors = [];
  
      $query = "select * from users where email = :email limit 1";
      $row = query($query, ['email'=>$_POST['email']]);
  
      if($row)
      {
        $data = [];
        if(password_verify($_POST['password'], $row[0]['password']) and $row[0]['status'] == "active")
        {
          //grant access
          authenticate($row[0]);
          header("Location: index.php");
  
        }

        else if($row[0]['status'] == "inactive")
        {
          $errors['email'] = "User account is inactive!";
        }
        
        
        else{
          $errors['email'] = "Wrong email or password!";
        }
  
      }else{
        $errors['email'] = "Wrong email or password!";
      }
    } 
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Login - Hotel Bravanto</title>
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

        <h1 class="h3 mb-4 fw-normal"><b>Login</b></h1>

        <?php if (!empty($errors['email'])):?>
        <div class="alert alert-danger"><?=$errors['email']?></div>
        <?php endif;?>

        <div class="form-floating">
        <input type="email" name="email" class="form-control my-2" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
        <input type="password" name="password" class="form-control my-2" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
        </div>

        <div class="my-2">Don't have an account? <a href="signup">Sign Up here!</a></div>

        <div class="checkbox mb-3">
        <label>
            <input type="checkbox" name="remember_me" value="remember-me"> Remember me
        </label>
        </div>
        <button class="w-50 btn btn-lg btn-primary" type="submit">Login</button>
        <p class="mt-5 mb-3 text-muted">&copy; <?= date("d-m-Y")?></p>
    </form>
    </main>

    <script src="<?=ROOT?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
