<?php
require_once (__DIR__.'/../header/header.php');
require_once (__DIR__.'/../header/head.php');
require_once (__DIR__.'/../functions/functions.php');
include_once(__DIR__.'/../header/nav.php');
require_once(__DIR__.'/../DB/query.php');
require_once(__DIR__.'/../DB/Database.php');
<<<<<<< HEAD
require_once (__DIR__.'/../header/url_extension.php');
=======
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61

$database=new Database();
$db=$database->connection();
$func=new Functions();
global $func;
$query=new Query($db);
global $query;
$msg=isset($msg)?$msg:"";

if (isset($_POST['buy'])) {
    $id=$_POST['id'];
    $naziv=$_POST['naziv_proizvoda'];
    $size=$_POST['size'];
    $imprint=$_POST['imprint'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];

<<<<<<< HEAD
    if ($_POST['size']!='' && $_POST['imprint']!='') {
=======
    if ($_POST['size']!='-' && $_POST['imprint']!='-') {
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
        $arr=$func->add_in_array_imp($id,$naziv,$size,$imprint,$price,$quantity);    
        $mess=$func->sessionCart('product_cart',$arr,$id);
        $func->refresh();
        header('Location:cart.php');
<<<<<<< HEAD
    }
}
=======
    }else{
        ?>
    <div class="msg-error">
        <?php echo $msg='Morate odabrati veličinu i utiskivač'?>
    </div>
        <?php
    
    }
}

>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
?>

<div class="product" >
    <section class="product-img-tit">
     
       <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
           
            <?php
                if(isset($_GET['product'])){
                    $product_id = $_GET['product'];
                    global $product_id;
                    ?>
                    <input type="text" name="id" id="" value='<?php echo $product_id ?>' hidden>
                    
                   <?php $res=$query->selectIdCategoryAndName($product_id);
               
                    while ($row=$res->fetch(PDO::FETCH_ASSOC)) {
                        $kategorija=$row['naziv kategorije'];
                        global $kategorija;
                        $naziv_proizvoda=$row['naziv modle'];
<<<<<<< HEAD
                        $slika = $row['slika1'];
=======
                        $slika = $row['slika'];
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
                       
                        ?>
                        
                        <div class="path">
                            <?php echo $row['naziv kategorije']." > ".$row['naziv modle']; ?>
                        </div>

                        <div class="product-img">
<<<<<<< HEAD
                            <img src="<?php echo $_SESSION['base']?>/images/modle/<?php echo $slika ?>" alt="image of product" class='big-img'>
                            <div class="sub-images">
                                <?php
                                $selectallImages=$query->SELECTALLIMAGES($product_id);
                                while ($row=$selectallImages->fetch(PDO::FETCH_ASSOC)) {
                                 if ($row['slika1']!=null) {?>
                                    <img src="<?php echo $_SESSION['base']?>/images/modle/<?php echo $row['slika1'] ?>" alt="first image of product" class='small-img'>
                            <?php }if ($row['slika2']!=null) {?>
                                    <img src="<?php echo $_SESSION['base']?>/images/modle/<?php echo $row['slika2'] ?>" alt="second image of product" class='small-img'>
                            <?php }if ($row['slika3']!=null) {?>
                                    <img src="<?php echo $_SESSION['base']?>/images/modle/<?php echo $row['slika3'] ?>" alt="third image of product" class='small-img'>
                            <?php }if ($row['slika4']!=null) {?>
                                    <img src="<?php echo $_SESSION['base']?>/images/modle/<?php echo $row['slika4'] ?>" alt="fourth image of product" class='small-img'>
                            <?php }if ($row['slika5']!=null) {?>
                                    <img src="<?php echo $_SESSION['base']?>/images/modle/<?php echo $row['slika5'] ?>" alt="fifth image of product" class='small-img'>
                            <?php }if ($row['slika6']!=null) {?>
                                    <img src="<?php echo $_SESSION['base']?>/images/modle/<?php echo $row['slika6'] ?>" alt="sixth image of product" class='small-img'>
                            <?php }if ($row['slika7']!=null) {?>
                                    <img src="<?php echo $_SESSION['base']?>/images/modle/<?php echo $row['slika7'] ?>" alt="seventh image of product" class='small-img'>
                            <?php }
                                    ?>
                                     
                               <?php } ?>
                            </div>
=======
                            <img src="../images/modle/<?php echo $slika ?>" alt="image of product">
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
                        </div>
    </section>        
      
        <section class="choose-properties">

            <div class="product-title">
                    <?php echo $naziv_proizvoda;?>
                    <input type="text" name="naziv_proizvoda" id="" value='<?php echo $naziv_proizvoda;?>' hidden>
            </div>

                <div class="size-and-imprint">
               
<<<<<<< HEAD
                    <select name="size" id="sizee" required>
                        <option value="" >Odaberite dimenziju</option>
=======
                    <select name="size" id="sizee">
                        <option value="-" selected='selected'>Odaberite dimenziju</option>
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
                        <?php
                            $velicina=$query->selectSizes($product_id);
                        
                             while ($row=$velicina->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?php echo $row['ID']?>"><?php echo $row['Dimenzija'] ?> cm</option>
                                
                        <?php  } ?>
                     </select>
                    
<<<<<<< HEAD
                    <select name="imprint" id="imprint" required>
                            <option value="">Odaberite utiskivac</option>
=======
                    <select name="imprint" id="imprint">
                            <option value="-" selected='selected'>Odaberite utiskivac</option>
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
                            <?php
                                $selectimprint=$query->selectImprint($product_id);  

                                while ($row=$selectimprint->fetch(PDO::FETCH_ASSOC)) {  ?>
<<<<<<< HEAD
                                <option value="<?php echo $row['ID']?>"> <?php echo $row['Naziv']?></option>
=======
                                <option value="<?php echo $row['ID']?>"> <?php echo $row['Naziv'] ?></option>
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
                            <?php  }  ?>
                    </select>
                 </div>
                     
                        
                    <div class="quantity">
                        <input type='button' class='plus' value='+' onclick='increment()'>
                        <input type="number"  class='number' name="quantity" id="quantity" value='1' readonly="readonly">
                        <input type='button' class='minus' value='-' onclick='decrement()'>
                    </div>

                    <div class="price">
                        <p id='pricep'></p>
                        <input type="text" name="price" id="pricepinput" value='' hidden>
                        
                    </div>

                    <div class="buy">
                        <button type="submit" name="buy">Dodaj u korpu</button>  
                    </div>   
                    <div class="tags">
                            <div class="title">
                                Tagovi:
                            </div>
                            <div class="hashtags">
                                <?php 
                                    $getHashtag=$query->selecthashtag($product_id);
                                    while ($row=$getHashtag->fetch(PDO::FETCH_ASSOC)) {
<<<<<<< HEAD

=======
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
                                        $hashatg=$row['hashtag'];
                                        echo $hashatg;
                                    }
                                ?>        
                            </div>
<<<<<<< HEAD
                    </div> 
                    <div class="notice">
                       Ukoliko imate posebnu ideju za izradu modle ili neku nedoumicu - možete nas kontaktirati na 062-843-3-192
                    </div>   
            </section>  
=======
                    </div>    
                    
              
            </section>  
         
     
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
        <?php    
    }
             }
        ?>
        </form>
