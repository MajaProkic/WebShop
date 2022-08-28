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

    move_uploaded_file($tmp_img_name,"../images/modle/$tmp_img");//proveri da li ce da radi na live

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
      
        header('Refresh:1; url='.$_SESSION['base'].'/index.php');
    }
?>