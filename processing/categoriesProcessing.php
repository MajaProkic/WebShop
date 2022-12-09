<?php
<<<<<<< HEAD

=======
require_once '../DB/Database.php';
require_once '../DB/query.php';
require_once(__DIR__.'/../functions/functions.php');
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61

$database=new Database();
$db=$database->connection();
$query=new Query($db);
global $query;
$func=new Functions();
global $func;

<<<<<<< HEAD
if (isset($_GET['kategorija'])) {
  
    $category= $_GET['kategorija'];
=======
if (isset($_POST['chck'])) {
    
    $category= $_POST['chck'];
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
    $selectCookiecuttersByCategory=$query->selectcookiecutterbycategories($category);
    $res=$selectCookiecuttersByCategory->rowCount();
  
    if ($res==0) {

        echo 'Ova kategorija još uvek nema modlice';
      
    }else{
        while ($row=$selectCookiecuttersByCategory->fetch(PDO::FETCH_ASSOC)) {
<<<<<<< HEAD
            $func->write_product($row['modlaId'],$row['slika1'],$row['modlaNaziv']);
            }
    }
=======
            $func->write_product($row['modlaId'],$row['slika'],$row['modlaNaziv']);
            }
    }
   
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61

    
    } 
    
    
   ?>




