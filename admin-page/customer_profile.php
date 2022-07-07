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

if (isset($_GET['profile'])) {
  $id_user=$_GET['profile'];
  $allAboutCustomer=$query->allAboutCustomer($id_user);
  while ($row=$allAboutCustomer->fetch(PDO::FETCH_ASSOC)) {
?>
<div class="container">
    <div class="customer-profile">
        <div class="left">
            <img src="../images/user.png" alt="userImage">
            <p><?php echo $row['ime'].' '.$row['prezime'] ?></p>
        </div>

        <div class="right">
            <div class="info-box">
                <div class="description"> E-mail: </div>
                    <div class="information"><?php echo $row['email']?> </div>
            </div>
            <div class="info-box">
                <div class="description"> Adresa: </div>
                    <div class="information"><?php echo $row['mesto'].' '.$row['ulica'].' '.$row['broj']?> </div>
            </div>
            
            <div class="info-box">
                <div class="description"> Broj telefona: </div>
                    <div class="information"><?php echo $row['telefon']?> </div>
            </div>
            
        </div>
    </div>
</div>
    <?php 
    }
}
?>



