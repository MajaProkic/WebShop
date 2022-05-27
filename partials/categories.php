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
    <h2>Kategorije</h2>
            <form action="" method="post">
                <?php
                        $res=$query->selectAllCategories();
                        foreach ($res as $r) {?>
                            <div class="checkbox">

                                <input type="hidden" name="id" value='<?php echo $r['id']?>'>
                                <input type="checkbox"  class ='chckbox' name="naziv_kategorije" value='<?php echo $r['naziv']?>' id="">
                                <label for=""><?php echo $r['naziv']?></label>
                            <button></button>
                            </div>
                           
                <?php   }  ?>
                
               
            </form>
