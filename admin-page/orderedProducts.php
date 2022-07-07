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

    <table>
        <thead>
            <th>Ime i prezime korisnika</th>
            <th>Broj kupovina</th>
            <th>Detalji porudzbina</th>
            <th>Profil korisnika</th>
        </thead>
        <tbody>
            <?php 
                    $numberoforders=$query->numberoforders();
                        while ($row=$numberoforders->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr>
                        <td><?php echo $row['ime'].' '. $row['prezime']?></td>
                        <td><?php echo $row['broj porudzbina'];                
                        ?></td>
                        <td><a href="details_of_order.php?detail=<?php echo $row['id']?>"><img src="../images/file.png" alt="detalji porudzbine"></a></td>
                        <td><a href="customer_profile.php?profile=<?php echo $row['id']?>"><img src="../images/user.png" alt="detalji porudzbine"></a></td>
                    </tr>
            <?php 
                }
            ?>
            
        </tbody>
    </table>
</div>