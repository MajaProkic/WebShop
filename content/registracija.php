<?php
require_once (__DIR__.'/../header/header.php');
require_once (__DIR__.'/../header/head.php');
require_once (__DIR__.'/../functions/functions.php');
include_once(__DIR__.'/../header/nav.php');
require_once(__DIR__.'/../DB/query.php');
require_once(__DIR__.'/../DB/Database.php');

$database=new Database();
$db=$database->connection();
$msg=isset($msg)?$msg:"";
$query=new Query($db);
global $query;


if (isset($_POST['registruj_se'])) {
    $ime=$func->test_input($_POST['ime']);
    $prezime=$func->test_input($_POST['prezime']);
    $grad=$func->test_input($_POST['grad']);
    $ulica=$func->test_input($_POST['ulica']);
    $broj=$func->test_input($_POST['broj']);
    $telefon=$func->test_input($_POST['telefon']);
    $email=$func->test_input($_POST['email']);
    $username=$func->test_input($_POST['username']);
    $lozinka=$func->test_input($_POST['lozinka']);
    $lozinkaAgain=$func->test_input($_POST['lozinka_check']);
    
    
    $hashed_pass=password_hash($lozinka, PASSWORD_DEFAULT);
    //provera da li postoji vec unet korisnik sa istim podacima kako se ne bi unosio dva puta
    $res=$query->getSpecificUser($email,$telefon);
    $count=$res->rowCount();

    if ($count<1) {
        $query->insertUser($ime,$prezime,$grad,$ulica,$broj,$telefon,$username,$hashed_pass,$email,'customer');
        $msg= "Korisnik je uspesno registrovan."; 
        $func->successfulClass($msg);
      
    }else{

        $msg="Nazalost, doslo je do greske prilikom unosa korisnika"; 
        $func->errorClass($msg);
    }
   
}
?>
<div class="registration-page">
    
    <?php 
    //$text='Registracijom olakšavate sebi kupovinu na taj način što nećete morati svaki put da unosite svoje podatke';
    //$func->infoClass($text);
    ?>
   
    <h1>Registracija korisnika</h1>

    <div class="form-reg">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name='forma' method="post" onsubmit='return(validate())'>
            <div class="two-columns">
                <input type="text" name="ime" id="ime" placeholder='Ime' > 
                <input type="text" name="prezime" id="prezime" required placeholder='Prezime'> 
            </div>
            
            <input type="text" name="grad" id="mesto" required placeholder='Mesto'> 

            <input type="text" name="ulica" id="ulica" required placeholder='Ulica'> 
            <input type="text" name="broj" id="broj" required placeholder='Broj'>         

            <input type="text" name="telefon" id="telefon" required placeholder='Telefon'> 
            <input type="mail" name="email" id="email" required placeholder='E-mail'> 
            <input type="text" name="username" id="username" required placeholder='Username'> 
            <div class="two-columns">
            <input type="password" name="lozinka" id="lozinka" required placeholder='Lozinka'>
            <input type="password" name="lozinka_check" id="lozinka_check" required placeholder='Potvrdite lozinku'>
            </div>
    
            <button type='submit' name='registruj_se'>Registruj se</button>
        </form>
        
    </div>
</div>
<div class="footer">
    <?php include_once '../footer/footer.php'?>
</div>