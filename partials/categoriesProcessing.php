<?php
require_once '../DB/Database.php';
require_once '../DB/query.php';

$database=new Database();
$db=$database->connection();
$query=new Query($db);
global $query;

if (isset($_POST['chck'])) {
    
    $category= $_POST['chck'];
    $res=$query->selectcookiecutterbycategories($category);
    while ($row=$res->fetch(PDO::FETCH_ASSOC)) {
        echo $row['modlaNaziv'];
        echo $row['kategorijaNaziv'];
    
    } } ?>




