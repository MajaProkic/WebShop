<?php

require_once 'DB/Database.php';
require_once 'DB/query.php';


$database=new Database();
$db=$database->connection();
$query=new Query($db);
global $query;

if (isset($_POST['size']) && isset($_POST['imprint'])) {
  $size=  $_POST['size'];
  $imprint=  $_POST['imprint'];

  $res=$query->getprice($size,$imprint);
  if ($res->rowCount()>0) {
    while ($row=$res->fetch(PDO::FETCH_ASSOC)) {
        echo $row['Cena'];
      }
  }

}

/*if (isset($_POST["size"])) { //proveri sto nece isset post size
 $size=$_POST["size"];
  $res=$query->getprice($size,1);


if ($res->rowCount()>0) {
  while ($row=$res->fetch(PDO::FETCH_ASSOC)) {
      echo $row['Cena'];
    }
}else{
    echo 'no such rows here.';
}

}  


if (isset($_POST['imprint'])) {
    
  $imprint= $_POST['imprint'];
  

  if ($imprint==1) {
    echo 'sa utiskivacem';
    
  }else {
    echo 'bez utiskivaca';
  
  }

 }*/




?>
