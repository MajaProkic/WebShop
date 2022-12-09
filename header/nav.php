<?php
<<<<<<< HEAD
require_once(__DIR__.'/../header/url_extension.php');

=======
$inactive = 1600; 
ini_set('session.gc_maxlifetime', $inactive);

    session_start();
    if (isset($_SESSION['time']) && (time() - $_SESSION['time'] > $inactive)) {
        // last request was more than 2 hours ago
        session_unset();     // unset $_SESSION variable for this page
        session_destroy();   // destroy session data
        header("Location:../index.php");
    }
    $_SESSION['time'] = time(); 
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61

?>
<div class="nav">
       <div class="logo">
<<<<<<< HEAD
          <a href="<?php echo $_SESSION['base']?>/index.php"><img src="<?php echo $_SESSION['base']?>/images/logo.jpg" alt="Logo 3D radionica"></a> 
        </div>
        <div id="burger">
          <a href="javascript:void(0);"> <img src="<?php echo $_SESSION['base']?>/images/icons8-burger-bar-64.png" alt="burger menu"></a>
        </div>
    
   
            <ul id='nav'>
                <li><a href="<?php echo $_SESSION['base']?>/index.php">Početna strana</a></li>
                <li><a href="<?php echo $_SESSION['base']?>/header/contact.php">Kontakt</a></li>
                <li><a href="<?php echo $_SESSION['base']?>/header/o-nama.php">O nama</a></li>
                      
                <?php if (isset($_SESSION['role']) && $_SESSION['role']=='admin') { ?>
                <li id='admin'><a href="<?php echo $_SESSION['base']?>/admin-page/admin.php">Admin</a></li>
=======
          <a href="/Modlice/index.php"><img src="/Modlice/images/logo.jpg" alt="Logo 3D radionica"></a>  
        </div>
   
            <ul>
                <li><a href="/Modlice/index">Modle</a></li>
                <li><a href="/Modlice/content/stencil.php">Stensili</a></li>
                <li><a href="/Modlice/content/utiskivaci.php">Utiskivaci</a></li>
                
            
                <?php if (isset($_SESSION['role']) && $_SESSION['role']=='admin') { ?>
                <li id='admin'><a href="/Modlice/admin-page/admin">Admin</a></li>
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
                <?php  } ?>
      
              <div class="dropdown">
                <li><a href="#">Prijavi se</a></li>
<<<<<<< HEAD
                    <div class="dropdown-items">
                            <?php if (isset($_SESSION['username'])) {?>
                                <li id='logout'><a href="<?php echo $_SESSION['base']?>/header/logout.php">Odjavi se</a></li>
                            <?php }else{?>
                            
                            <li id='reg'><a href="<?php echo $_SESSION['base']?>/content/registracija.php">Registruj se</a></li>
                            <li id='log'><a href="<?php echo $_SESSION['base']?>/content/login.php">Prijavi se</a></li>
                            <?php } ?>
                    </div>
               
               
                </div>
             
                  <div class="shopping-cart">
                    <span id='counter'>
                      <?php
                        if (isset($_SESSION['product-cart'])) {
                          echo $_SESSION['cart-number'];

                        }else{
                          echo 0;
                        }
                      ?>
                    </span>
                    <a href="<?php echo $_SESSION['base']?>/content/cart.php"><img src="<?php echo $_SESSION['base']?>/images/icons8-shopping-bag-50.png" alt=""> </a>
                  </div>
        
            </ul>
=======
                <div class="dropdown-items">
                        <?php if (isset($_SESSION['username'])) {?>
                            <li id='logout'><a href="/Modlice/header/logout">Odjavi se</a></li>
                        <?php }else{?>
                        
                        <li id='reg'><a href="/Modlice/content/registracija">Registruj se</a></li>
                        <li id='log'><a href="/Modlice/content/login">Prijavi se</a></li>
                        <?php } ?>
                    </div>
                    <li id='shp-cart'><a href="/Modlice/content/cart">Korpa </a></li>
                </div>
               
                   
            </ul>
     
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
    </div>
</div>