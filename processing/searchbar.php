<?php
require_once(__DIR__.'/../functions/functions.php');
require_once(__DIR__.'/../DB/Database.php');
require_once(__DIR__.'/../DB/query.php');
require_once (__DIR__.'/../header/url_extension.php');

$database=new Database();
$db=$database->connection();
$query=new Query($db);
global $query;
$func=new Functions();
global $func;


if (isset($_POST['search'])) {
    $search= $_POST['search'];
    $SEARCHBOX="SELECT modla.id, modla.naziv, modla.kategorija_id, modla.hashtag, slike.slika1 FROM modla INNER JOIN slike ON modla.id=slike.id_product  WHERE modla.hashtag LIKE '%$search%'";
    $stmt=$db->prepare($SEARCHBOX);
    $stmt->execute();
  
    while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
       
        $func->write_product($row['id'],$row['slika1'],$row['naziv']);
    }
   
}
?>