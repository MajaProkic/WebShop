<?php
require_once (__DIR__.'/../header/header.php');
require_once (__DIR__.'/../header/head.php');
require_once (__DIR__.'/../functions/functions.php');
include_once(__DIR__.'/../header/nav.php');
require_once(__DIR__.'/../DB/query.php');
require_once(__DIR__.'/../DB/Database.php');
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


    if (isset($_GET['page'])) {
        $page=$_GET['page'];
        $results_per_page=16;
        $page_first_result = ($page-1) * $results_per_page;  
<<<<<<< HEAD

     
                $qu=$query->PAGINATION($page_first_result,$results_per_page);
                while ($row=$qu->fetch(PDO::FETCH_ASSOC)) {   

                    $func->write_product($row['id'],$row['slika1'],$row['naziv']);
                        
                } 

=======
      
                $qu=$query->PAGINATION($page_first_result,$results_per_page);
                while ($row=$qu->fetch(PDO::FETCH_ASSOC)) {   

                    $func->write_product($row['id'],$row['slika'],$row['naziv']);
                        
                } 
              
    
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
    }else {
        $page=1;
        $results_per_page=16;
        $page_first_result = ($page-1) * $results_per_page;  
        $qu=$query->PAGINATION($page_first_result,$results_per_page);

        while ($row=$qu->fetch(PDO::FETCH_ASSOC)) {   

<<<<<<< HEAD
            $func->write_product($row['id'],$row['slika1'],$row['naziv']);
=======
            $func->write_product($row['id'],$row['slika'],$row['naziv']);
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
                
        } 
        
    }
     
     ?>
    