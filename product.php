<?php
require_once 'DB/query.php';
require_once 'partials/header.php';
include_once 'partials/nav.php';
require_once 'functions/functions.php';
require_once 'DB/Database.php';
$database=new Database();
$db=$database->connection();
$func=new Functions();
global $func;
$query=new Query($db);
global $query;


?>

<div class="product" >
    <section class="product-img-tit">
       <form action="cart.php" method="post">
            <?php
                if(isset($_GET['product'])){
                    $product_id = $_GET['product'];
                    global $product_id;
                    ?>
                    <input type="text" name="id" id="" value='<?php echo $product_id ?>' hidden>
                    
                   <?php $res=$query->getProductByid($product_id);
               
                    while ($row=$res->fetch(PDO::FETCH_ASSOC)) {

                        $naziv_proizvoda=$row['naziv'];
                        $slika = $row['slika'];
                        $opis_proizvoda = $row['opis'];

                        ?>
                        <div class="product-title">
                            <h2><?php echo $naziv_proizvoda;?></h2>
                            <input type="text" name="naziv_proizvoda" id="" value='<?php echo $naziv_proizvoda;?>' hidden>
                            
                        </div>

                        <div class="product-img">
                            <img src="images/modle/<?php echo $slika ?>" alt="image of product">
                        </div>
    </section>

    <section class="product-info">
        
    <div class="bla">  
        <div class="choose-properties-size">
            <p>Odaberite odgovarajuću dimenziju modle</p>

                <form action="" method="post">
                <div class="size">
                <select name="size" id="size">
                   <?php
                    $velicina=$query->selectSizes($product_id);
                  
                    while ($row=$velicina->fetch(PDO::FETCH_ASSOC)) { ?>
                    
                        <option value="<?php echo $row['ID']?>"><?php echo $row['Dimenzija']?> cm</option>
                    
                     <?php } ?>
                     </select>
                     </div>
                </form>

                    <div class="choose-properties-imprint">
                        <div class="imprint">
                        <p>Odaberite da li želite utiskivač </p>
                            <?php
                            $selectimprint=$query->selectImprint($product_id);  

                            while ($row=$selectimprint->fetch(PDO::FETCH_ASSOC)) {  ?>
                             <input type="button" name="imprint" id="" value='<?php echo $row['Naziv']?>'>  
                             <?php  }  ?>
                 </div>
                    </div>  
                        
                    <div class="quantity">
                        <input type='button' class='plus' value='+' onclick='increment()'>
                        <input type="number"  class='number' name="quantity" id="quantity" value='1' readonly="readonly" onclick="calculate();">
                        <input type='button' class='minus' value='-' onclick='decrement()'>
                    </div>

                    <div class="price">
                        <input type="text" name="price" id="pricep" readonly="readonly" >  
                    </div>

                    <button><input type="submit" name="buy" id="" value='Dodaj u korpu'></button>  
                    
                <div class="short-description">
                    <p><?php echo $opis_proizvoda ?></p>
                </div>

        </div>  
    </div>        
       
    </section>   
        <?php    
    }
             }
        ?>
        </form>
</div>
    <?php

        require_once 'partials/head.php';
   
            
            
    
    ?>
<div class="footer">
    <?php include_once 'partials/footer.php'?>
    </div>
