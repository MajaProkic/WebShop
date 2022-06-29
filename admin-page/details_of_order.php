<?php
require_once(__DIR__.'/../functions/functions.php');
require_once(__DIR__.'/../DB/Database.php');
require_once(__DIR__.'/../DB/query.php');
require_once(__DIR__.'/../partials/nav.php');
require_once(__DIR__.'/../partials/header.php');
require_once(__DIR__.'/../partials/head.php');

$database=new Database();
$db=$database->connection();
$query=new Query($db);
global $query;
$msg=isset($msg)?$msg:"";

if (isset($_GET['detail'])) {
    $id_of_customer=$_GET['detail'];
   ?>
   <section>
       <?php $allAboutCustomer=$query->allAboutCustomer($id_of_customer);
            while ($row=$allAboutCustomer->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="title">
            <h2> Porudzbine korisnika <?php echo $row['ime'].' '.$row['prezime']?></h2>
            </div>
              
           <?php }
       ?>
   </section>
    <table>
        <thead>
            <th>ID porudzbine</th>
            <th>Datum kreiranja</th>
            <th>Detalji</th>
            
        </thead>
        <tbody>
            <?php 
            $joinedOrderedItems=$query->joinedOrdersByCustomer($id_of_customer);
            while ($row=$joinedOrderedItems->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['datum']?></td>
                <td><a href="separated_order.php?order=<?php echo $row['id']?>">Detaljniji izvestaj</a></td>
             
               
            </tr>
            <?php } ?>
        </tbody>
    </table>
   <?php
}
?>