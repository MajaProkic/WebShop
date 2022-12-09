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

if(isset($_GET['update'])){
    $idGet=$_GET['update'];
    $_SESSION['old_id']=$idGet;
    $res=$query->getProductByid($idGet);
    while ($row=$res->fetch(PDO::FETCH_ASSOC)) {
    $id=$row['id'];
    $naziv=$row['naziv'];
    $kategorija_id=$row['kategorija_id'];
<<<<<<< HEAD
global $slika1,$slika2,$slika3;
    $slika1=$row['slika1'];
    $slika2=$row['slika2'];
    $slika3=$row['slika3'];
    $slika4=$row['slika4'];
    $slika5=$row['slika5'];
    $slika6=$row['slika6'];
    $slika7=$row['slika7'];
    $slika8=$row['slika8'];
=======

    $slika=$row['slika'];
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
    $hashtag=$row['hashtag'];
}

?>
<div class="update-product">

    <div class="admin-menu">
        <button><a href="add-product.php">Dodaj proizvod</a></button>
        <button><a href="add-category.php">Dodaj kategoriju</a></button>
        <button><a href="admin.php">Svi proizvodi</a></button>
    </div>

    <div class="title">
        <h2>Ažuriranje proizvoda</h2>
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
        <div class="inp-group">
            <label for="utiskivac">Utiskivač</label>
                <?php
                    $selectImprint=$query->selectImprint($_SESSION['old_id']);

                    if($selectImprint->rowCount()==0){
                ?>
                    <div class="sub-inp-group">
                        <label for="addImprint">Sa utiskivacem</label>
                        <input type="checkbox" name="addImprint">
                        <label for="addImprint">Bez utiskivaca</label>
                        <input type="checkbox" name="withoutImprint">
                    </div>
            
                    <?php
                        }elseif($selectImprint->rowCount()==1){ ?>
                            <div class="sub-inp-group">
                                <label for="addImprint">Dodaj utiskivac za ovu modlu</label>
                                <input type="checkbox" name="addImprint" id="">
                            </div>

                    <?php }else{  ?>
                        <div class="sub-inp-group">
                        <select name="imprint" id="">
                                <?php 
                                    while ($row=$selectImprint->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <option value="<?php echo $row['ID']?>"><?php echo $row['Naziv']?></option>
                                <?php } ?>
                            </select>
                            </div>
                    <?php } ?>
        </div>

            <!--OPIS--------->
            <?php
                $description=$query->selectdescriptionforspecificproduct($_SESSION['old_id']);
                $rowCount_description=$description->rowCount();
                $_SESSION['rowCount_description']=$rowCount_description;
                if ($rowCount_description==1) {
                    while ($row=$description->fetch(PDO::FETCH_ASSOC)) { ?>
                        <table>     <tr>
                                        <th>ID opisa</th>
                                        <td><input type="text" name="ID_opisa" value='<?php echo $row['ID_opisa']?>' hidden></td>
                                    </tr>
                                    <tr>
                                        <th>ID modle</th>
                                        <td><input type="text" name="ID_modle" value='<?php echo $row['ID_modle']?>' hidden></td>
                                    </tr>
    
                                    <tr>
                                        <th>Debljina sekača</th>
                                        <td><input type="text" name="debljina_sekaca" value='<?php echo $row['debljina_sekaca']?>'></td>
                                    </tr>
    
                                    <tr>
                                        <th>Širina modle</th>
                                        <td><input type="text" name="sirina_modle" value='<?php echo $row['sirina_modle']?>'></td>
                                    </tr>
    
                                    <tr>
                                        <th>Dužina modle</th>
                                        <td><input type="text" name="duzina_modle" value='<?php echo $row['duzina_modle']?>'></td>
                                    </tr>
    
                                    <tr>
                                        <th>Debljina utiskivača</th>
                                        <td><input type="text" name="debljina_utiskivaca" value='<?php echo $row['debljina_utiskivaca']?>'></td>
                                    </tr>
    
                                    <tr>
                                            <th>Težina modle</th>
                                            <td><input type="text" name="tezina_modle" value='<?php echo $row['tezina_modle']?>'></td>
                                    </tr>
                                    <tr>
                                        <th>Visina utiskivača</th>
                                        <td><input type="text" name="visina_utiskivaca" value='<?php echo $row['visina_utiskivaca']?>'></td>
                                    </tr>
                                    <tr>
                                        <th>Visina sekača</th>
                                        <td><input type="text" name="visina_sekaca" value='<?php echo $row['visina_sekaca']?>'></td>
                                    </tr>
                                    <tr>
                                        <th>Utiskivač i sekač su spojeni</th>
                                        <td><input type="text" name="utiskivac_sekac_spojeni" value='<?php echo $row['utiskivac_sekac_spojeni']?>'></td>
                                    </tr>
                                    <tr>
                                        <th>Veličina opisanog proizvoda je:</th>
                                        <td><input type="text" name="velicina_testiranog_proizvoda" value='<?php echo $row['velicina_testiranog_proizvoda']?>'></td>
                                    </tr>
                        </table>
                 <?php  
                    }
                }else{?>
                 <table>
                                    <tr>
                                        <th>ID modle</th>
                                        <td><input type="text" name="ID_modle_ins"  value='<?php echo $_SESSION['old_id'] ?>'  hidden required="required"></td>
                                    </tr>
    
                                    <tr>
                                        <th>Debljina sekača</th>
                                        <td><input type="text" name="debljina_sekaca_ins" required="required"></td>
                                    </tr>
    
                                    <tr>
                                        <th>Širina modle</th>
                                        <td><input type="text" name="sirina_modle_ins" required="required"></td>
                                    </tr>
    
                                    <tr>
                                        <th>Dužina modle</th>
                                        <td><input type="text" name="duzina_modle_ins" required="required"></td>
                                    </tr>
    
                                    <tr>
                                        <th>Debljina utiskivača</th>
                                        <td><input type="text" name="debljina_utiskivaca_ins"></td>
                                    </tr>
    
                                    <tr>
                                            <th>Težina modle</th>
                                            <td><input type="text" name="tezina_modle_ins" required="required"></td>
                                    </tr>
                                    <tr>
                                        <th>Visina utiskivača</th>
                                        <td><input type="text" name="visina_utiskivaca_ins"></td>
                                    </tr>
                                    <tr>
                                        <th>Visina sekača</th>
                                        <td><input type="text" name="visina_sekaca_ins" required="required"></td>
                                    </tr>
                                    <tr>
                                        <th>Utiskivač i sekač su spojeni</th>
                                        <td><input type="text" name="utiskivac_sekac_spojeni_ins" ></td>
                                    </tr>
                                    <tr>
                                        <th>Veličina opisanog proizvoda je:</th>
                                        <td><input type="text" name="velicina_testiranog_proizvoda_ins" required="required"></td>
                                    </tr>
                        </table>
            <?php               
                }
            ?>
<<<<<<< HEAD
            <!--SLIKE-->
        <div class="inp-group">
            <label for="slika">Dodaj glavnu sliku</label>
            <img src="<?php echo $_SESSION['base'] ?>/images/modle/<?php echo $slika1;?>" alt="" width='100px' height='100px'>
            <input type="file" name="slika1" id="" value="<?php if(isset($_POST['slika1'])){echo $slika1;}?>">
        </div>
        <div class="inp-group">
            <label for="slika">Dodaj 2. sliku</label>
            <img src="<?php echo $_SESSION['base'] ?>/images/modle/<?php echo $slika2;?>" alt="" width='100px' height='100px'>
            <input type="file" name="slika2" id="" value="<?php if(isset($_POST['slika2'])){echo $slika2;}?>">
        </div>
        <div class="inp-group">
            <label for="slika">Dodaj 3. sliku</label>
            <img src="<?php echo $_SESSION['base'] ?>/images/modle/<?php echo $slika3;?>" alt="" width='100px' height='100px'>
            <input type="file" name="slika3" id="" value="<?php if(isset($_POST['slika3'])){echo $slika3;}?>">
        </div>
        <div class="inp-group">
            <label for="slika">Dodaj 4. sliku</label>
            <img src="<?php echo $_SESSION['base'] ?>/images/modle/<?php echo $slika4;?>" alt="" width='100px' height='100px'>
            <input type="file" name="slika4" id="" value="<?php if(isset($_POST['slika4'])){echo $slika4;}?>">
        </div>
        <div class="inp-group">
            <label for="slika">Dodaj 5. sliku</label>
            <img src="<?php echo $_SESSION['base'] ?>/images/modle/<?php echo $slika5;?>" alt="" width='100px' height='100px'>
            <input type="file" name="slika5" id="" value="<?php if(isset($_POST['slika5'])){echo $slika5;}?>">
        </div>
        <div class="inp-group">
            <label for="slika">Dodaj 6. sliku</label>
            <img src="<?php echo $_SESSION['base'] ?>/images/modle/<?php echo $slika6;?>" alt="" width='100px' height='100px'>
            <input type="file" name="slika6" id="" value="<?php if(isset($_POST['slika6'])){echo $slika6;}?>">
        </div>
        <div class="inp-group">
            <label for="slika">Dodaj 7. sliku</label>
            <img src="<?php echo $_SESSION['base'] ?>/images/modle/<?php echo $slika7;?>" alt="" width='100px' height='100px'>
            <input type="file" name="slika7" id="" value="<?php if(isset($_POST['slika7'])){echo $slika7;}?>">
        </div>
        <div class="inp-group">
            <label for="slika">Dodaj 8. sliku</label>
            <img src="<?php echo $_SESSION['base'] ?>/images/modle/<?php echo $slika8;?>" alt="" width='100px' height='100px'>
            <input type="file" name="slika8" id="" value="<?php if(isset($_POST['slika8'])){echo $slika8;}?>">
        </div>
       
=======
            <!--SLIKA-->
        <div class="inp-group">
            <label for="slika">Dodaj sliku</label>
            <img src="../images/modle/<?php echo $slika;?>" alt="" width='100px' height='100px'>
            <input type="file" name="slika" id="" value="<?php if(isset($_POST['slika'])){echo $slika;}?>">
        </div>
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61

            <!--HASHTAG-->
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
            
        }else{?>
        <div class="inp-group">
            <label for="">Velicina</label>
            
            <?php
                while ($row=$selectSizes->fetch(PDO::FETCH_ASSOC)) {  ?>
                    <input type="text" name="velicina[]" id="" value="<?php echo $row['Dimenzija']?>">
            
            <?php  } ?>

        </div>
        <div class="inp-group" id='chckForAdditionalSizes'>
            <label for="">Unesi dodatne velicine</label>
            <input type="checkbox" name="moreSizes" id="">
        </div>
   
        <div class="inp-group additionalSizes" id='additionalSizes'>
                    <label for="velicina">Unesite broj polja za velicine</label>
                    <input type="button" name="" class='plus' id="" value='+' onclick="incrementwithAddingInputs()">
                    <input type="num" name="quantityofsizes" id="quantity" class='number' value='0' readonly>
                    <input type="button" name="" class='minus' id="" value='-' onclick="decrementWithRemovingInputs()" >
                 </div>

                <div class="inp-group size_upd" id='size_update' >
                    <label for="velicina">Unesite velicine</label>
                   
                </div>
        <?php } ?>
        

        <button type="submit" name="updateProizvod">Azuriraj proizvod</button>
    
    </form>
  
