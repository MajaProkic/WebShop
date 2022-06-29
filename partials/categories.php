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
   <div class="functionality">
    Kategorije
   </div>
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
                            <button id='unsetCategory'> Resetuj kategorije</button>
               
            </form>
