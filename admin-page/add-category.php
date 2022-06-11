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
$msg=isset($msg)?$msg:"";

if(isset($_POST['dodajKategoriju'])){
    $naziv=$_POST['naziv'];
    $query->insertCategory($naziv);
        if(!$query){
            echo "Erorr";
        }
    }
?>
<div class="side-bar">
    <a href="add-product.php">Dodaj proizvod</a>
    <a href="add-category.php">Dodaj kategoriju</a>
    <a href="admin.php">Svi proizvodi</a>

</div>
<div class="form-div">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="form-part">
        <label for="naziv">Naziv kategorije</label>
        <input type="text" name="naziv" id="">
        </div>
       <button><input type="submit" name="dodajKategoriju" id="" value='Dodaj kategoriju'></button> 
    </form>
    </div>