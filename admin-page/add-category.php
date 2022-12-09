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
$msg=isset($msg)?$msg:"";
if($_SESSION['role']=='admin'){

    if(isset($_POST['dodajKategoriju'])){
        $naziv=$_POST['naziv'];
        $query->insertCategory($naziv);
            if(!$query){
                echo "Error";
            }
        }
    }
?>
<<<<<<< HEAD
<div class="admin-menu">
    <?php include_once 'admin-menu.php'; ?>
</div>

=======
<div class="side-bar">
    <a href="add-product.php">Dodaj proizvod</a>
    <a href="add-category.php">Dodaj kategoriju</a>
    <a href="admin.php">Svi proizvodi</a>

</div>
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
<div class="form-div">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="form-part">
        <label for="naziv">Naziv kategorije</label>
        <input type="text" name="naziv" id="">
        </div>
       <button><input type="submit" name="dodajKategoriju" id="" value='Dodaj kategoriju'></button> 
    </form>
    </div>