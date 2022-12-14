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
$msg=isset($msg)?$msg:"";

if (isset($_GET['userid'])) {
    $id_of_customer=$_GET['userid'];
   ?>
   <section class='details-of-order'>
       <?php $allAboutCustomer=$query->allAboutCustomer($id_of_customer);
            while ($row=$allAboutCustomer->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="title">
             Porudzbine korisnika <?php echo $row['ime'].' '.$row['prezime']?>
            </div>
              
           <?php }
       ?>

    <table>
        <thead>
            <th>ID porudzbine</th>
            <th>Datum kreiranja</th>
            <th>Status</th>
            <th>Napomena</th>
            <th>Nacin placanja</th>
            <th>Kurirska sluzba</th>
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
                <td><?php echo $row['status']?></td>
                <td><?php echo $row['napomena']?></td>
                <td><?php echo $row['nacin_placanja']?></td>
                <td><?php echo $row['kurirska_sluzba']?></td>
                <td><a href="separated_order.php?order=<?php echo $row['id']?>">Detaljniji izvestaj</a></td>
             
               
            </tr>
            <?php } ?>
        </tbody>
    </table>
   <?php
}
?>
   </section>