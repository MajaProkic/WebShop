<?php
require_once 'DB/query.php';
require_once 'partials/header.php';
require_once 'partials/head.php';
include_once 'partials/nav.php';
require_once 'DB/Database.php';
$database=new Database();
$db=$database->connection();
$query=new Query($db);
global $query;
$msg=isset($msg)?$msg:"";

if(isset($_GET['update'])){
    $idGet=$_GET['update'];
    $_SESSION['old_id']=$idGet;
    $res=$query->getProductByid($idGet);
    while ($row=$res->fetch(PDO::FETCH_ASSOC)) {
    $id=$row['id'];
    $status=$row['status'];
    $naziv=$row['naziv'];
    $kategorija_id=$row['kategorija_id'];
    $utiskivac=$row['utiskivac'];
    $opis=$row['opis'];
    $slika=$row['slika'];
    $hashtag=$row['hashtag'];
    $velicina1=$row['velicina_1'];
    $velicina2=$row['velicina_2'];
    $velicina3=$row['velicina_3'];
}

?>
<div class="side-bar">
    <a href="add-product.php">Dodaj proizvod</a>
    <a href="add-category.php">Dodaj kategoriju</a>
    <a href="admin.php">Svi proizvodi</a>

</div>
<div class="form-div">
    <div class="msg">
        <?php echo $msg; ?>
    </div>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">

<div class="inp-group">
    <label for="naziv">ID</label>
    <input type="text" name="id" id="" value="<?php echo $idGet?>">
</div>
<div class="inp-group">
    <label for="naziv">Naziv</label>
    <input type="text" name="naziv" id="" value="<?php echo $naziv?>">
</div>
<div class="inp-group">
    <label for="status">Status</label>
    <input type="text" name="status" id="" value="<?php echo $status?>">
</div>
<div class="inp-group">
    <label for="kategorija">Kategorija</label>
    <select name="kategorija" id="">
    <?php
    $allCategories=$query->selectAllCategories();
    $selectCategoryIDandName=$query->selectIdCategoryAndName($_SESSION['old_id']);
  print_r($selectCategoryIDandName);
        while ($rowid=$selectCategoryIDandName->fetch(PDO::FETCH_ASSOC)){?>
        <option selected="selected" value="<?php echo $rowid['id']?>"> <?php echo $rowid['naziv']?></option>
        <?php } 
        while ($row=$allCategories->fetch(PDO::FETCH_ASSOC)) {?>
        <option value="<?php echo $row['id']?>"> <?php echo $row['naziv']?></option>
        <?php }
        ?>
        
    </select> 
   
</div>
<div class="inp-group">
    <label for="utiskivac">Utiskivac</label>
    <select name="utiskivac" id="">
        <?php
        $selectImprint=$query->selectImprint($idGet);
        while ($row=$selectImprint->fetch(PDO::FETCH_ASSOC)) {
        if ($row['utiskivac']==1) {?>
            <option selected="selected" value="<?php echo $row['utiskivac'] ?>">Sa utiskivacem</option>
            <option value="0"> Bez utiskivaca</option>
        <?php }else{ ?>
            <option selected="selected" value="<?php echo $row['utiskivac'] ?>">Bez utiskivaca</option>
            <option  value="1"> Sa utiskivacem</option>
        <?php }
        }
        ?>
    </select> 
</div>

<div class="inp-group">
    <label for="opis">Opis</label>
    <textarea name="opis" id="" cols="30" rows="10"><?php echo $opis;?></textarea>  
</div>

<div class="inp-group">
    <label for="slika">Dodaj sliku</label>
    <img src="images/modle/<?php echo $slika;?>" alt="" width='100px' height='100px'>
    <input type="file" name="slika" id="" value="<?php if(isset($_POST['slika'])){echo $slika;}?>">
</div>

<div class="inp-group">
    <label for="hashtag">Hashtag</label>
    <input type="text" name="hashtag" id="" value="<?php echo $hashtag?>">
</div>

<div class="inp-group">
    <label for="velicina 1">Velicina 1</label>
    <input type="text" name="velicina_1" id="" value="<?php echo $velicina1?>">
</div>

<div class="inp-group">
    <label for="velicina 1">Velicina 2</label>
    <input type="text" name="velicina_2" id="" value="<?php echo $velicina2?>">
</div>

<div class="inp-group">
    <label for="velicina 1">Velicina 3</label>
    <input type="text" name="velicina_3" id="" value="<?php echo $velicina3?>">
</div>

    <button><input type="submit" name="updateProizvod" id="" value="Azuriraj proizvod"></button>
  
</form>
</div>

<?php

 
 }
 if(isset($_POST['updateProizvod'])){

    $idForm=$_POST['id'];
    $_SESSION['new_id']=$_POST['id'];

    $naziv=$_POST['naziv'];
    $status=$_POST['status'];
    $kategorija=$_POST['kategorija'];
    $utiskivac=$_POST['utiskivac'];
    $opis=$_POST['opis'];
    $tmp_img=$_FILES["slika"]["name"];
    $tmp_img_name=$_FILES["slika"]["tmp_name"];
    $hashtag=$_POST['hashtag'];
    $velicina1=$_POST['velicina_1'];
    $velicina2=$_POST['velicina_2'];
    $velicina3=$_POST['velicina_3'];
    move_uploaded_file($tmp_img_name,"images/modle/$tmp_img");
  
    if(empty($tmp_img)){
        $res=$query->getProductByid($_SESSION['old_id']);
        while($row=$res->fetch(PDO::FETCH_ASSOC)){
            $tmp_img=$row['slika'];
        }
    }


    $exe=$query->updateProduct($idForm,$status,$naziv,$kategorija,$utiskivac,$opis,$tmp_img,$hashtag, $velicina1,$velicina2, $velicina3,$_SESSION['old_id']);
       if($exe){
           die(mysqli_error($connection));
       }else{
            $msg="Uspesno azuriran proizvod";
       }
       if (isset($_SESSION['new_id'])) {
        header("Location:product.php?product=$idForm");
       }else{
           $old=$_SESSION['old_id'];
        header("Location:product.php?product=$old");
       }
      
}
?>