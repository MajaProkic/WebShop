<?php
require_once(__DIR__.'/../functions/functions.php');
require_once(__DIR__.'/../DB/Database.php');
require_once(__DIR__.'/../DB/query.php');
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


if (isset($_POST['search'])) {
    $search= $_POST['search'];
<<<<<<< HEAD
    $SEARCHBOX="SELECT modla.id, modla.naziv, modla.kategorija_id, modla.hashtag, slike.slika1 FROM modla INNER JOIN slike ON modla.id=slike.id_product  WHERE modla.hashtag LIKE '%$search%'";
=======
    $SEARCHBOX="SELECT * FROM modla WHERE hashtag LIKE '%$search%'";
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
    $stmt=$db->prepare($SEARCHBOX);
    $stmt->execute();
  
    while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
       
<<<<<<< HEAD
        $func->write_product($row['id'],$row['slika1'],$row['naziv']);
=======
        $func->write_product($row['id'],$row['slika'],$row['naziv']);
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
    }
   
}
?>