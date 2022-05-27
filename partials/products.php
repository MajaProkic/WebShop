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
?>
    <?php

        $exe=$query->getAllProducts();
            while ($row=$exe->fetch(PDO::FETCH_ASSOC)) {   

            
    ?>
    
    <div class="product-cart" id='<?php echo $row['id']?>'>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
   
            <div class="image-of-product">
             <p class="image-text">Novo</p>
                <a href="product.php?product=<?php echo $row['id']?>"><img src="images/modle/<?php echo $row['slika']?>" alt="product"></a>
            </div>
            <div class="title-of-product">
                <h3><?php echo $row['naziv'];?></h3>
            </div>
            <div class="price">
                <p id='average-price'><?php
                $res=$query->maxminprice($row['id']);
                while ($row=$res->fetch(PDO::FETCH_ASSOC)) {
                    echo $row['minimalna_cena'].'-';
                    echo $row['maksimalna_cena'];
                }
                ?>RSD</p>
            </div>
 
            <button class="buy-product"><a href="product.php?product=<?php echo $row['id']?>">Odaberite veličinu</a></button>
        </form>
    </div>
    <?php } //END OF WHILE LOOP ?>
    