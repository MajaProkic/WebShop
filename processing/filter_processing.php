<?php
require_once(__DIR__.'/../DB/query.php');
require_once(__DIR__.'/../DB/Database.php');
require_once(__DIR__.'/../functions/functions.php');
require_once (__DIR__.'/../header/url_extension.php');


$database=new Database();
$db=$database->connection();

$query=new Query($db);
global $query;

    $func=new Functions();
    global $func;

if(isset($_POST['value'])){
 $vrednost= $_POST['value'];
    switch ($vrednost) {
        case '0':
            $getAllProducts=$query->getAllProducts();
            while ($row=$getAllProducts->fetch(PDO::FETCH_ASSOC)) {
                $func->write_product($row['id'],$row['slika1'],$row['naziv']);
            }
            break;

        case '1':
            $lastAdded=$query->latestAddedCookieCutter();
            while ($row=$lastAdded->fetch(PDO::FETCH_ASSOC)) {
                $func->write_product($row['id'],$row['slika1'],$row['naziv']);
            }
            break;
        
        case '2':
            $getCookieCutterWithImprint=$query->getCookieCutterWithimprint();
            while ($row=$getCookieCutterWithImprint->fetch(PDO::FETCH_ASSOC)) {
                $func->write_product($row['id'],$row['slika1'],$row['naziv']);
            }
            break;
        case '3':
            $getCookieCutterWithoutImprint=$query->getCookieCutterWithoutimprint();
            while ($row=$getCookieCutterWithoutImprint->fetch(PDO::FETCH_ASSOC)) {
                $func->write_product($row['id'],$row['slika1'],$row['naziv']);
            }
            break;
        case '4':
            /*$orderByPriceDiscending=$query->orderByPriceDiscending();
            while ($row=$orderByPriceDiscending->fetch(PDO::FETCH_ASSOC)) {
                $func->write_product($row['id'],$row['slika'],$row['naziv']);
            }*/
            echo 'Ovaj filter trenutno nije u funkciji';
            break;
        case '5':
            /*$orderByPriceAscending=$query->orderByPriceAscending();
            while ($row=$orderByPriceAscending->fetch(PDO::FETCH_ASSOC)) {
                $func->write_product($row['id'],$row['slika'],$row['naziv']);
            }*/
            echo 'Ovaj filter trenutno nije u funkciji';
            break;
        
        default:
            # code...
            break;
    }
}
?>