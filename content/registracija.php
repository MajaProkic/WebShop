<?php
require_once (__DIR__.'/../header/header.php');
require_once (__DIR__.'/../header/head.php');
require_once (__DIR__.'/../functions/functions.php');
include_once(__DIR__.'/../header/nav.php');
require_once(__DIR__.'/../DB/query.php');
require_once(__DIR__.'/../DB/Database.php');
require_once (__DIR__.'/../header/url_extension.php');

$database=new Database();
$db=$database->connection();
$msg=isset($msg)?$msg:"";
$query=new Query($db);
global $query;
?>
<div class="registration-page">
    
    <?php 
    //$text='Registracijom olakšavate sebi kupovinu na taj način što nećete morati svaki put da unosite svoje podatke';
    //$func->infoClass($text);
    ?>
   
    <h1>Registracija korisnika</h1>

    <div class="form-reg">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name='forma' method="post" id='forma'>

            <div class="two-columns">
                <input type="text" name="ime" id="ime" placeholder='Ime' > 
                <span id='error_ime'></span>
                <input type="text" name="prezime" id="prezime" required placeholder='Prezime'> 
                <span id='error_prezime'></span>
            </div>

            <input type="text" name="grad" id="mesto" required placeholder='Mesto'>
            <span id='error_mesto'></span> 
            <input type="text" name="ulica" id="ulica" required placeholder='Ulica'> 
            <span id='error_ulica'></span>
            <input type="text" name="broj" id="broj" required placeholder='Broj'>
            <span id='error_broj'></span>     
            <input type="text" name="telefon" id="telefon" required placeholder='Telefon'>
            <span id='error_telefon'></span> 
            <input type="mail" name="email" id="email" required placeholder='E-mail'>
            <span id='error_email'></span> 
            <input type="text" name="username" id="username" required placeholder='Username'> 
            <span id='error_username'></span>

            <div class="two-columns">
                <input type="password" name="lozinka" id="lozinka" required placeholder='Lozinka'>
                <span id='error_lozinka'></span>
                <input type="password" name="lozinka_check" id="lozinka_check" required placeholder='Potvrdite lozinku'>
                <span id='error_lozinka_check'></span>
            </div>
    
            <button type='submit' name='registruj_se'>Registruj se</button>
        </form>
        
    </div>
</div>
<div class="footer">
    <?php include_once '../footer/footer.php';
    
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

    $res=$query->getSpecificUser($email,$telefon);//problem

    $count=$res->rowCount();

    if ($count<1) {
        $query->insertUser($ime,$prezime,$grad,$ulica,$broj,$telefon,$username,$hashed_pass,$email,'customer');
        $msg= "Korisnik je uspesno registrovan."; 
        $func->successfulClass($msg);
 
        header('Location:'.$_SESSION['base'].'/index.php');
      
    }else{

        $msg="Nazalost, doslo je do greske prilikom unosa korisnika"; 
        $func->errorClass($msg);
    }
   
}
    ?>
</div>