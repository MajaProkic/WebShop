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
<<<<<<< HEAD
        $delopis=$query->DELETEDESCIRPTIONBYMODLAID($id);
=======
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
        $res=$query->deleteProduct($id);
    
        header("Refresh:0; url=admin.php");
     
    }

?>
<<<<<<< HEAD

<?php if (isset($_SESSION['role']) && $_SESSION['role']=='admin') { ?>
<div class="admin-page">

    <div class="admin-menu">
        <?php include_once 'admin-menu.php'; ?>
=======
<div class="admin-page">

    <div class="admin-menu">
        <button><a href="add-product.php">Dodaj proizvod</a></button>
        <button><a href="add-category.php">Dodaj kategoriju</a></button>
        <button><a href="orderedProducts.php">Porudzbenice</a></button>
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
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
<<<<<<< HEAD
        <td><a href="<?php echo $_SESSION['base']?>/content/product.php?product=<?php echo $row['id'] ?>"> <img src="<?php echo $_SESSION['base']?>/images/modle/<?php echo $row['slika1'] ?>" id='ImgCookieCutters'></a></td>
        <td><?php echo $row['hashtag'] ?></td>
        <td><a href="update-product.php?update=<?php echo $row['id'] ?>"><img src="<?php echo $_SESSION['base']?>/images/updating.png" alt="update" id='update'></a> </td>
        <td><a href="admin.php?delete=<?php echo $row['id']?>"><img src="<?php echo $_SESSION['base']?>/images/x.png" alt="delete" id='delete'></a></td>
=======
        <td><a href="product.php?product=<?php echo $row['id'] ?>"> <img src="../images/modle/<?php echo $row['slika'] ?>" id='ImgCookieCutters'></a></td>
        <td><?php echo $row['hashtag'] ?></td>
        <td><a href="update-product.php?update=<?php echo $row['id'] ?>"><img src="../images/updating.png" alt="update" id='update'></a> </td>
        <td><a href="admin.php?delete=<?php echo $row['id']?>"><img src="../images/x.png" alt="delete" id='delete'></a></td>
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
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
<<<<<<< HEAD
     }else {
    header("Location:".$_SESSION['base']."/index.php");
} ?>
=======
 ?>
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
