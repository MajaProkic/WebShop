<?php
require_once (__DIR__.'/../header/header.php');
require_once (__DIR__.'/../header/head.php');
require_once (__DIR__.'/../header/nav.php');
require_once (__DIR__.'/../functions/functions.php');
require_once(__DIR__.'/../DB/query.php');
require_once(__DIR__.'/../DB/Database.php');
<<<<<<< HEAD
require_once (__DIR__.'/../header/url_extension.php');
=======
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61

$database=new Database();
$db=$database->connection();
$msg=isset($msg)?$msg:"";
$query=new Query($db);
global $query;
$func=new Functions();
global $func;
global $orderID;

if (isset($_SESSION['id_customer'])) {
    $orderID=$_SESSION['orderNo'];

    $result=$query->joinedOrdersByCustomer($_SESSION['id_customer']);
    while ($row=$result->fetch(PDO::FETCH_ASSOC)) {
        global $id_user,$id_narudzbenice, $datum,$isporuka,$nacinPlacanja;
        $id_user=$row['id_user'];
        $id_narudzbenice=$row['ID_narudzbenice'];
        $datum=$row['datum'];
        $isporuka=$row['kurirska_sluzba'];
        $nacinPlacanja=$row['nacin_placanja'];

    }
    $result=$query->allAboutCustomer($_SESSION['id_customer']);
while ($row=$result->fetch(PDO::FETCH_ASSOC)) {
    global $imeiprezime,$adresa,$telefon,$email;
    $imeiprezime=$row['ime'].' '.$row['prezime'];
    $adresa=$row['mesto'].' '.$row['ulica'].' '.$row['broj'];
    $telefon=$row['telefon'];
    $email=$row['email'];
}


}else{
<<<<<<< HEAD
    echo 'Nije pronadjen kupac pod navedenim ID-jem';
}

  ?>
<div class="invoice">
    <div class="logo">
        <img src="<?php echo $_SESSION['base']?>/images/logo.jpg" alt="logo">
=======
    echo 'nema';
}



  ?>
<div class="invoice">
    <div class="logo">
        <img src="/Modlice/images/logo.jpg" alt="logo">
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
        <div class="title">
            3D Radionica - Predračun
        </div>
 
        <div class="invoice-no">
            Broj porudzbine: <?php echo $id_narudzbenice?>
        </div>
    </div>
<<<<<<< HEAD
<div class="line"></div>
=======

>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
    <div class="supplier-client-data">
        <div class="supplier">
            <div class="title">
                Prodavac
            </div>
            <div class="s-name"><span>Naziv: </span>3D radionica  </div>
            <div class="s-address"><span>Adresa: </span>34310 Topola, selo Ovsiste bb </div>
            <div class="s-phone"><span>Telefon: </span>0628433192 </div>
            <div class="s-email"><span>E-mail: </span>3dradionica@outlook.com </div>
        </div>

        <div class="client">
            <div class="title">
                Kupac
            </div>
            <div class="c-name"><span>Ime i prezime: </span><?php echo $imeiprezime?> </div>
            <div class="c-address"><span>Adresa:</span> <?php echo $adresa?></div>
            <div class="c-phone"><span>Telefon:</span><?php echo $telefon?> </div>
            <div class="c-email"><span>E-mail:</span> <?php echo $email?></div>
        </div>
    </div>

    <div class="order-details">
        <div class="date"><span>Datum i vreme kreiranja poruzdbine:</span> <?php echo $datum?> </div>
        <div class="delivery"><span>Način isporuke:</span><?php echo $isporuka?></div>
        <div class="payment-way"><span>Način plaćanja:</span><?php echo $nacinPlacanja?> </div>
    </div>

    <div class="ordered-items">
        <table>
            <thead>
                <th>Sifra artikla</th>
                <th>Naziv</th>
                <th>Utiskivač</th>
                <th>Veličina</th>
                <th>Količina</th>
                <th>Cena</th>
            </thead>
            <tbody>
                <?php
                    $poruceni_artikli=$query->getSpecificOrderByIdCustomerAndIdOfOrder($_SESSION['orderNo']);
                    while ($row=$poruceni_artikli->fetch(PDO::FETCH_ASSOC)) {
                
                ?>
                <tr>
                    <td><?php echo $row['ID_proizvoda']?></td>
                    <td><?php echo $row['naziv']?></td>
                    <td><?php echo $row['utiskivac']?></td>
                    <td><?php echo $row['velicina']?></td>
                    <td><?php echo $row['kolicina']?></td>
                    <td><?php 
                    global $total_price;
<<<<<<< HEAD
                    
                    echo $ukupna_cena_po_proizvodu= $row['cena']*$row['kolicina'];
                    $total_price+=$ukupna_cena_po_proizvodu;
                    ?>
                </td>
=======
                    $total_price+=$row['cena'];
                    echo $row['cena']?></td>
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="total_price">
                      Ukupno:  <?php echo $total_price;?> RSD
        </div>
        <div class="print-button">
    
<<<<<<< HEAD
   <a href="#" onclick="window.print()"><img src="<?php echo $_SESSION['base']?>/images/icons8-print-50.png" alt=""></a> 
   <a href="<?php $_SESSION['base']?>/index.php"><img src="<?php echo $_SESSION['base']?>/images/icons8-home-48.png" alt="gggg"></a>
=======
   <a href="#" onclick="window.print()"><img src="/Modlice/images/icons8-print-50.png" alt=""></a> 
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
    </div>
    </div>
  
    

</div>