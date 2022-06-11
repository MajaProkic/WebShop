<?php
require_once(__DIR__.'/../functions/functions.php');
require_once(__DIR__.'/../DB/Database.php');
require_once(__DIR__.'/../DB/query.php');

$database=new Database();
$db=$database->connection();
$query=new Query($db);
global $query;
$func=new Functions();
global $func;


if (isset($_POST['search'])) {
    $search= $_POST['search'];
    $SEARCHBOX="SELECT * FROM modla WHERE hashtag LIKE '%$search%'";
    $stmt=$db->prepare($SEARCHBOX);
    $stmt->execute();
  
    while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
       
        $func->write_product($row['id'],$row['slika'],$row['naziv']);
    }
   
}
?>