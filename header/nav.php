<?php
require_once(__DIR__.'/../header/url_extension.php');


?>
<div class="nav">
       <div class="logo">
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
                <?php  } ?>
      
              <div class="dropdown">
                <li><a href="#">Prijavi se</a></li>
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
    </div>
</div>