<?php
require_once (__DIR__.'/../header/header.php');
require_once (__DIR__.'/../header/head.php');
require_once (__DIR__.'/../functions/functions.php');
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

if(isset($_POST['poruci'])){
 
    $ime=$func->test_input($_POST['ime']);
    $prezime=$func->test_input($_POST['prezime']);
    $email=$func->test_input($_POST['email']);
    $mesto=$func->test_input($_POST['mesto']);
    $ulica=$func->test_input($_POST['ulica']);
    $broj=$func->test_input($_POST['broj']);
    $telefon=$func->test_input($_POST['telefon']);
    $napomena=$func->test_input($_POST['napomena']);
    $datum_i_vreme=date('Y-m-d H:i:s');
    $status='Neobradjeno';
    $nacin_placanja=$_POST['nacinplacanja'];
    $kurirska_sluzba=$_POST['kurirskaSluzba'];

    $is_customer_inserted=$is_order_inserted=$is_ordered_items_inserted=false;

    //Check if customer already exist in database
    $getUSersID=$query->getUsersID($email,$telefon);
    $countOfRows=$getUSersID->rowCount();

    if($countOfRows==0){

        $insertCustomer=$query->insertKupac($ime,$prezime,$email,$mesto,$ulica,$broj,$telefon); 

        #CHECK INSERTED CUSTOMER
        $check_inserted_customer=$query->CHECKFORINSERTEDCUSTOMER();
        while ($row=$check_inserted_customer->fetch(PDO::FETCH_ASSOC)) {
            $DB_email=$row['email'];
            $DB_telefon=$row['telefon'];
            global $email,$telefon;
        }
        if ($DB_email==$email && $DB_telefon==$telefon) {
            $is_customer_inserted=true;
        }

        #GET ID OF NEW USER
        $getNewUsersID=$query->getUsersID($email,$telefon);
        while ($row=$getNewUsersID->fetch(PDO::FETCH_ASSOC)) {
            $id_new_user= $row['id'];
            global $id_new_user;
        }

        #INSERT ORDER
       $insertOrder=$query->insertOrder($id_new_user,$datum_i_vreme,$status,$napomena,$nacin_placanja,$kurirska_sluzba);
       $_SESSION['orderNo2']=$insertOrder;
        #CHECK FOR INSERTED ORDER
        $trimdata=substr($datum_i_vreme,17);
       
        $checkfor=$query->CHECKFORINSERTEDORDEREDITEMS();
        while ($row=$checkfor->fetch(PDO::FETCH_ASSOC)) {
            $datum= $row['datum'];
            $id_user=$row['id_user'];
            global $datum,$id_user;
        }

        $trimfromdatabase=substr($datum,17);
        if ($trimdata==$trimfromdatabase && $id_of_old_user==$id_user) {
            $is_order_inserted=true;
        }
       
       foreach ($_SESSION['product_cart'] as $key) {
        $insertOrderedItems=$query->insertOrderedItems($key['id'],$insertOrder,$key['quantity'], $key['imprint'], $key['size'], $key['price']);
        } 

        #CHECK FOR INSERTED ORDER ITEMS
        $check_for_inserted_order_items=$query->CHECKFORINSERTEDORDERITEMS();
        while ($row=$check_for_inserted_order_items->fetch(PDO::FETCH_ASSOC)) {
            $DB_ID_narudzbenice=$row['ID_narudzbenice'];
            global $DB_ID_narudzbenice;
        }
        if ($insertOrder==$DB_ID_narudzbenice) {
            $is_ordered_items_inserted=true;
        }

        #CHECKING
        if ($is_customer_inserted==true && $is_order_inserted==true && $is_ordered_items_inserted==true) {
            $func->successfulClass('Sve je top :)');
        }else {
            $msg='Customer is inserted: '.$is_customer_inserted.' <br> Order is inserted: '.$is_order_inserted.'<br> Order items are inserted: '.$is_ordered_items_inserted;
            $func->errorClass($msg);
        }
        

    }else{
        //CUSTOMER ALREADY EXIST
        $msg= 'Ovaj kupac vec postoji';

        while ($row=$getUSersID->fetch(PDO::FETCH_ASSOC)) {
            $id_of_old_user= $row['id'];
            global $id_of_old_user;
         
        }

        $insertOrder=$query->insertOrder($id_of_old_user,$datum_i_vreme,$status,$napomena,$nacin_placanja,$kurirska_sluzba);
        $_SESSION['orderNo1']=$insertOrder;

        foreach ($_SESSION['product_cart'] as $key) {
            
            $query->insertOrderedItems($key['id'],$insertOrder,$key['quantity'], $key['imprint'], $key['size'], $key['price']);  
        }
         #CHECK FOR INSERTED ORDER ITEMS
         $check_for_inserted_order_items=$query->CHECKFORINSERTEDORDERITEMS();
        while ($row=$check_for_inserted_order_items->fetch(PDO::FETCH_ASSOC)) {
            $DB_ID_narudzbenice=$row['ID_narudzbenice'];
            global $DB_ID_narudzbenice;
        }
        if ($insertOrder==$DB_ID_narudzbenice) {
            $is_ordered_items_inserted=true;
        }

         #CHECK FOR INSERTED ORDER
        $trimdata=substr($datum_i_vreme,17);
       
        $checkfor=$query->CHECKFORINSERTEDORDEREDITEMS();
        while ($row=$checkfor->fetch(PDO::FETCH_ASSOC)) {
            $datum= $row['datum'];
            $id_user=$row['id_user'];
            global $datum,$id_user;
        }

        $trimfromdatabase=substr($datum,17); //oduzimanje sekundi
        if ($trimdata==$trimfromdatabase && $id_of_old_user==$id_user) {
            $is_order_inserted=true;
        }

        if ($is_order_inserted==true && $is_ordered_items_inserted==true) {
            $func->successfulClass('Porudzbina je uspešno kreirana');
        }else {
            $msg='Customer is inserted: '.$is_customer_inserted.' <br> Order is inserted: '.$is_order_inserted.'<br> Order items are inserted: '.$is_ordered_items_inserted;
            $func->errorClass($msg);
        }
    }


}