<<<<<<< HEAD
</div>
 <!-- Product class end -->

    <div class="short-description">
        <?php include_once 'partials/product_description.php'; ?>   
    </div>

    <div class="related-product">
        <?php   include_once 'partials/related_products.php'; ?>            
    </div>

    <div class="footer">
        <?php include_once '../footer/footer.php'?>
=======

       
</div>
<div class="short-description">
                        <div class="title">Opis proizvoda:</div>
                        <div class="description">Napomena: Kako bi Vam dali predstavu o dimenzijama modlice, ispisane su tačne dimenzije za jednu vličinu modle,
                             u tabeli ispod je navedeno koja veličina je obrađena. Ukoliko Vas zanimaju detalji za drugu dimenziju modle, pišite nam. Više detalja o
                            modlama možete saznati <a href="footer/o-nama.php#modle">ovde</a></div>
                   <table id='product_description'>
                        <?php 
                            $description=$query->selectdescriptionforspecificproduct($product_id);
                            while ($row=$description->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                                <tr>
                                    <th>Debljina sekača</th>
                                    <td><?php echo $row['debljina_sekaca']?></td>
                                </tr>

                                <tr>
                                    <th>Širina modle</th>
                                    <td><?php echo $row['sirina_modle']?></td>
                                </tr>

                                <tr>
                                    <th>Dužina modle</th>
                                    <td><?php echo $row['duzina_modle']?></td>
                                </tr>

                                <tr>
                                    <th>Debljina utiskivača</th>
                                    <td><?php echo $row['debljina_utiskivaca']?></td>
                                </tr>

                                <tr>
                                        <th>Težina modle</th>
                                        <td><?php echo $row['tezina_modle']?></td>
                                </tr>
                                <tr>
                                    <th>Visina utiskivača</th>
                                    <td><?php echo $row['visina_utiskivaca']?></td>
                                </tr>
                                <tr>
                                    <th>Visina sekača</th>
                                    <td><?php echo $row['visina_sekaca']?></td>
                                </tr>
                                <tr>
                                    <th>Utiskivač i sekač su spojeni</th>
                                    <td><?php echo $row['utiskivac_sekac_spojeni']?></td>
                                </tr>
                                <tr>
                                    <th>Veličina opisanog proizvoda je:</th>
                                    <td><?php echo $row['velicina_testiranog_proizvoda']?></td>
                                </tr>

                            <?php }?>
                   </table>
                </div>

    <div class="related-product">
            <div class="related-product-text">
                Možda će Vam zatrebati i ovo
            </div>
            <?php 
        
            $products=$query->relatedProducts($kategorija);
            while ($row=$products->fetch(PDO::FETCH_ASSOC)) {
                if ($row['modlaId']!=$product_id) {
                    $func->write_product($row['modlaId'],$row['slika'],$row['modlaNaziv']);
                }
               
             } ?>
    </div>


<div class="footer">
    <?php include_once '../footer/footer.php'?>
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
    </div>
