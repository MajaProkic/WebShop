<?php
require_once 'DB/query.php';
require_once 'partials/header.php';
require_once 'partials/head.php';
require_once 'functions/functions.php';
include_once 'partials/nav.php';

?>
    <!--SECTION COVER IMAGE-->
    <section class="cover-image">
            <div class="cover-text">
                <h1>Dobrodošli na sajt 3D radionice!</h1>
              <a href ='#products' class="buy-cover">Pogledajte ponudu</a>
            </div>
    </section>

    <!--SECTION PRODUCTS -->
    <div class="content">

        <div class="filter">
            <?php include_once 'partials/filter.php'?>
        </div>

        <div class="category">
            <?php include_once 'partials/categories.php'?>
        </div>

        <section class="products" id="products">
              <?php 
                  include_once 'partials/products.php';
               ?>
        </section>
    


    </div>
    
    <div class="footer">
    <?php include_once 'partials/footer.php'?>
    </div>

        
   
