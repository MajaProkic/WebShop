<?php
require_once (__DIR__.'/header/header.php');
require_once (__DIR__.'/header/head.php');
require_once (__DIR__.'/functions/functions.php');
include_once(__DIR__.'/header/nav.php');
require_once(__DIR__.'/DB/query.php');
<<<<<<< HEAD
require_once (__DIR__.'/header/url_extension.php');
=======
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
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
<<<<<<< HEAD

=======
    
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
        <div class="filter">
            <?php include_once 'content/partials/filter.php'?>
        </div>

        <div class="searchbar">
                <input type="search" name="searchbar" id='searchbar' placeholder='Pretražite modlice'>
        </div>

        <div class="category">
<<<<<<< HEAD

            <?php
          
            include_once 'content/partials/categories.php';
                  
            ?>
        </div>

        <section class="products" id="products">


                  <?php 
                
                  if (isset($_GET['kategorija'])) {
                    include_once 'processing/categoriesProcessing.php'; // ako se selektuje kategorija odvedi na procesiranje kategorija
                  }else{
                    include_once (__DIR__.'/content/productsSwitch.php'); //u svakom slucaju odvedi na switch
                  }
     
                    ?>

=======
            <?php include_once 'content/partials/categories.php'?>
        </div>

        <section class="products" id="products">
                  <?php include_once 'content/products.php' ?>
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
        </section>

        <div class="pagination">
          <?php include_once 'content/partials/pagination.php';?>
        </div>

    </div>
    
    <div class="footer">
        <?php include_once (__DIR__.'/footer/footer.php')?>
    </div>

        
   
