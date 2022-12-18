<?php

require_once (__DIR__.'/../header/header.php');
require_once (__DIR__.'/../header/head.php');
require_once (__DIR__.'/../functions/functions.php');
require_once(__DIR__.'/../DB/query.php');
require_once(__DIR__.'/../DB/Database.php');

$database=new Database();
$db=$database->connection();
$query=new Query($db);
global $query;
$msg=isset($msg)?$msg:"";
if($_SESSION['role']=='admin'){

    if(isset($_POST['azurirajKategoriju'])){
        $naziv=$_POST['naziv'];
        $ikonica=$_POST['ikonica'];
        $id=$_POST['id'];

        $updatecategory=$query->UPDATECATEGORY($naziv,$ikonica, $id);
        header('Location:'.$_SESSION['base'].'/admin-page/add-category.php');
        }
    }
?>

<div class="update-category">
    
    <div class="admin-menu">
        <?php include_once 'admin-menu.php'; ?>
    </div>
   

    <div class="form-div">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <div class="input-field">
                    <?php if (isset($_GET['category'])) {
                       
                        $specificCategory=$query->selectCategoryById($_GET['category']);
                        while ($row=$specificCategory->fetch(PDO::FETCH_ASSOC)) {
                           
                      
                    ?>
                    <label for="id">ID</label>
                   <input type="text" name="id" id=""  value='<?php echo $_GET['category']?>'>
                    <label for="naziv">Naziv kategorije</label>
                    <input type="text" name="naziv" id="" value='<?php echo $row['naziv']?>'>
                </div>
                <div class="input-field">
                    <label for="naziv">Ikonica kategorije</label>
                    <textarea name="ikonica" id="" cols="30" rows="10" placeholder='Ex. <i class="fa-solid fa-eye"></i>'></textarea>
                </div>
                <?php   }
                        ?>
            <button><input type="submit" name="azurirajKategoriju" id="" value='Azuriraj kategoriju'></button> 
        </form>
    </div>
</div>
<?php
}else{
    echo 'Unsetted category ID';
}?>