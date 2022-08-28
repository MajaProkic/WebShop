<?php
switch ($_SERVER['QUERY_STRING']) {
    case 'Stencil':
        include_once(__DIR__.'/../stencili/stencils.php');
        break;
        case 'Utiskivaci':
            echo 'da';
            break;
            case 'Toperi':
                echo 'da';
                break;
                case 'Razno':
                    echo 'da';
                    break;
                    case 'Modle':
                        include_once 'products.php';
                        break;
        
    
    default:
    include_once 'products.php';
        break;
}
?>