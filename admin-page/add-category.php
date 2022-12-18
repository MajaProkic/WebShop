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
        $ikonica=$_POST['ikonica'];
        $query->insertCategory($naziv,$ikonica);
            if(!$query){
                echo "Error";
            }
        }
    }
?>

<div class="add-category">
    
    <div class="admin-menu">
        <?php include_once 'admin-menu.php'; ?>
    </div>
    <div class="all-categories">
        <table>
            <thead>
                <th>ID</th>
                <th>Naziv</th>
                <th>Ikonica</th>
            </thead>
      
        <?php
            $allcategories=$query->selectAllCategories();
            while($row=$allcategories->fetch(PDO::FETCH_ASSOC)) {
             
        ?>
              <tr>
                <td><a href="<?php echo $_SESSION['base']?>/admin-page/update-category.php?category=<?php echo $row['id']?>"><?php echo $row['id']?></td>
                <td><?php echo $row['naziv']?></td>
                <td><?php echo $row['ikonica']?></td>
            </tr>
      
        <?php   
            }
        ?>
        </table>
    </div>

    <div class="form-div">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <div class="input-field">
                    <label for="naziv">Naziv kategorije</label>
                    <input type="text" name="naziv" id="">
                </div>
                <div class="input-field">
                    <label for="naziv">Ikonica kategorije</label>
                    <textarea name="ikonica" id="" cols="30" rows="10" placeholder='Ex. <i class="fa-solid fa-eye"></i>'></textarea>
                </div>
            <button><input type="submit" name="dodajKategoriju" id="" value='Dodaj kategoriju'></button> 
        </form>
    </div>
</div>