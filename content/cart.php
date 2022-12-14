<?php
require_once (__DIR__.'/../header/header.php');
require_once (__DIR__.'/../header/url_extension.php');
require_once (__DIR__.'/../header/head.php');
include_once(__DIR__.'/../header/nav.php');
require_once(__DIR__.'/../DB/query.php');
require_once(__DIR__.'/../DB/Database.php');
$database=new Database();
$db=$database->connection();
global $db;
$query=new Query($db);
global $query;
$msg=isset($msg)?$msg:"";
$func=new Functions();
global $func;

if(isset($_POST['korpa'])){
    header("Location:cart_final.php");
}
if(isset($_GET['delete'])){
    unset($_SESSION['product_cart'][$_GET['delete']]);
}
if(isset($_GET['deleteall'])){
    unset($_SESSION['product_cart']);
}
?>
 <form action="../processing/cart_processing.php" method="post">

    <div class="cart">
        <div class="additional-information">
            <div class="title">
                Detalji porudžbine
            </div>
            <!-- KURIRSKA SLUZBA-->
            <div class="delivery">
                <div class="title">Odaberite kurirsku službu</div>
                <label for="delivery">
                    <input type="radio" name="delivery" id="" value="Post_Express" required>
                    Post Express
                </label>
                <label for="delivery">
                    <input type="radio" name="delivery" id="" value="D-express" required>
                    D-express
                </label>
            </div>

            <div class="payment">
                <div class="title"> Odaberite način plaćanja</div>
                <label for="payment">
                    <input type="radio" name="payment" value="Pouzećem" id="" required>
                    Pouzećem
                </label>
                <label for="payment">
                    <input type="radio" name="payment" value="Uplata_preko_računa" id="" required>
                    Uplata preko računa
                </label>
            </div>
            
            <!--USER INFORMATION-->
            <div class="customer-info">
           <div class="title"> Unesite svoje podatke za slanje</div>
            <?php if (isset($_SESSION['username'])) {
                        $user=$query->getSpecificUserByUsername($_SESSION['username']);
                            while ($row=$user->fetch(PDO::FETCH_ASSOC)) {?>
                                <input type="text" name="ime" id="ime" placeholder="Ime" required="required" value='<?php echo $row['ime']?>' >
                                <input type="text" name="prezime" id="prezime" placeholder="Prezime" required="required" value='<?php echo $row['prezime']?>' >
                                <input type="text" name="email" id="email" placeholder='E-mail' required="required"  value='<?php echo $row['email']?>'>
                                <input type="text" name="mesto" id="mesto" placeholder='Mesto' required="required" value='<?php echo $row['mesto']?>'>
                                <input type="text" name="ulica" id="ulica" placeholder='Ulica' required="required" value='<?php echo $row['ulica']?>'>
                                <input type="number" name="broj" id="broj" placeholder='Broj' required="required" value='<?php echo $row['broj']?>'>
                                <input type="number" name="telefon" id="telefon" placeholder='Broj telefona' required="required" value='<?php echo $row['broj_telefona']?>'>
                            <?php } 
                                    }else{?>
                                <input type="text" name="ime" id="ime" placeholder="Ime" required="required" >
                                <span id='error_ime'></span>
                                <input type="text" name="prezime" id="prezime" placeholder="Prezime" required="required" >
                                <span id='error_prezime'></span>
                                <input type="text" name="email" id="email" placeholder='E-mail' required="required" >
                                   <span id='error_email'></span> 
                                <input type="text" name="mesto" id="mesto" placeholder='Mesto' required="required" >
                                <span id='error_mesto'></span> 
                                <input type="text" name="ulica" id="ulica" placeholder='Ulica' required="required" >
                                <span id='error_ulica'></span>    
                                <input type="number" name="broj" id="broj" placeholder='Broj' required="required" >
                                <span id='error_broj'></span>    
                                <input type="number" name="telefon" id="telefon" placeholder='Broj telefona' required="required" >
                            <?php }?>
                        
                                <textarea name="napomena" id="napomena" cols="30" rows="10" placeholder='Napomena'></textarea>
                            </div>
           
        </div>

        <div class="cart-table">
            <div class="title">Vaša korpa</div>
            <?php if (isset($_SESSION['product_cart'])) { ?>
            <table>
                <thead>
                    <tr>
                        <th>Slika proizvoda</th>
                        <th>Naziv</th>
                        <th>Velicina proizvoda</th>
                        <th>Utiskivac</th>
                        <th>Kolicina</th>
                        <th>Cena</th>
                        <th>Sifra proizvoda</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $total_price=$counter=0;
                    
                        foreach ($_SESSION['product_cart'] as $key) {
     
                         $counter=$counter+1;
                            ?>
                        <tr class='table-product'>
                            
                            <?php
                            //slika 
                            $image=$query->getProductByid($key['id']);
                            while ($row=$image->fetch(PDO::FETCH_ASSOC)) {
                   
                                ?>
                            <td><img src="<?php echo $_SESSION['base']?>/images/modle/<?php echo $row['slika1']?>" alt="slika modle"></td>
                            <?php } ?>

                            <!--Naziv proizvoda-->
                            <td><input type="text" name="naziv" id="" value='<?php echo $key['naziv'] ?>'readonly="readonly" ></td>
                            
                            <td><input type="text" name="size" id="" value='<?php echo $key['size'] ?>'readonly="readonly" ></td>
                            <td><?php if ($key['imprint']==0) {?>
                            <input type="text" name="utiskivac" id="" value='<?php echo 'Bez utiskivaca' ?>'readonly="readonly" >
                        <?php }else if($key['imprint']==1){?>
                            <input type="text" name="utiskivac" id="" value='<?php echo 'Sa utiskivacem' ?>' readonly="readonly" >
                        <?php }?></td>
                            <td><input type="text" name="quantity" id="" value='<?php echo $key['quantity']?>'readonly="readonly"></td>
                            <td><input type="text" name="cena" id="" value="<?php echo $key['price']*$key['quantity'];
                            $total_price=$total_price+$key['price']*$key['quantity']?>"readonly="readonly"></td>
                            <td><input type="text" name="id" id="" value='<?php echo $key['id']; ?>'readonly="readonly"></td>
                            <td class='delete'><a href="cart.php?delete=<?php echo $key['id']?>"><img src="<?php echo $_SESSION['base']?>/images/icons8-x-48.png" alt="x" class='small-img'></a></td>
                        </tr>
                       
                    <?php } ?>
                
                </tbody>
            </table>
            <div class="total-price">
                Ukupno: <?php echo $total_price .' RSD'?>
            </div>
            <button id='btn-poruci' type="submit" name="poruci">Naredni korak</button>
            <a href="cart.php?deleteall"> <img src="<?php echo $_SESSION['base']?>/images/icons8-trash-50.png" alt="" class='small-img'></a>
          
        </div>
                <!-- TABELA ZA RESPONZIVNOST -->
                   
    <div class="res">
        <div class="title">Korpa</div>
                <?php 
                    $total_price=0;
                    foreach ($_SESSION['product_cart'] as $key) {
                ?>

                <div class="responsive-cart-table">
                    <div class="img">
                            <?php
                                //slika 
                                $image=$query->getProductByid($key['id']);
                                while ($row=$image->fetch(PDO::FETCH_ASSOC)) {?>
                                <img src="<?php echo $_SESSION['base']?>/images/modle/<?php echo $row['slika1']?>" alt="slika modle">
                            <?php } ?>
                    </div>
                    <div class="description">
                        <span id='naziv'>
                            <input type="text" name="naziv" id="" value='<?php echo $key['naziv'] ?>'readonly="readonly" >
                        </span>

                        <span id='imprint'>
                            <?php if ($key['imprint']==0) {?>
                                <input type="text" name="utiskivac" id="" value='<?php echo 'Bez utiskivaca' ?>'readonly="readonly" >
                            <?php }else{?>
                                <input type="text" name="utiskivac" id="" value='<?php echo 'Sa utiskivacem' ?>' readonly="readonly" >
                            <?php }?>
                        </span>

                        <span id='size'>
                            <input type="text" name="size" id="" value='<?php echo $key['size'] ?>'readonly="readonly" >
                        </span>
                            
                        <span id="price"><input type="text" name="cena" id="" value="<?php echo $key['quantity']?>"readonly="readonly">
                        <?php //echo $key['price']*$key['quantity'];
                            //$total_price=$total_price+$key['price']*$key['quantity']?>
                        </span>
                    </div>

                    <div class="quantity">
                        <span id="quantity">
                            <input type="text" name="quantity" id="" value='<?php echo $key['quantity']?>'readonly="readonly">
                        </span>
                    </div>

                    <div class="delete">
                        <a href="cart.php?delete=<?php echo $key['id']?>"><img src="<?php echo $_SESSION['base']?>/images/icons8-x-48.png" alt="x" class='small-img'></a>
                    </div>
                    
             
                </div>
                <?php }?>  
                <div class="total-price">
                Ukupno: <?php echo $total_price .' RSD'?>
            </div>
            <button id='btn-poruci' type="submit" name="poruci">Naredni korak</button>
            <a href="cart.php?deleteall"> <img src="<?php echo $_SESSION['base']?>/images/icons8-trash-50.png" alt="" class='small-img'></a>
    </div>
                    
        <?php }else{  
            $msg='Vasa korpa je prazna';
            $func->infoClass($msg);
         } ?>
   
    </div>

</form>
                  
<div class="footer">
    <?php include_once '../footer/footer.php'?>
</div>
