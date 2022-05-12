<?php
require_once 'DB/query.php';
require_once 'partials/header.php';
include_once 'partials/nav.php';
require_once 'functions/functions.php';
$func=new Functions();
global $func;
$query=new Query();
global $query;

$pro=$query->selectSizes(27);
while ($row=mysqli_fetch_assoc($pro)) {
    echo $row['velicina_1'];
    echo $row['velicina_2'];
    echo $row['velicina_3'];
}
?>