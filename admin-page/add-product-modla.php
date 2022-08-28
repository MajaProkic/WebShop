<?php
require_once (__DIR__.'/../header/header.php');
require_once (__DIR__.'/../header/head.php');
require_once (__DIR__.'/../functions/functions.php');
include_once(__DIR__.'/../header/nav.php');
require_once(__DIR__.'/../DB/query.php');
require_once(__DIR__.'/../DB/Database.php');
include_once(__DIR__.'/../admin-page/add-product-modla-processing.php');


$database=new Database();
$db=$database->connection();
$query=new Query($db);
global $query;
$func=new Functions();
global $func;
$msg=isset($msg)?$msg:"";
$count=1;


?>
  <?php if (isset($_SESSION['role']) && $_SESSION['role']=='admin') { ?>
<div class="admin-menu">
    <?php include_once 'admin-menu.php'; ?>
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
<?php }else {
    header("Location:".$_SESSION['base']."/index.php");
} ?>