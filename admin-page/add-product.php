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
$func=new Functions();
global $func;
$msg=isset($msg)?$msg:"";
$count=1;

if(isset($_POST['dodajProizvod'])){
    $id=$_POST['id'];
    $naziv=$_POST['naziv'];
    $kategorija=$_POST['kategorija'];
    $utiskivac=$_POST['utiskivac'];
    $tmp_img=$_FILES["slika"]["name"];
    $tmp_img_name=$_FILES["slika"]["tmp_name"];
    $hashtag=$_POST['hashtag'];
    $velicina=$_POST['velicinaAdd'];
    move_uploaded_file($tmp_img_name,"../images/modle/$tmp_img");

    //description
    $debljina_sekaca=$_POST['debljina_sekaca'];
    $sirina_modle=$_POST['sirina_modle'];
    $duzina_modle=$_POST['duzina_modle'];
    $debljina_utiskivaca=$_POST['debljina_utiskivaca'];
    $tezina_modle=$_POST['tezina_modle'];
    $visina_utiskivaca=$_POST['visina_utiskivaca'];
    $visina_sekaca=$_POST['visina_sekaca'];
    $utiskivac_sekac_spojeni=$_POST['utiskivac_sekac_spojeni'];
    $velicina_testiranog_proizvoda=$_POST['velicina_testiranog_proizvoda'];
    
   $isProductAlreadyExist=$query->getProductByid($id);
    
   foreach ($isProductAlreadyExist as $key => $value) {
     $isProductAlreadyExistVAL=$value;
     global $isProductAlreadyExistVAL;
   }
    
        if (empty($isProductAlreadyExistVAL)) {
            $res = $query->insertProduct($id,$naziv, $kategorija, $tmp_img,$hashtag,date('d-m-y H:i:s'));
            $insertDescription=$query->insertDescriptionOfProduct($id,$debljina_sekaca,$sirina_modle,$duzina_modle,$debljina_utiskivaca,$tezina_modle,$visina_utiskivaca,$visina_sekaca,$utiskivac_sekac_spojeni,$velicina_testiranog_proizvoda);
            if($utiskivac==1){
                $query->insertUtiskivaciPoModlama(1,$id);//HARD CODE, REPAIR THIS
                $query->insertUtiskivaciPoModlama(2,$id);
            }else{
                $query->insertUtiskivaciPoModlama(2,$id);//HARD CODE, REPAIR THIS
            }
            
        
            $msg='Uspešno unet proizvod';
            $func->successfulClass($msg);
        }else{
            $msg='Nažalost, proizvod nije unet';
            $func->errorClass($msg);
        }

        foreach ($velicina as $key => $value) {
            $count=$count+1; //HARD CODE, REPAIR THIS

            $query->insertVelicinePoModlama($value,$id,$count);

        }
      
        header('Refresh:1; url=/Modlice/index.php');
    }
?>
<div class="admin-menu">
    <button><a href="add-product.php">Dodaj proizvod</a></button>
    <button><a href="add-category.php">Dodaj kategoriju</a></button>
    <button><a href="admin.php">Svi proizvodi</a></button>

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
           

            <div class="inp-group">
                <label for="kategorija">Kategorija</label>
        
                <select name="kategorija" id="" >
                    <?php
                   
                    $query=$query->selectAllCategories();

                    while ($row=$query->fetch(PDO::FETCH_ASSOC)) {  ?>
                        <option value="<?php echo $row['id']?>"> <?php echo $row['naziv']?></option>
                    <?php } ?>
                </select> 
            
            </div>
            <div class="inp-group">
                <label for="utiskivac">Utiskivac</label>
                <select name="utiskivac" id="">
                    <option value="2">Bez utiskivaca</option>
                    <option value="1">Sa utiskivacem</option>
                </select> 
            </div>
                <div class="title">
                        <h4>Opis proizvoda</h4>
                    </div>
                <div class="inp-group-group">
                   
                    <div class="inp-group">
                        <label for="">Širina modle</label>
                        <input type="text" name="sirina_modle" id="">
                    </div>
                    <div class="inp-group">
                        <label for="">Dužina modle</label>
                        <input type="text" name="duzina_modle" id="">
                    </div>
                    <div class="inp-group">
                        <label for="">Visina sekača</label>
                        <input type="text" name="visina_sekaca" id="">
                    </div>
                    <div class="inp-group">
                        <label for="">Debljina sekaca</label>
                        <input type="text" name="debljina_sekaca" id="">
                    </div>
                    <div class="inp-group">
                        <label for="">Debljina utisk.</label>
                        <input type="text" name="debljina_utiskivaca" id="">
                    </div>

                    <div class="inp-group">
                        <label for="">Visina utisk.</label>
                        <input type="text" name="visina_utiskivaca" id="">
                    </div>
                     
                    <div class="inp-group">
                        <label for="">Težina modle</label>
                        <input type="text" name="tezina_modle" id="">
                    </div>
                    <div class="inp-group">
                        <label for="">Da li su utiskivač i sekač spojeni?</label>
                        <input type="text" name="utiskivac_sekac_spojeni" id="">
                    </div>
                    <div class="inp-group">
                        <label for="">Prikazane informacije su za proizvod veličine:</label>
                        <input type="text" name="velicina_testiranog_proizvoda" id="">
                    </div>
                
                </div>
        
            <div class="inp-group">
                <label for="slika">Dodaj sliku</label>
                <input type="file" name="slika" id="" >
            </div>

            <div class="inp-group">
                <label for="">Hashtag</label>
                <input type="text" name="hashtag" placeholder='Hashtag'>
            </div>
                
            
                <div class="inp-group">
                    <label for="velicina">Unesite broj polja za velicine</label>
                    <input type="button" name="" class='plus' id="" value='+' onclick="incrementwithAddingInputs()">
                    <input type="num" name="quantityofsizes" id="quantity" class='number' value='0' readonly>
                    <input type="button" name="" class='minus' id="" value='-' onclick="decrementWithRemovingInputs()" >
                 </div>

                <div class="inp-group" id='size_update'>
                    <label for="velicina">Unesite velicine</label>
                   
                </div>
        
               <button type="submit" name="dodajProizvod">Dodaj proizvod</button> 
        </form>

    </div>
</div>
