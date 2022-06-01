<?php
    require_once 'DB/query.php';
    require_once 'partials/header.php';
    include_once 'partials/nav.php';
    require_once 'functions/functions.php';
    require_once 'DB/Database.php';
    $database=new Database();
    $db=$database->connection();

    $query=new Query($db);
    global $query;

?>
    <h3>Kategorije</h3>
            <form action="" method="post">
                <?php
                        $res=$query->selectAllCategories();
                        foreach ($res as $r) {?>
                            <div class="radio">

                                <input type="hidden" name="id" value='<?php echo $r['id']?>'>
                                <input type="radio"  class ='rbutton' name="naziv_kategorije" value='<?php echo $r['naziv']?>' id="">
                                <label for=""><?php echo $r['naziv']?></label>
                            
                            </div>
                           
                <?php   }  ?>
                            <button><a href="/Modlice/index.php" id='unsetCategory'> Resetuj kategorije</a></button>
               
            </form>
