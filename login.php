<?php
require_once 'DB/query.php';
require_once 'partials/header.php';
require_once 'partials/head.php';
require_once 'functions/functions.php';
require_once 'partials/nav.php';
require_once 'DB/Database.php';
$database=new Database();
$db=$database->connection();
$msg=isset($msg)?$msg:"";
$query=new Query($db);
global $query;

if (isset($_GET['logovanje'])) {
    $username=$_GET['username'];
    $email=$_GET['email'];
    $password=$_GET['password'];

    $res=$query->getUsers();
    
    while ($row=$res->fetch(PDO::FETCH_ASSOC)) {
        if (password_verify($password, $row['password']) && $email==$row['email']) {
           $_SESSION['username']=$row['username'];
           $_SESSION['role']=$row['role'];
           $msg = 'uspesno ste se ulogovali '.$_SESSION['username'] ;
           header('Refresh:1; url=index.php');
           ?>
           <div class="msg-success">
               <?php echo $msg?>
           </div> 
           <?php
        }
    }
}
?>
<div class="login-page">
    <h1>Prijava korisnika</h1>
    <div class="form-login">
        <form action="" method="get">
        <input type="text" name="username" id="" required='required' placeholder='Username'>
        <input type="mail" name="email" id="" required='required' placeholder='Email'>
        <input type="password" name="password" id="" required='required' placeholder='Password'>

        <button type='submit' name='logovanje' id='login-btn'>Prijavi se</button>
        </form>
    </div>
</div>