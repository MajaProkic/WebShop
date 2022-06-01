<?php
require_once 'DB/query.php';
require_once 'partials/header.php';
require_once 'partials/head.php';
include_once 'partials/nav.php';
require_once 'functions/functions.php';
require_once 'DB/Database.php';
$database=new Database();
$db=$database->connection();
$query=new Query($db);
global $query;
$func=new Functions();
global $func;
$msg=isset($msg)?$msg:"";
$count=1;

if(isset($_POST['dodajProizvod'])){
    $id=$_POST['id'];
    $naziv=$_POST['naziv'];
    $kategorija=$_POST['kategorija'];
    $utiskivac=$_POST['utiskivac'];
    $opis=$_POST['opis'];
    $tmp_img=$_FILES["slika"]["name"];
    $tmp_img_name=$_FILES["slika"]["tmp_name"];
    $hashtag=$_POST['hashtag'];
    $velicina=$_POST['velicinaAdd'];
    move_uploaded_file($tmp_img_name,"images/modle/$tmp_img");
    
    $getSpecProduct=$query->getSpecificProduct($naziv,$opis);
    $count=$getSpecProduct->rowCount();
    
        if ($count<1) {
            $res = $query->insertProduct($id,$naziv, $kategorija, $opis, $tmp_img,$hashtag,date('d-m-y H:i:s'));
            if($utiskivac==1){
                $query->insertUtiskivaciPoModlama(1,$id);//HARD CODE, REPAIR THIS
                $query->insertUtiskivaciPoModlama(2,$id);
            }else{
                $query->insertUtiskivaciPoModlama(2,$id);//HARD CODE, REPAIR THIS
            }
            
        
            $msg='Uspešno unet proizvod';
        }else{
            $msg='Nažalost, proizvod nije unet';
        }

        foreach ($velicina as $key => $value) {
            $count=$count+1; //HARD CODE, REPAIR THIS

            $query->insertVelicinePoModlama($value,$id,$count);

        }
        $func->refresh();
    }

 
?>
<div class="side-bar">
    <a href="add-product.php">Dodaj proizvod</a>
    <a href="add-category.php">Dodaj kategoriju</a>
    <a href="admin.php">Svi proizvodi</a>

</div>

<div class="add-product">
    <h2>Forma za dodavanje novog proizvoda</h2>
    <div class="message">
    <?php echo $msg;?>
</div>
    <div class="form-div">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                <input type="text" name="id" id="" placeholder='Id'>

                <input type="text" name="naziv" id="" placeholder='Naziv'>
           

            <div class="form-part">
                <label for="kategorija">Kategorija</label>
        
                <select name="kategorija" id="" >
                    <?php
                   
                    $query=$query->selectAllCategories();

                    while ($row=$query->fetch(PDO::FETCH_ASSOC)) {  ?>
                        <option value="<?php echo $row['id']?>"> <?php echo $row['naziv']?></option>
                    <?php } ?>
                </select> 
            
            </div>
            <div class="form-part">
                <label for="utiskivac">Utiskivac</label>
                <select name="utiskivac" id="">
                    <option value="2">Bez utiskivaca</option>
                    <option value="1">Sa utiskivacem</option>
                </select> 
            </div>
           
                <textarea name="opis" id="" cols="30" rows="10" placehodler='Opis'></textarea>  
        
            <div class="form-part">
                <label for="slika">Dodaj sliku</label>
                <input type="file" name="slika" id="" >
            </div>
         
                <input type="text" name="hashtag" id="" placeholder='Hashtag'>
            
                <div class="inp-group">
                    <label for="velicina">Unesite broj polja za velicine</label>
                    <input type="button" name="" class='plus' id="" value='+' onclick="incrementwithAddingInputs()">
                    <input type="num" name="quantityofsizes" id="quantity" class='number' value='0' readonly>
                    <input type="button" name="" class='minus' id="" value='-' onclick="decrementWithRemovingInputs()" >
                 </div>

                <div class="inp-group" id='size_update'>
                    <label for="velicina">Unesite velicine</label>
                   
                </div>
        
               <button><input type="submit" name="dodajProizvod" id="" value="Dodaj proizvod"></button> 
        </form>

    </div>
</div>
<?php

?>