<?php

require_once '../DB/Database.php';
require_once '../DB/query.php';
require_once (__DIR__.'/../header/url_extension.php');


$database=new Database();
$db=$database->connection();
$query=new Query($db);
global $query;

if (isset($_POST['size']) && isset($_POST['imprint']) && isset($_POST['number'])) {
  $size=  $_POST['size'];
  $imprint=  $_POST['imprint'];
  $number=$_POST['number'];

  $res=$query->getprice($size,$imprint);
  if ($res->rowCount()>0) {
    while ($row=$res->fetch(PDO::FETCH_ASSOC)) {
      if($number!=1){
        echo $row['Cena']*$number;
      }else{
        echo $row['Cena'];
      }
       
      }
  }

}




?>
