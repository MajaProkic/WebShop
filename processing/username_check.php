<?php
require_once(__DIR__.'/../DB/query.php');
require_once(__DIR__.'/../DB/Database.php');
require_once(__DIR__.'/../functions/functions.php');
$database=new Database();
$db=$database->connection();
$query=new Query($db);
global $query;
$func=new Functions();
global $func;
$output='';
    $username=$func->test_input($_POST['username']);
    $res=$query->getSpecificUserByUsername($username);
    $count=$res->rowCount();
    if ($count!=0) {
        $output='false';
    }
    echo $output;

?>