<?php
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

?>
<div class="nav">
       <div class="logo">
          <a href="/Modlice/index.php"><img src="/Modlice/images/logo.jpg" alt="Logo 3D radionica"></a>  
        </div>
   
            <ul>
                <li><a href="/Modlice/index">Modle</a></li>
                <li><a href="/Modlice/content/stencil.php">Stensili</a></li>
                <li><a href="/Modlice/content/utiskivaci.php">Utiskivaci</a></li>
                
            
                <?php if (isset($_SESSION['role']) && $_SESSION['role']=='admin') { ?>
                <li id='admin'><a href="/Modlice/admin-page/admin">Admin</a></li>
                <?php  } ?>
      
              <div class="dropdown">
                <li><a href="#">Prijavi se</a></li>
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
     
    </div>
</div>