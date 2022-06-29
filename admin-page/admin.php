<?php
require_once(__DIR__.'/../functions/functions.php');
require_once(__DIR__.'/../DB/Database.php');
require_once(__DIR__.'/../DB/query.php');
require_once(__DIR__.'/../partials/nav.php');
require_once(__DIR__.'/../partials/header.php');
require_once(__DIR__.'/../partials/head.php');

$database=new Database();
$db=$database->connection();
$query=new Query($db);
global $query;
if($_SESSION['role']=='admin'){

if(isset($_POST['dodajKategoriju'])){
    $naziv=$_POST['naziv'];
    $query->insertCategory($naziv);
        if(!$query){
            echo "Erorr";
        }
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
 }else if (isset($_GET['delete'])) {
     $id=$_GET['delete'];
         $query->deleteProduct($id);
         header("Refresh:0; url=admin.php");
 
 }
}else {
    header("Location:index.php");
}
 ?>