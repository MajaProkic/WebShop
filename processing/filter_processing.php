<?php
require_once(__DIR__.'/../DB/query.php');
require_once(__DIR__.'/../DB/Database.php');
require_once(__DIR__.'/../functions/functions.php');
<<<<<<< HEAD
require_once (__DIR__.'/../header/url_extension.php');
=======
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61


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
<<<<<<< HEAD
                $func->write_product($row['id'],$row['slika1'],$row['naziv']);
=======
                $func->write_product($row['id'],$row['slika'],$row['naziv']);
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
            }
            break;

        case '1':
            $lastAdded=$query->latestAddedCookieCutter();
            while ($row=$lastAdded->fetch(PDO::FETCH_ASSOC)) {
<<<<<<< HEAD
                $func->write_product($row['id'],$row['slika1'],$row['naziv']);
=======
                $func->write_product($row['id'],$row['slika'],$row['naziv']);
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
            }
            break;
        
        case '2':
            $getCookieCutterWithImprint=$query->getCookieCutterWithimprint();
            while ($row=$getCookieCutterWithImprint->fetch(PDO::FETCH_ASSOC)) {
<<<<<<< HEAD
                $func->write_product($row['id'],$row['slika1'],$row['naziv']);
=======
                $func->write_product($row['id'],$row['slika'],$row['naziv']);
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
            }
            break;
        case '3':
            $getCookieCutterWithoutImprint=$query->getCookieCutterWithoutimprint();
            while ($row=$getCookieCutterWithoutImprint->fetch(PDO::FETCH_ASSOC)) {
<<<<<<< HEAD
                $func->write_product($row['id'],$row['slika1'],$row['naziv']);
=======
                $func->write_product($row['id'],$row['slika'],$row['naziv']);
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
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