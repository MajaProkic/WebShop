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
    while ($row=$res->fetch(PDO::FETCH_ASSOC)) {?>
    <div class="product-cart" id='<?php echo $row['modlaId']?>'>
     
       <div class="image-of-product">
             <p class="image-text">Novo</p>
                <a href="product.php?product=<?php echo $row['modlaId']?>"><img src="images/modle/<?php echo $row['slika']?>" alt="product"></a>
            </div>
            <div class="title-of-product">
                <h3><?php echo $row['modlaNaziv'];?></h3>
            </div>
            <div class="price">
                <p id='average-price'><?php
                $res=$query->maxminprice($row['modlaId']);
                while ($row=$res->fetch(PDO::FETCH_ASSOC)) {
                    echo $row['minimalna_cena'].'-';
                    echo $row['maksimalna_cena'];
                }
                ?>RSD</p>
            </div>
            


    </div>
    <?php } } ?>




