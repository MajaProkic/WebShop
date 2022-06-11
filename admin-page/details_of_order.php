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
              <h3> Porudzbine korisnika <?php echo $row['ime'].' '.$row['prezime']?></h3>
           <?php }
       ?>
   </section>
    <table>
        <thead>
            <th>ID porudzbine</th>
            <th>Datum kreiranja</th>
            <th>Detalji</th>
            <th>Vrednost porudzbine</th>
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
             
                <td><?php echo $row['ukupna_cena']?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
   <?php
}
?>