<?php
require_once '../DB/query.php';
require_once '../partials/header.php';
include_once '../partials/nav.php';
require_once '../functions/functions.php';
require_once '../DB/Database.php';
$database=new Database();
$db=$database->connection();
$func=new Functions();
global $func;
$query=new Query($db);
global $query;

if (isset($_POST['size'])) {
   $res = $query->getprice($_POST['size'],0);
}

?>
