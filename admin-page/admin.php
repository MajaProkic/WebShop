<?php
require_once (__DIR__.'/../header/header.php');
require_once (__DIR__.'/../header/head.php');
require_once (__DIR__.'/../functions/functions.php');
include_once(__DIR__.'/../header/nav.php');
require_once(__DIR__.'/../DB/query.php');
require_once(__DIR__.'/../DB/Database.php');

$database=new Database();
$db=$database->connection();
$query=new Query($db);
global $query;
if($_SESSION['role']=='admin'){

    if (isset($_GET['delete'])) {
        $id=$_GET['delete'];
        $del_utiskivaci_po_modlama=$query->DELETEUTISKIVACIPOMODLAMA($id);
        $res=$query->deleteProduct($id);
    
        header("Refresh:0; url=admin.php");
     
    }

?>
<div class="admin-page">

    <div class="admin-menu">
        <button><a href="add-product.php">Dodaj proizvod</a></button>
        <button><a href="add-category.php">Dodaj kategoriju</a></button>
        <button><a href="orderedProducts.php">Porudzbenice</a></button>
    </div>

    <div class="title">
        <h2>Admin strana</h2>
    </div>

<table>
    <tr>
        <th>ID</th>
        <th>Naziv</th>
        <th>Kategorija</th>
        <th>Slika</th>
        <th>Hash tag</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    <tbody>
        <?php
   
        $exe=$query->getAllProducts();
    while ($row=$exe->fetch(PDO::FETCH_ASSOC)) {
        $id=$row['id'];
        global $id;
        ?>
        <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $row['naziv'] ?></td>
        <td><?php echo $row['kategorija_id'] ?></td>        
        <td><a href="product.php?product=<?php echo $row['id'] ?>"> <img src="../images/modle/<?php echo $row['slika'] ?>" id='ImgCookieCutters'></a></td>
        <td><?php echo $row['hashtag'] ?></td>
        <td><a href="update-product.php?update=<?php echo $row['id'] ?>"><img src="../images/updating.png" alt="update" id='update'></a> </td>
        <td><a href="admin.php?delete=<?php echo $row['id']?>"><img src="../images/x.png" alt="delete" id='delete'></a></td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>

</div>

<?php


if(isset($_GET['update'])){
    include_once 'update-product.php';
 }
}
 ?>