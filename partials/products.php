<?php
  require_once 'DB/query.php';
  require_once 'partials/header.php';
  include_once 'partials/nav.php';
  require_once 'functions/functions.php';
  require_once 'DB/Database.php';
    $database=new Database();
    $db=$database->connection();
    $query=new Query($db);
    global $query;
    $func=new Functions();
    global $func;

    $exe=$query->getAllProducts();

    while ($row=$exe->fetch(PDO::FETCH_ASSOC)) {   

        $func->write_product($row['id'],$row['slika'],$row['naziv']);
            
     } 
     
     ?>
    