<?php
    require_once './DB/query.php';
    require_once './header/header.php';
    include_once './header/nav.php';
    require_once './functions/functions.php';
    require_once './DB/Database.php';

    $database=new Database();
    $db=$database->connection();
    $query=new Query($db);
    global $query,$countModleByCategories;


    switch ($_SERVER['QUERY_STRING']) {
        case 'Stencil':
            $countModleByCategories=$query->allcategoryfromstencil();
            break;
            case 'Utiskivaci':
               
                break;
                case 'Toperi':
                    
                    break;
                    case 'Razno':
                        
                        break;
                        case 'Modle':
                            $countModleByCategories=$query->COUNTMODLEBYCATEGORY();
                            break;
            
        
        default:
        $countModleByCategories=$query->COUNTMODLEBYCATEGORY();
            break;
    }
?>

   <div class="functionality"> 
    <div class="title">Kategorije</div> 
    

                <?php
                    
                   while($row=$countModleByCategories->fetch(PDO::FETCH_ASSOC)) {?>
                    <div class="category-div">
                      
                 
                        <a href="#<?php echo $row['naziv']?>" class ='rbutton'>
                        <span class='icon'>
                            <?php echo $row['ikonica']?>
                        </span>
                            <?php echo $row['naziv'] .' ('. $row['broj_modli_po_kategoriji'].')'?>
                        </a>
                    </div>
                <?php   
                    }   
                    ?>
                             <a href="." id='reload'>Resetujte kategorije</a>
    </div>

<!--Za responzivnost -->
            <select name="" id="">
                <option value="-">Odaberite kategoriju</option>
                <?php
                    foreach ($countModleByCategories as $r) {?>
                        <option value="<?php echo $r['id']?>"><?php echo $r['naziv']?></option>
                 <?php } ?>
            </select>