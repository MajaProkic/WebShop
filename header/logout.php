<?php
require_once (__DIR__.'/../header/header.php');
<<<<<<< HEAD
require_once (__DIR__.'/../header/url_extension.php');
=======
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
require_once (__DIR__.'/../header/head.php');
require_once (__DIR__.'/../functions/functions.php');
require_once(__DIR__.'/../DB/query.php');
require_once(__DIR__.'/../DB/Database.php');

$database=new Database();
$db=$database->connection();
$msg=isset($msg)?$msg:"";
$query=new Query($db);
global $query;

session_start();
unset($_SESSION['username']);
unset($_SESSION['role']);
unset($_SESSION['product_cart']);
<<<<<<< HEAD
$path=$_SESSION['base'];
header('Refresh:1; url='.$_SESSION['base'].'/index.php');
=======
header('Refresh:1; url=/Modlice/index.php');
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
$msg='Uspešno ste se odjavili';
  $func->successfulClass($msg);


?>