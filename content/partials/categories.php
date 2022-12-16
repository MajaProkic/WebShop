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

   <div class="functionality"> Kategorije </div>

                <?php
                       
                   
                            foreach ($countModleByCategories as $count) {?>
                              <a href="#<?php echo $count['naziv']?>" class ='rbutton'><?php echo $count['naziv'] .' ('. $count['broj_modli_po_kategoriji'].')'?></a>
                <?php   }   ?>
                             <a href="." id='reload'>Resetujte kategorije</a>

<!--Za responzivnost -->
            <select name="" id="">
                <option value="-">Odaberite kategoriju</option>
                <?php
                    foreach ($countModleByCategories as $r) {?>
                        <option value="<?php echo $r['id']?>"><?php echo $r['naziv']?></option>
                 <?php } ?>
            </select>