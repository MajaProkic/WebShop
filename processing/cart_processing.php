<?php

require_once (__DIR__.'/../header/header.php');
require_once (__DIR__.'/../header/url_extension.php');
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
    $nacin_placanja=$_POST['payment'];
    $kurirska_sluzba=$_POST['delivery'];
    global $users_ID;

    $is_customer_inserted=$is_order_inserted=$is_ordered_items_inserted=false;

    //Check if customer already exist in database
    $getUSersID=$query->getUsersID($email,$telefon);
    $countOfRows=$getUSersID->rowCount();

    if($countOfRows==0){

        $insertCustomer=$query->insertKupac($ime,$prezime,$email,$mesto,$ulica,$broj,$telefon); 
        $users_ID=$insertCustomer;
         
    }else{

        while ($row=$getUSersID->fetch(PDO::FETCH_ASSOC)) {
            $id_of_old_user= $row['id'];
            $users_ID=$id_of_old_user;
        }
    }

        $insertOrder=$query->insertOrder($users_ID,$datum_i_vreme,$status,$napomena,$nacin_placanja,$kurirska_sluzba);
       $_SESSION['orderNo']=$insertOrder;

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
        $_SESSION['id_customer']=$users_ID;
    echo $_SESSION['id_customer'];
    header('Location:'.$_SESSION['base'].'/content/invoice.php');
    unset($_SESSION['product_cart']);
}

    
?>
