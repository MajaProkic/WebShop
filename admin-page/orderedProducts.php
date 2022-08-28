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
?>
<div class="admin-page">
    <div class="title">
        <h2>Na ovoj stranici se nalaze porudzbine, njihovi detalji i korisnicki profili</h2>
    </div>
<form action="" method='post'>
    <table>
        <thead>
            <th>Datum pristizanja porudzbine</th>
            <th> ID narudzbenice</th>
            <th>Ime i prezime kupca</th>
            <th>Status poruzbine</th>
            <th>Poruzbina</th>
            <th>Kupac</th>
            
        </thead>
        <tbody>
            <?php 
                    $numberoforders=$query->numberoforders();
                        while ($row=$numberoforders->fetch(PDO::FETCH_ASSOC)) {
                    
                    ?>
                    <tr class='status'>
                        <input type="text" name="idUser" id="" value='<?php echo $row['kupciid']?>' hidden>
                        
                        <td><?php echo $row['datum']?></td>
                        <td><?php echo $row['idnarudzbenice']?></td>
                        <td><?php echo $row['ime'].' '. $row['prezime']?></td>
                           <td><a href="orderedProducts.php?iduser=<?php echo $row['idnarudzbenice']?>&status=primljeno"> Primljeno</a>
                           <a href="orderedProducts.php?iduser=<?php echo $row['idnarudzbenice']?>&status=u izradi"> U izradi</a>
                           <a href="orderedProducts.php?iduser=<?php echo $row['idnarudzbenice']?>&status=spakovano"> Spakovano</a>
                           <a href="orderedProducts.php?iduser=<?php echo $row['idnarudzbenice']?>&status=poslato"> Poslato</a>
                        </td>            
                        <td><a href="details_of_order.php?userid=<?php echo $row['kupciid']?>"><img src="<?php echo $_SESSION['base']?>/images/file.png" alt="detalji porudzbine"></a></td>
                        <td><a href="customer_profile.php?userid=<?php echo $row['kupciid']?>"><img src="<?php echo $_SESSION['base']?>/images/file.png" alt="detalji porudzbine"></a></td>
                      
                    </tr>
            <?php 
            
                }
            ?>
            
        </tbody>
    </table>
    </form>
</div>
<?php
if(isset($_GET['status'])){

 $id= $_GET['iduser'];
 $status= $_GET['status'];

 $query->UPDATESTATUSFROMNAARUDZBENICA($status,$id);
}
?>