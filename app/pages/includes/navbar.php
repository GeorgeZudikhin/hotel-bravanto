<header class="p-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="<?=ROOT?>/home" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          <img class="bi me-2" src="<?=ROOT?>/assets/images/logo.png" style="object-fit:cover;" width="50" heigt="40">
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="<?=ROOT?>/home" class="nav-link px-2 link-dark">Home</a></li>
          <li><a href="<?=ROOT?>/blog" class="nav-link px-2 link-dark">Blog</a></li>
          <?php
                if(logged_in())
                { 
          ?>
          <li><a href="<?=ROOT?>/res_anlegen" class="nav-link px-2 link-dark">New Reservation</a></li>
          <?php
                }
          ?>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle link-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Help
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?=ROOT?>/faq">FAQ</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="<?=ROOT?>/impressum">Impressum</a></li>
            </ul>
        </li>
        </ul>

        <form action="<?=ROOT?>/search" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <div class="input-group ">
            <input value="<?=$_GET['find'] ?? ''?>" name="find" type="search" class="form-control" placeholder="Search..." aria-label="Search">
            <button class="btn btn-primary">Find</button>
          </div>
        </form>

        <?php
                if(!logged_in())
                { 
        ?>

        <div class="text-end">
          <button type="button" onclick="window.location.href='<?=ROOT?>/login';" class="btn btn-dark me-2">Login</button>
          <button type="button" onclick="window.location.href='<?=ROOT?>/signup';" class="btn btn-warning">Sign Up</button>
        </div>

        <?php 
                }
                else {
        ?>
        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?=get_image(user('image'))?>" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#">Hi, <?=user('vorname')?></a></li>
            <li><a class="dropdown-item" href="<?=ROOT?>/profile">Profile</a></li>
            <li><a class="dropdown-item" href="<?=ROOT?>/res_ansehen">My reservations</a></li>
            <?php
            if(user('role') == 'admin')
            {
            ?>
              <li><a class="dropdown-item" href="<?=ROOT?>/admin">Admin Panel</a></li>
            <?php 
            }
            ?>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?=ROOT?>/logout">Sign out</a></li>
          </ul>
        </div>

        <?php 
                }
        ?>
      </div>
    </div>
  </header>
