<?php
require_once (__DIR__.'/../header/header.php');
require_once (__DIR__.'/../header/head.php');
require_once (__DIR__.'/../functions/functions.php');
include_once(__DIR__.'/../header/nav.php');
require_once(__DIR__.'/../DB/query.php');
require_once(__DIR__.'/../DB/Database.php');

$database=new Database();
$db=$database->connection();
$func=new Functions();
global $func;
$query=new Query($db);
global $query;
$msg=isset($msg)?$msg:"";

?>
<section class="contact-page">
    <div class="title">Kontaktirajte nas</div>
    <div class="contact-form">
        <form action="" method='post'>
            <input type="text" name="ime_i_prezime" id="" required='required' placeholder='Ime i prezime'>
            <input type="text" name="email" id="" required='required' placeholder='E-mail'>
            <textarea name="poruka" id="" cols="30" rows="10" required='required' placeholder='Unesite poruku ili pitanje'></textarea>
            <button type='submit' name='kontakt'> Pošalji</button>
        </form>
    </div>
    <div class="contact-info">
        <div class="c-info"><img src="../images/icons8-mail-32.png" alt=""> E-mail: radionica.3D@outlook.com</div>
        <div class="c-info"><img src="../images/icons8-phone-32.png" alt="">Broj telefona: 062/843/319/2</div>
        <div class="c-info"><img src="../images/icons8-location-32.png" alt="">Lokacija: 34310 Topola</div>
    </div>
</section>

<div class="footer">
    <?php include_once (__DIR__.'/../footer/footer.php')?>
</div>

-