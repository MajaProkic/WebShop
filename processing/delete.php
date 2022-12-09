<?php
require_once '../functions/functions.php';
<<<<<<< HEAD
require_once (__DIR__.'/../header/url_extension.php');
=======
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
session_start();
$func=new Functions();
global $func;
if (isset($_POST['del'])) {
    echo 'caca';
    $deleted_id=$_POST['del'];
    echo $deleted_id;

    $key=array_search($deleted_id,array_column($_SESSION['product_cart'],'id'));
    if($key!==false){
        unset($_SESSION['product_cart'][$key]);
        $_SESSION['product_cart'] = array_values($_SESSION['product_cart']);
        return $_SESSION['product_cart'];
    }else {
       
    }
  
}
?>