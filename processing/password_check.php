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
$output=false;
$lozinka=$func->test_input($_POST['lozinka']);
$lozinkaAgain=$func->test_input($_POST['lozinka_check']);
   
    if ($lozinka==$lozinkaAgain) {
        $output=true;
    }
         echo $output;

?>