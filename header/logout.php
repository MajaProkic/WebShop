<?php
require_once (__DIR__.'/../header/header.php');
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
header('Refresh:1; url=/Modlice/index.php');
$msg='Uspešno ste se odjavili';
  $func->successfulClass($msg);


?>