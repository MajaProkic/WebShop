<?php
 require_once './DB/query.php';
 require_once './header/header.php';
 require_once './functions/functions.php';
 require_once './DB/Database.php';

$database=new Database();
$db=$database->connection();
global $db;
$query=new Query($db);
global $query;
$msg=isset($msg)?$msg:"";
$func=new Functions();
global $func;
?>

  <button><<</button>
    <?php 
        $allProducts=$query->getAllProducts();
         $number_of_rows=$allProducts->rowCount();
        $results_per_page=16;
        $pagin=ceil($number_of_rows/$results_per_page);

        for ($i=1; $i < $pagin+1; $i++) { ?>
        <a id='pagination' href="index.php?page=<?php echo $i ?>"><?php echo $i ?> </a>
    
       <?php
        }
    ?>
    
    <button>>></button>