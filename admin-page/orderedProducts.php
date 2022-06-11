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

$func=new Functions();
global $func;
?>
<h3>Na ovoj stranici se nalaze porudzbine, njihovi detalji i korisnicki profili</h3>
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
                    <td><a href="details_of_order.php?detail=<?php echo $row['id']?>">Detalji porudzbina</a></td>
                    <td><a href="customer_profile.php?profile=<?php echo $row['id']?>">Profil korisnika</a></td>
                </tr>
        <?php 
            }
        ?>
        
    </tbody>
</table>