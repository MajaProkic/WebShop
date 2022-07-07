<?php
require_once (__DIR__.'/../header/header.php');
require_once (__DIR__.'/../header/head.php');
require_once (__DIR__.'/../functions/functions.php');
include_once(__DIR__.'/../header/nav.php');
require_once(__DIR__.'/../DB/query.php');
require_once(__DIR__.'/../DB/Database.php');

$database=new Database();
$db=$database->connection();
$msg=isset($msg)?$msg:"";
$query=new Query($db);
global $query;

?>
    <section class="cover-image">
            <div class="cover-text">
                <h1>Dobrodošli na sajt 3D radionice!</h1>
              <a href ='#products' class="buy-cover">Pogledajte ponudu</a>
            </div>
    </section>

 <div class="footer">
    <?php include_once '../footer/footer.php'?>
</div>