if(isset($_GET['truncate_cart'])){
    if(isset($_SESSION['product_cart'])){
        session_destroy();
    }
}

    
?>
<div class="cart">
<div class="cart-table">

    <div class="title">
     Korpa sa proizvodima
    </div>
    <table>
        <thead>
            <tr>
                <th>Sifra</th>
                <th>Naziv</th>
                <th>Slika</th>
                <th>Veličina</th>
                <th>Utiskivac</th>
                <th>Kolicina</th>
                <th>Obriši</th>
                <th>Cena</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($_SESSION['product_cart'])) { ?>
                    <form action="" method="post">

             <?php  $total_price=0;
                    foreach ($_SESSION['product_cart'] as $key) {             
                ?>
                    <tr id='cart'> 
                        <td><input type="text" name="id" id="" value='<?php echo $key['id']; ?>'readonly="readonly"></td>
                        <td><input type="text" name="naziv" id="" value='<?php echo $key['naziv'] ?>'readonly="readonly" ></td>
                        <?php $image=$query->getProductByid($key['id']);
                        while ($row=$image->fetch(PDO::FETCH_ASSOC)) {?>
                        <td><img src="/Modlice/images/modle/<?php echo $row['slika']?>" alt="slika modle"></td>
                       <?php } ?>
                        

                        <td><input type="text" name="size" id="" value='<?php echo $key['size'] ?>'readonly="readonly" ></td>
                        <td><?php if ($key['imprint']==2) {?>
                           <input type="text" name="utiskivac" id="" value='<?php echo 'Bez utiskivaca' ?>'readonly="readonly" >
                       <?php }else{?>
                        <input type="text" name="utiskivac" id="" value='<?php echo 'Sa utiskivacem' ?>' readonly="readonly" >
                       <?php }?>
                       <td><input type="text" name="quantity" id="" value='<?php echo $key['quantity']?>'readonly="readonly"></td>
                        <td class='delete'><input type="button" name='<?php echo $key['id']?>' value="obrisi" class='bt'></td>
                        <td>
                         <input type="text" name="cena" id="" value="<?php echo $key['price']*$key['quantity'];
                         $total_price=$total_price+$key['price']*$key['quantity']?>"readonly="readonly">
                        </td>
                    </tr>
                   
            <?php }  ?>

        </tbody>
    </table>

        <div class="total_price">
            <p>Ukupna cena</p>
            <input type="text" name="totalPrice" class='total_price' value=' <?php echo $total_price?> RSD' id="" readonly> 
        </div>
            
        <button id="truncate-cart"><a href="cart.php?truncate_cart">Isprazni korpu</a></button>
        <button><a href="../index.php#<?php echo $key['id']?>">Nastavite sa kupovinom</a></button> 

    <?php }else{  
            $msg='Vasa korpa je prazna';
            $func->infoClass($msg);
         } ?>

</div>

        <div class="title">
            <h2>Popunite Vaše podatke za slanje</h2>
        </div>

            <div class="customer-info">
                <div class="form-div">
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
                                <input type="text" name="prezime" id="prezime" placeholder="Prezime" required="required" >
                                <input type="text" name="email" id="email" placeholder='E-mail' required="required" >
                                <input type="text" name="mesto" id="mesto" placeholder='Mesto' required="required" >
                                <input type="text" name="ulica" id="ulica" placeholder='Ulica' required="required" >
                                <input type="number" name="broj" id="broj" placeholder='Broj' required="required" >
                                <input type="number" name="telefon" id="telefon" placeholder='Broj telefona' required="required" >
                            <?php }?>
                        
                                <textarea name="napomena" id="napomena" cols="30" rows="10" placeholder='Napomena'></textarea>
                        
                                <div class="nacin-placanja">
                                    <input type="radio" name="nacinplacanja" value='Pouzećem' id="">
                                    <span>Pouzećem</span>
                                    <input type="radio" name="nacinplacanja" value='Pre slanja' id="">
                                    <span>Pre slanja</span>
                                </div>

                                <div class="kurirska-sluzba">
                                    <input type="radio" name="kurirskaSluzba" value='Post express' id="">
                                    <span>Post ekspress</span>
                                    <input type="radio" name="kurirskaSluzba" value='D-Express' id="">
                                    <span>D-Express</span>
                                </div>
                  
                    <button id='btn-poruci' type="submit" name="poruci">Poruči</button>
                </div>
            </form>
            <div class="info-for-customer">
                <button> <a href="https://www.posta.rs/cir/alati/KalkulatorCena.aspx?vrPos=peSrb" target=”_blank” >Post Express kalkulator cena</a></button>
                <button><a href="https://www.dexpress.rs/rs/kalkulator-cena">D-Express kalkulator cena</a></button>
            </div>
        </div>
</div>

<div class="footer">
    <?php include_once '../footer/footer.php'?>
</div>


