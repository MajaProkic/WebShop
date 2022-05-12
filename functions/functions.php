<?php
require_once 'DB/query.php';
require_once 'DB/Database.php';


$infoaboutProduct=isset($infoaboutProduct)?$infoaboutProduct:"";
class Functions{


    
    public function cutString($string,$wichLength,$maxLength){
        if(strlen($string)>$wichLength){
            $string = substr($string,0,$maxLength);
            return $string.'...';
        }else{
            return $string;
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    public function pickTypeOfCookieCutter($utiskivac){
        switch ($utiskivac) {
            case '1':
                return <<<HTML
              
                <option value="1">Sa utiskivacem</option>
                <option value="0">Bez utiskivaca</option>
                
                HTML;
                break;

                case '0':
                    return <<<HTML
                    <option value="0">Bez utiskivaca</option>
                   
                HTML;
                    break;
            default:
                # code...
                break;
        }
    }
   
    public function add_in_array_imp($id,$naziv,$size,$imprint,$price,$quantity){
        
        $arr=array(
                $id=>array(
                    'id'=>$id,
                    'naziv'=>$naziv,
                    'size'=>$size,
                    'imprint'=>$imprint,
                    'price'=>$price,
                    'quantity'=>$quantity
                
                )
            );
        return $arr;
    }
  
    public function sessionCart($name_of_session,$name_of_array,$id_of_product){
        if(empty($_SESSION[$name_of_session])){
            $_SESSION[$name_of_session]=$name_of_array;
      
            echo "Proizvod je dodat";
          }else{
            $array_keys=array_keys($_SESSION[$name_of_session]);
            
            if(in_array($id_of_product,$array_keys)){
                echo "Vec je dodat!";
            }else{
            
              $_SESSION[$name_of_session]=$_SESSION[$name_of_session]+$name_of_array;
              echo "Proizvod je dodat";
              
            }
          }
    }

    public function removeElementFromSession($session_name,$idofElement,$nameofElement){
        $key=array_search($idofElement,array_column($_SESSION[$session_name],$nameofElement));
        if($key!==false){
            unset($_SESSION[$session_name][$key]);
            $_SESSION[$session_name] = array_values($_SESSION[$session_name]);
        }else {
           $msg='Nije pronađen proizvod';
        }

    }
    public function refresh()
    {
        echo "<meta http-equiv='refresh' content='0'>"; 
   
        
    }
    public function dynamicTitle($path)
    {
        $path=$_SERVER['PHP_SELF'];
        $page=basename($path);

        switch ($page) {
            case 'index.php':
                return 'Dobrodošli na sajt 3D radionice!';
                break;

                case 'cart.php':
                    return 'Korpa';
                    break;

                    case 'o-nama.php':
                        return 'O nama';
                        break;

                        case 'product.php':
                            return 'Proizvodi';
                            break;

                            case 'admin.php':
                                return 'Admin strana';
                                break;

                                case 'add.product.php':
                                    return 'Dodavanje proizvoda';
                                    break;

                                    case 'update-product.php':
                                        return 'Ažuriranje proizvoda';
                                        break;

                                        case 'registracija.php':
                                            return 'Registracija';
                                            break;

                                            case 'login.php':
                                                return 'Prijava korisnika';
                                                break;

                                                case 'Products.php':
                                                    return 'Proizvodi';
                                                    break;
            
            default:
            return '3D radionica';
                break;
        }
    }
    
    public function average_price($id)
    {
        $database=new Database();
        $db=$database->connection();
        $query=new Query($db);
        global $query;

        $getProduct=$query->getProductByid($id);
        while ($row=$getProduct->fetch(PDO::FETCH_ASSOC)) {
            $velicina1=$row['velicina_1'];
            $velicina2=$row['velicina_2'];
            $velicina3=$row['velicina_3'];
            $utiskivac=$row['utiskivac'];
        }
        
        
    }

}
?>