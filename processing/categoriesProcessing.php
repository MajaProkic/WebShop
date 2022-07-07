<?php
require_once '../DB/Database.php';
require_once '../DB/query.php';
require_once(__DIR__.'/../functions/functions.php');

$database=new Database();
$db=$database->connection();
$query=new Query($db);
global $query;
$func=new Functions();
global $func;

if (isset($_POST['chck'])) {
    
    $category= $_POST['chck'];
    $selectCookiecuttersByCategory=$query->selectcookiecutterbycategories($category);
    $res=$selectCookiecuttersByCategory->rowCount();
  
    if ($res==0) {

        echo 'Ova kategorija još uvek nema modlice';
      
    }else{
        while ($row=$selectCookiecuttersByCategory->fetch(PDO::FETCH_ASSOC)) {
            $func->write_product($row['modlaId'],$row['slika'],$row['modlaNaziv']);
            }
    }
   

    
    } 
    
    
   ?>




