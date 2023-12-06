<?php
  if(!logged_in())
  {
    redirect('login');
  }

  $section = $url[1] ?? 'dashboard';
  $action = $url[2] ?? 'view';
  $id = $url[3] ?? 0;
      
  $filename = "../app/pages/admin/".$section.".php";
  if(!file_exists($filename))
  {
    $filename = "../app/pages/admin/404.php";
  }
  
  if($section == 'users')
  {
    require_once "../app/pages/admin/users-controller.php";
  }

  if($section == 'reservations')
  {
    require_once "../app/pages/admin/reservations-controller.php";
  }

  if($section == 'categories')
  {
    require_once "../app/pages/admin/categories-controller.php";
  }

  if($section == 'posts')
  {
    require_once "../app/pages/admin/posts-controller.php";
  }
  
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Admin - Hotel Bravanto</title>
    <link href="<?=ROOT?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=ROOT?>/assets/bootstrap/css/bootstrap-icons.css" rel="stylesheet">

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

    
    <link href="<?=ROOT?>/assets/css/dashboard.css" rel="stylesheet">
    <link href="<?=ROOT?>/assets/css/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="<?=ROOT?>/admin">Admin - Hotel Bravanto</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav nav-tabs">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-5" href="<?=ROOT?>/home">Back</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">

        
          <li class="nav-item">
            <a class="nav-link <?=$section == 'dashboard' ? 'active' : ''?>" aria-current="page" href="<?=ROOT?>/admin">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link <?=$section == 'users' ? 'active' : ''?>" aria-current="page" href="<?=ROOT?>/admin/users">
              <span data-feather="user"></span>
              Users
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link <?=$section == 'reservations' ? 'active' : ''?>" aria-current="page" href="<?=ROOT?>/admin/reservations">
              <span data-feather="calendar"></span>
              Reservations
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link <?=$section == 'categories' ? 'active' : ''?>" aria-current="page" href="<?=ROOT?>/admin/categories">
              <span data-feather="list"></span>
              Categories
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link <?=$section == 'posts' ? 'active' : ''?>" aria-current="page" href="<?=ROOT?>/admin/posts">
              <span data-feather="cast"></span>
              Posts
            </a>
          </li>
        </ul>

      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Hotel Bravanto</h1>
      </div>
      
      <?php
        require_once $filename;
      ?>

    </main>
  </div>
</div>


    <script src="<?=ROOT?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="<?=ROOT?>/assets/js/dashboard.js"></script>
</body>
</html>
