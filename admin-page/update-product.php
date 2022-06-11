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

if(isset($_GET['update'])){
    $idGet=$_GET['update'];
    $_SESSION['old_id']=$idGet;
    $res=$query->getProductByid($idGet);
    while ($row=$res->fetch(PDO::FETCH_ASSOC)) {
    $id=$row['id'];
    $naziv=$row['naziv'];
    $kategorija_id=$row['kategorija_id'];
    $opis=$row['opis'];
    $slika=$row['slika'];
    $hashtag=$row['hashtag'];
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
    <input type="text" name="id" value="<?php echo $idGet?>">
</div>

<div class="inp-group">
    <label for="naziv">Naziv</label>
    <input type="text" name="naziv" value="<?php echo $naziv?>">
</div>

    <!--KATEGORIJA-->
<div class="inp-group">
    <label for="kategorija">Kategorija</label>
    <select name="kategorija">
    <?php
        $allCategories=$query->selectAllCategories();
        $selectCategoryIDandName=$query->selectIdCategoryAndName($_SESSION['old_id']);

        while ($row=$selectCategoryIDandName->fetch(PDO::FETCH_ASSOC)){?>
        <option value="<?php echo $row['kategorija_id']?>"> <?php echo $row['naziv']?></option>
        <?php } 
        while ($row=$allCategories->fetch(PDO::FETCH_ASSOC)) {?>
        <option value="<?php echo $row['id']?>"> <?php echo $row['naziv']?></option>
        <?php }
    ?>
        
    </select> 
</div>
    <!--UTISKIVACI-->

        <label for="utiskivac">Utiskivac</label>
        <?php
         $selectImprint=$query->selectImprint($_SESSION['old_id']);

            if($selectImprint->rowCount()==0){
        ?>
                <div class="inp-group">
                    <label for="addImprint">Sa utiskivacem</label>
                    <input type="checkbox" name="addImprint">
                    <label for="addImprint">Bez utiskivaca</label>
                    <input type="checkbox" name="withoutImprint">
                </div>
        
        <?php
            }elseif($selectImprint->rowCount()==1){ ?>
                <div class="inp-group">
                    <label for="addImprint">Dodaj utiskivac za ovu modlu</label>
                    <input type="checkbox" name="addImprint" id="">
                </div>

        <?php }else{  ?>
            <div class="inp-group">
               <select name="imprint" id="">
                    <?php 
                        while ($row=$selectImprint->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $row['ID']?>"><?php echo $row['Naziv']?></option>
                    <?php } ?>
                </select>
                </div>
        <?php } ?>

<!--OPIS-->
<div class="inp-group">
    <label for="opis">Opis</label>
    <textarea name="opis" id="" cols="30" rows="10"><?php echo $opis;?></textarea>  
</div>

<div class="inp-group">
    <label for="slika">Dodaj sliku</label>
    <img src="../images/modle/<?php echo $slika;?>" alt="" width='100px' height='100px'>
    <input type="file" name="slika" id="" value="<?php if(isset($_POST['slika'])){echo $slika;}?>">
</div>

<div class="inp-group">
    <label for="hashtag">Hashtag</label>
    <input type="text" name="hashtag" id="" value="<?php echo $hashtag?>">
</div>


<?php
     $selectSizes=$query->selectsizes($idGet);
     $countRowSizes=$selectSizes->rowCount();
  
     if ($countRowSizes==0) { ?>
     <div class="inp-group">
     <label for="velicina">Unesite broj polja za velicine</label>
        <input type="button" name="" class='plus' id="" value='+' onclick="incrementwithAddingInputs()">
        <input type="num" name="quantityofsizes" id="quantity" class='number' value='0' readonly>
        <input type="button" name="" class='minus' id="" value='-' onclick="decrementWithRemovingInputs()" >
    </div>

    <div class="inp-group" id='size_update'>
        <label for="velicina">Unesite velicine</label>
    </div>

     <?php
        
     }else{
        
        while ($row=$selectSizes->fetch(PDO::FETCH_ASSOC)) {  ?>
         <div class="inp-group">
            <input type="text" name="velicina[]" id="" value="<?php echo $row['Dimenzija']?>">
        </div>
<?php  } 
    }
?>

    <button><input type="submit" name="updateProizvod" id="" value="Azuriraj proizvod"></button>
  
</form>
</div>

<?php

 
 }
 if(isset($_POST['updateProizvod'])){

    $idForm=$_POST['id'];
    $_SESSION['new_id']=$_POST['id'];
    $naziv=$_POST['naziv'];
    $kategorija=$_POST['kategorija'];
    $opis=$_POST['opis'];
    $tmp_img=$_FILES["slika"]["name"];
    $tmp_img_name=$_FILES["slika"]["tmp_name"];
    $hashtag=$_POST['hashtag'];
  



    move_uploaded_file($tmp_img_name,"../images/modle/$tmp_img");
  
    if(empty($tmp_img)){
        $res=$query->getProductByid($_SESSION['old_id']);
        while($row=$res->fetch(PDO::FETCH_ASSOC)){
            $tmp_img=$row['slika'];
        }
    }   

    //handling imprint
    if(isset($_POST['imprint']) && $_POST['imprint']==2){
        $query->updateImprintsByCookieCutters($_SESSION['old_id'],$_POST['imprint']); //ako je utiskivac 2, odnosno bez utiskivaca, onda obrisi onaj red gde postoji utiskivac za tu modlu.
    }elseif (isset($_POST['addImprint'])) {
       
        $query->addImprint(1,$_SESSION['old_id']);  
    }else{

    }

    if (isset($_POST['withoutImprint'])) {
        
        $query->addImprint(2,$_SESSION['old_id']);
    }


   $exe=$query->updateProduct($idForm,$naziv,$kategorija,$opis,$tmp_img,$hashtag,$_SESSION['old_id']);

   //handling size
   if(!empty($_POST['velicinaAdd'])){

    foreach ($_POST['velicinaAdd'] as $key => $value) {
        try {
             $redniBrojVelicine=$key+1;
            $insertSize=$query->insertVelicinePoModlama($value,$_SESSION['old_id'],$redniBrojVelicine);
            
        } catch (Exception $e) {
            echo "Exception->";
            var_dump($e->get_message()); 
        }
       
    }
   }else{
        foreach ($_POST['velicina'] as $key => $value) {
            $redniBrojVelicine=$key+1;
            $updateVelicine=$query->updateSizesByCookieCutter($value,$_SESSION['old_id'],$redniBrojVelicine);
        }
   }
    

     if($exe){
           die(mysqli_error($connection));
       }else{
            $msg="Uspesno azuriran proizvod";
       }
       if (isset($_SESSION['new_id'])) {
        header("Location:../product.php?product=$idForm");
       }else{
           $old=$_SESSION['old_id'];
        header("Location:../product.php?product=$old");
       }
       $func->refresh();
}
?>