<?php
require_once 'DB/query.php';
require_once 'partials/header.php';
require_once 'partials/head.php';
require_once 'functions/functions.php';
include_once 'partials/nav.php';
require_once 'DB/Database.php';
$database=new Database();
$db=$database->connection();
$msg=isset($msg)?$msg:"";
$query=new Query($db);
global $query;
?>
<?php
if (isset($_POST['registruj_se'])) {
    $ime=$_POST['ime'];
    $prezime=$_POST['prezime'];
    $grad=$_POST['grad'];
    $ulica=$_POST['ulica'];
    $broj=$_POST['broj'];
    $telefon=$_POST['telefon'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $lozinka=$_POST['lozinka'];
    
    $hashed_pass=password_hash($lozinka, PASSWORD_DEFAULT);
    //provera da li postoji vec unet korisnik sa istim podacima kako se ne bi unosio dva puta
    $res=$query->getSpecificUser($email,$telefon);
    $count=$res->rowCount();

    if ($count<1) {
        $query->insertUser($ime,$prezime,$grad,$ulica,$broj,$telefon,$username,$hashed_pass,$email,'customer');
        $msg= "Korisnik je uspesno registrovan."; ?>

            <div class="msg-success">
                <?php echo $msg?>
            </div><?php
    }else{

        $msg="Nazalost, doslo je do greske prilikom unosa korisnika"; ?>

        <div class="msg-error">
            <?php echo $msg?>
        </div><?php
    }
   
}
?>
<div class="registration-page">

    <div class="msg-info">
        Registracijom olakšavate sebi kupovinu na taj način što nećete morati svaki put da unosite svoje podatke
    </div>

    <h1>Registracija korisnika</h1>

    <div class="form-div">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

        <div class="sub-inline">
            <input type="text" name="ime" id="" required='required' placeholder='Ime'> 
            <input type="text" name="prezime" id="" required='required' placeholder='Prezime'> 
        </div>

        <div class="sub-inline-three">
            <input type="text" name="grad" id="" required='required' placeholder='Mesto'> 
            <input type="text" name="ulica" id="" required='required' placeholder='Ulica'> 
            <input type="text" name="broj" id="" required='required' placeholder='Broj'> 
        </div>

            <input type="text" name="telefon" id="" required='required' placeholder='Telefon'> 
            <input type="mail" name="email" id="" required='required' placeholder='E-mail'> 
            <input type="text" name="username" id="" required='required' placeholder='Username'> 
            <input type="password" name="lozinka" id="" required='required' placeholder='Lozinka'> 

            <button><input type="submit" name="registruj_se" id="" value='Registrujte se'></button>
        </form>
        
    </div>
</div>
