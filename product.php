<?php
require_once 'partials/head.php';
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
$msg=isset($msg)?$msg:"";

if (isset($_POST['buy'])) {
    $id=$_POST['id'];
    $naziv=$_POST['naziv_proizvoda'];
    $size=$_POST['size'];
    $imprint=$_POST['imprint'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];

    if ($_POST['size']!='-' && $_POST['imprint']!='-') {
        $arr=$func->add_in_array_imp($id,$naziv,$size,$imprint,$price,$quantity);    
        $mess=$func->sessionCart('product_cart',$arr,$id);
        $func->refresh();
        header('Location:cart.php');
    }else{
        ?>
    <div class="msg-error">
        <?php echo $msg='Morate odabrati veličinu i utiskivač'?>
    </div>
        <?php
    
    }
}

?>

<div class="product" >
    <section class="product-img-tit">
     
       <form action="" method="post">
           
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
                        $slika = $row['slika'];
                       
                        ?>

                        <div class="path">
                            <?php echo $row['naziv kategorije']." > ".$row['naziv modle']; ?>
                        </div>

                        <div class="product-img">
                        <img src="images/modle/<?php echo $slika ?>" alt="image of product">
                        </div>
    </section>

    <section class="product-info">
        
      
        <div class="choose-properties">

        <div class="product-title">
                            <?php echo $naziv_proizvoda;?>
                            <input type="text" name="naziv_proizvoda" id="" value='<?php echo $naziv_proizvoda;?>' hidden>
                        </div>

                <div class="size">
               
                    <select name="size" id="sizee">
                        <option value="-" selected='selected'>Odaberite dimenziju</option>
                        <?php
                            $velicina=$query->selectSizes($product_id);
                        
                             while ($row=$velicina->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?php echo $row['ID']?>"><?php echo $row['Dimenzija'] ?> cm</option>
                                
                        <?php  } ?>
                     </select>
                </div>            

                   
                <div class="imprint">
                    
                        <select name="imprint" id="imprint">
                            <option value="-" selected='selected'>Odaberite utiskivac</option>
                            <?php
                                $selectimprint=$query->selectImprint($product_id);  

                                while ($row=$selectimprint->fetch(PDO::FETCH_ASSOC)) {  ?>
                                <option value="<?php echo $row['ID']?>"> <?php echo $row['Naziv'] ?></option>
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
                                   
                    <button type="submit" name="buy">Dodaj u korpu</button>  
              
        </div>  
         
    </section>   
        <?php    
    }
             }
        ?>
        </form>

       
</div>
<div class="short-description">
                        <h4>Opis proizvoda:</h4>
                        <p>Napomena: Kako bi Vam dali predstavu o dimenzijama modlice, ispisane su tačne dimenzije za jednu vličinu modle, u tabeli ispod je navedeno koja veličina je obrađena. Ukoliko Vas zanimaju detalji za drugu dimenziju modle, pišite nam.</p>
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
        
            $products=$query->selectcookiecutterbycategories($kategorija);
            while ($row=$products->fetch(PDO::FETCH_ASSOC)) {
                $func->write_product($row['modlaId'],$row['slika'],$row['modlaNaziv']);
             } ?>
    </div>


<div class="footer">
    <?php include_once 'footer/footer.php'?>
    </div>
