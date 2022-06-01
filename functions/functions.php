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
    
   public function write_product($id_product,$path_to_image,$name_od_product)
   {
    
           echo "<div class='image-of-product'>";
             echo "<p class='image-text'>Novo</p>";
               echo "<a href='product.php?product=". $id_product."><img src=".$path_to_image." alt='product'></a>"; 
               echo "</div>";
                echo "<div class='title-of-product'>";
                  echo"<h3>". $name_od_product."</h3>";
               echo "</div>"; 
               echo "<div class='price'>";
                  echo "<p id='average-price'>";
                  
                   $res=$query->maxminprice($id_of_product);
                   while ($row=$res->fetch(PDO::FETCH_ASSOC)) {
                       echo $row['minimalna_cena'].'-';
                       echo $row['maksimalna_cena'];
                   }
                   ?>RSD</p>
               </div>
    
           
<?php
   }

  

}


?>