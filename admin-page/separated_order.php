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
if (isset($_GET['order'])) {
    $id_of_order=$_GET['order'];
    ?>
     <div class="admin-menu">
        <button><a href="orderedProducts.php">Poruceni proizvodi</a></button>
        <button><a href="admin.php">Admin panel</a></button>
        <button><a href="orderedProducts.php">Porudzbenice</a></button>
    </div>
    <div class="title">
            Detalji porudzbine 
    </div>

          
    <?php
    $getSpecificOrderByIdCustomerAndIdOfOrder=$query->getSpecificOrderByIdCustomerAndIdOfOrder($id_of_order);
    while ($row=$getSpecificOrderByIdCustomerAndIdOfOrder->fetch(PDO::FETCH_ASSOC)) { 
      ?>
    <section class="separated-order">   
        <table>
            <thead>
                <th>Naziv artikla</th>
                <th>Slika</th>
                <th>Kolicina</th>
                <th>Utiskivac</th>
                <th>Velicina</th>
                <th>Cena po komadu</th>
            </thead>
            <tbody>
            <?php
                     while ($row=$getSpecificOrderByIdCustomerAndIdOfOrder->fetch(PDO::FETCH_ASSOC)) { 
                    ?>
                <tr>
                    <td><?php echo $row['naziv']?></td>
                    <td><img src="<?php echo $_SESSION['base']?>/images/modle/<?php echo $row['slika1']?>" alt=""></td>
                    <td><?php echo $row['kolicina']?></td>
                    <td><?php echo $row['utiskivac']?></td>
                    <td><?php echo $row['velicina']?></td>
                    <td><?php echo $row['cena']*$row['kolicina'];?>
                </tr>
                <?php }?>
            </tbody>
        </table>
<?php
    }
}
?>
</section>

