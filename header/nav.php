<?php
require_once(__DIR__.'/../header/url_extension.php');
require_once(__DIR__.'/../header/head.php');
?>

<div class="nav">
       <div class="logo">
          <a href="<?php echo $_SESSION['base']?>/index.php"><img src="<?php echo $_SESSION['base']?>/images/logo.jpg" alt="Logo 3D radionica"></a> 
        </div>

        

        <div class="main-nav">
          <ul>
            <li><a href="<?php echo $_SESSION['base']?>/index.php">Početna strana</a></li>
            <li><a href="<?php echo $_SESSION['base']?>/header/contact.php">Kontakt</a></li>
            <li><a href="<?php echo $_SESSION['base']?>/header/o-nama.php">O nama</a></li>
                        
              <?php 
                  if (isset($_SESSION['role']) && $_SESSION['role']=='admin') { 
                ?>
                  <li id='admin'><a href="<?php echo $_SESSION['base']?>/admin-page/admin.php">Admin</a></li>
              <?php   
                  } 
                ?>
            </ul>
        </div>

        <div class="users-info-nav">
              
             <div class="dropdown">
              <i class="fa-solid fa-user fa-xl"></i>
                <div class="dropdown-items">
                  <?php
                    if (isset($_SESSION['username'])) {
                  ?>
                  <a href="<?php echo $_SESSION['base']?>/header/logout.php">Odjavi se</a>
                  <?php
                    }else{
                    ?>
                  <a href="<?php echo $_SESSION['base']?>/content/login.php">Prijavi se</a>
                  <a href="<?php echo $_SESSION['base']?>/content/registracija.php">Registruj se</a>
                  <?php
                    }
                    ?>
                </div>
            </div>

            <div class="shopping-cart">
              <a href="<?php echo $_SESSION['base']?>/content/cart.php"><i class="fa-solid fa-cart-shopping fa-xl"></i></a>
            </div>
             
        </div>
        <div id="burger">
          <i class="fa-solid fa-bars"></i>
        </div>
</div>
