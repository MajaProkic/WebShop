<?php
require_once (__DIR__.'/../header/header.php');
require_once (__DIR__.'/../header/url_extension.php');
require_once (__DIR__.'/../header/head.php');
require_once (__DIR__.'/../functions/functions.php');

require_once(__DIR__.'/../DB/query.php');
require_once(__DIR__.'/../DB/Database.php');
$database=new Database();
$db=$database->connection();
$query=new Query($db);
global $query;
$func=new Functions();
global $func;

if (isset($_POST['kategorija'])) {
  
    $category= $_POST['kategorija'];
    $selectCookiecuttersByCategory=$query->selectcookiecutterbycategories($category);
    $res=$selectCookiecuttersByCategory->rowCount();
    if ($res==0) {

        echo 'Ova kategorija još uvek nema modlice';
      
    }else{
        while ($row=$selectCookiecuttersByCategory->fetch(PDO::FETCH_ASSOC)) {
            $func->write_product($row['modlaId'],$row['slika1'],$row['modlaNaziv']);
            }
    }

    
    } 
    
    
   ?>