</div>
<?php

 
 }

 if(isset($_POST['updateProizvod'])){

    $idForm=$_POST['id'];
    $_SESSION['new_id']=$_POST['id'];
    $naziv=$_POST['naziv'];
    $kategorija=$_POST['kategorija'];
<<<<<<< HEAD
    $hashtag=$_POST['hashtag'];
    $path='';

    $tmp_img=$_FILES["slika1"]["name"];
    $tmp_img_name=$_FILES["slika1"]["tmp_name"];
    move_uploaded_file($tmp_img_name,"../images/modle/$tmp_img");

    $tmp_img2=$_FILES["slika2"]["name"];
    $tmp_img_name2=$_FILES["slika2"]["tmp_name"];
    move_uploaded_file($tmp_img_name2,"../images/modle/$tmp_img2");

    $tmp_img3=$_FILES["slika3"]["name"];
    $tmp_img_name3=$_FILES["slika3"]["tmp_name"];
    move_uploaded_file($tmp_img_name3,"../images/modle/$tmp_img3");

    $tmp_img4=$_FILES["slika4"]["name"];
    $tmp_img_name4=$_FILES["slika4"]["tmp_name"];
    move_uploaded_file($tmp_img_name4,"../images/modle/$tmp_img4");

    $tmp_img5=$_FILES["slika5"]["name"];
    $tmp_img_name5=$_FILES["slika5"]["tmp_name"];
    move_uploaded_file($tmp_img_name5,"../images/modle/$tmp_img5");

    $tmp_img6=$_FILES["slika6"]["name"];
    $tmp_img_name6=$_FILES["slika6"]["tmp_name"];
    move_uploaded_file($tmp_img_name6,"../images/modle/$tmp_img6");

    $tmp_img7=$_FILES["slika7"]["name"];
    $tmp_img_name7=$_FILES["slika7"]["tmp_name"];
    move_uploaded_file($tmp_img_name7,"../images/modle/$tmp_img7");
=======
    $tmp_img=$_FILES["slika"]["name"];
    $tmp_img_name=$_FILES["slika"]["tmp_name"];
    $hashtag=$_POST['hashtag'];

    move_uploaded_file($tmp_img_name,"../images/modle/$tmp_img");
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
  
    if(empty($tmp_img)){
        $res=$query->getProductByid($_SESSION['old_id']);
        while($row=$res->fetch(PDO::FETCH_ASSOC)){
<<<<<<< HEAD
            $tmp_img=$row['slika1'];
=======
            $tmp_img=$row['slika'];
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
        }
    }
 

    //handling imprint
<<<<<<< HEAD
    if(isset($_POST['imprint']) && $_POST['imprint']==0){
        $query->updateImprintsByCookieCutters($_SESSION['old_id'],$_POST['imprint']); //ako je utiskivac 0, odnosno bez utiskivaca, onda obrisi onaj red gde postoji utiskivac za tu modlu.
=======
    if(isset($_POST['imprint']) && $_POST['imprint']==2){
        $query->updateImprintsByCookieCutters($_SESSION['old_id'],$_POST['imprint']); //ako je utiskivac 2, odnosno bez utiskivaca, onda obrisi onaj red gde postoji utiskivac za tu modlu.
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
    }elseif (isset($_POST['addImprint'])) {
       
        $query->addImprint(1,$_SESSION['old_id']);  
    }else{

    }

    if (isset($_POST['withoutImprint'])) {
        
<<<<<<< HEAD
        $query->addImprint(0,$_SESSION['old_id']);
    }

echo $idForm;
echo $tmp_img,$tmp_img2,$tmp_img3,$tmp_img4,$tmp_img5,$tmp_img6,$tmp_img7,$_SESSION['old_id'];

   $exe=$query->updateProduct($idForm,$naziv,$kategorija,$hashtag,$_SESSION['old_id']);
   $updImg=$query->UPDATEALLIMAGES($idForm,$tmp_img,$tmp_img2,$tmp_img3,$tmp_img4,$tmp_img5,$tmp_img6,$tmp_img7,$_SESSION['old_id']);
  
   if ($updImg) {
    echo 'dobro';
   }else{
    echo 'ne valja';
   }
=======
        $query->addImprint(2,$_SESSION['old_id']);
    }


   $exe=$query->updateProduct($idForm,$naziv,$kategorija,$tmp_img,$hashtag,$_SESSION['old_id']);
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61

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

   if($_SESSION['rowCount_description']==1){
    
    #update description
    $ID_opisa=$_POST['ID_opisa'];
    $ID_modle=$_POST['ID_modle'];
    $debljina_sekaca=$_POST['debljina_sekaca'];
    $sirina_modle=$_POST['sirina_modle'];
    $duzina_modle=$_POST['duzina_modle'];
    $debljina_utiskivaca=$_POST['debljina_utiskivaca'];
    $tezina_modle=$_POST['tezina_modle'];
    $visina_utiskivaca=$_POST['visina_utiskivaca'];
    $visina_sekaca=$_POST['visina_sekaca'];
    $utiskivac_sekac_spojeni=$_POST['utiskivac_sekac_spojeni'];
    $velicina_testiranog_proizvoda=$_POST['velicina_testiranog_proizvoda'];

    $update_description=$query->UPDATEDESCRIPTIONOFPRODUCT($ID_modle,$debljina_sekaca,$sirina_modle,$duzina_modle,$debljina_utiskivaca,$tezina_modle,$visina_utiskivaca,$visina_sekaca,$utiskivac_sekac_spojeni,$velicina_testiranog_proizvoda,$ID_opisa);
}else{
    #insert description
    $ID_modle_ins=$_POST['ID_modle_ins'];
    $debljina_sekaca_ins=$_POST['debljina_sekaca_ins'];
    $sirina_modle_ins=$_POST['sirina_modle_ins'];
    $duzina_modle_ins=$_POST['duzina_modle_ins'];
    $debljina_utiskivaca_ins=$_POST['debljina_utiskivaca_ins'];
    $tezina_modle_ins=$_POST['tezina_modle_ins'];
    $visina_utiskivaca_ins=$_POST['visina_utiskivaca_ins'];
    $visina_sekaca_ins=$_POST['visina_sekaca_ins'];
    $utiskivac_sekac_spojeni_ins=$_POST['utiskivac_sekac_spojeni_ins'];
    $velicina_testiranog_proizvoda_ins=$_POST['velicina_testiranog_proizvoda_ins'];

    $insertDescription=$query->insertDescriptionOfProduct($ID_modle_ins,$debljina_sekaca_ins, $sirina_modle_ins,$duzina_modle_ins,$debljina_utiskivaca_ins,$tezina_modle_ins,$visina_utiskivaca_ins,$visina_sekaca_ins,$utiskivac_sekac_spojeni_ins,$velicina_testiranog_proizvoda_ins);

    if ($insertDescription==1) {
        echo 'inseeredt desc ';
    }else{
        echo 'not inserted';
    }
    
}
<<<<<<< HEAD
   if($exe){
=======
    if($exe){
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
           die(mysqli_error($connection));
       }else{
            $msg="Uspesno azuriran proizvod";
       }
       if (isset($_SESSION['new_id'])) {
<<<<<<< HEAD
        header("Location:".$_SESSION['base']."/content/product.php?product=$idForm");
       }else{
           $old=$_SESSION['old_id'];
        header("Location:".$_SESSION['base']."/content/product.php?product=$old");
=======
        header("Location:../content/product.php?product=$idForm");
       }else{
           $old=$_SESSION['old_id'];
        header("Location:../content/product.php?product=$old");
>>>>>>> a12b310facd7c35cdf3ea2c2827beb47fbfebd61
       }
       $func->refresh();
}
?>