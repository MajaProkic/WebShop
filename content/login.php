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
    $query=new Query($db);
    global $query;
    $func=new Functions();
    global $func;

if (isset($_POST['logovanje'])) {
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $res=$query->getUsers();

     while ($row=$res->fetch(PDO::FETCH_ASSOC)) {

        if (password_verify($password, $row['password']) && $email==$row['email']) {
         
           $_SESSION['username']=$row['username'];
           $_SESSION['role']=$row['role'];

           $msg = 'uspesno ste se ulogovali '.$_SESSION['username'] ;
           header('Refresh:1; url='.$_SESSION['base'].'/index.php');
           $func->successfulClass($msg);
        }
    }
}
?>
<div class="login-page">
    <h1>Prijava korisnika</h1>
    <div class="form-login">
        <form action="" method="post">
        <input type="text" name="username" id="login-username" required='required' placeholder='Username'>
        <input type="mail" name="email" id="login-email" required='required' placeholder='Email'>
        <input type="password" name="password" id="login-password" required='required' placeholder='Password'>
        <a href="#">Zaboravili ste lozinku?</a>
        <button type='submit' name='logovanje' id='login-btn'>Prijavi se</button>
        </form>
      
    </div>
    
</div>
<div class="footer">
    <?php include_once '../footer/footer.php'?>
</div>