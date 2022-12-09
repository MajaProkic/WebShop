<!-- PRODUCT DESCRIPTION-->

                        <div class="title">Opis proizvoda:</div>
                        <div class="description">Napomena: Kako bi Vam dali predstavu o dimenzijama modlice, ispisane su tačne dimenzije za jednu vličinu modle,
                             u tabeli ispod je navedeno koja veličina je obrađena. Ukoliko Vas zanimaju detalji za drugu dimenziju modle, pišite nam. Više detalja o
                            modlama možete saznati <a href="<?php echo $_SESSION['base']?>/header/o-nama.php#modle">ovde</a></div>
                   <table id='product_description'>
                        <?php 
                            $description=$query->selectdescriptionforspecificproduct($product_id);
                            while ($row=$description->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                                <tr>
                                    <th>Debljina sekača</th>
                                    <td><?php echo $row['debljina_sekaca']?></td>
                                </tr>

                                <tr>
                                    <th>Širina modle</th>
                                    <td><?php echo $row['sirina_modle']?></td>
                                </tr>

                                <tr>
                                    <th>Dužina modle</th>
                                    <td><?php echo $row['duzina_modle']?></td>
                                </tr>

                                <tr>
                                    <th>Debljina utiskivača</th>
                                    <td><?php echo $row['debljina_utiskivaca']?></td>
                                </tr>

                                <tr>
                                        <th>Težina modle</th>
                                        <td><?php echo $row['tezina_modle']?></td>
                                </tr>
                                <tr>
                                    <th>Visina utiskivača</th>
                                    <td><?php echo $row['visina_utiskivaca']?></td>
                                </tr>
                                <tr>
                                    <th>Visina sekača</th>
                                    <td><?php echo $row['visina_sekaca']?></td>
                                </tr>
                                <tr>
                                    <th>Utiskivač i sekač su spojeni</th>
                                    <td><?php echo $row['utiskivac_sekac_spojeni']?></td>
                                </tr>
                                <tr>
                                    <th>Veličina opisanog proizvoda je:</th>
                                    <td><?php echo $row['velicina_testiranog_proizvoda']?></td>
                                </tr>

                            <?php }?>
                   </table>
                </div>