<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img src="_images\LOGO_FRIEND_STUDIO.PNG" height="60" />
      </a>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav w-100">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Promotions.php">Promotions</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Catalog
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="All.php">All</a></li>
              <li><a class="dropdown-item" href="Electric-device.php">Electric device</a></li>
              <li><a class="dropdown-item" href="Mobile.php">Mobile</a></li>
              <li><a class="dropdown-item" href="Mobile-accessories.php">Mobile accessories</a></li>
              <li><a class="dropdown-item" href="Computer-accessories.php">Computer accessories</a></li>
              <li><a class="dropdown-item" href="model.php">model</a></li>
              <li><a class="dropdown-item" href="Snack.php">Snack</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Contact.php">Contact</a>
          </li>

          <?php if($_SESSION['login']) {
            if($_SESSION['user_lvl'] == 'Admin') { ?>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Admin Panel
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="A_Product.php"> Product </a></li>
                <li><a class="dropdown-item" href="A_slide.php"> Slide </a></li>
                <li><a class="dropdown-item" href="A_User.php"> User </a></li>
              </ul>
            </li>

          <?php }} ?>
        </ul>


        <?php if(isset($_SESSION['name'])) { ?>
        <ul class="nav navbar-nav navbar-right">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle bi bi-person-fill" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php echo $_SESSION['name']; ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="Profile.php">Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="auth/logout.php">Logout</a></li>
            </ul>
          </li>
        </ul> 
        <?php } else { ?>
          <ul class="nav navbar-nav navbar-right">
            <li class="nav-item">
              <a class="nav-link" href="auth/login.php">Login</a>
            </li>
          </ul> 
        <?php } ?>
      </div>  
    </div>
</nav>
