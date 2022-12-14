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
$output=false;
$lozinka=$func->test_input($_POST['lozinka']);
$lozinkaAgain=$func->test_input($_POST['lozinka_check']);
   
    if ($lozinka==$lozinkaAgain) {
        $output=true;
    }
         echo $output;

?>