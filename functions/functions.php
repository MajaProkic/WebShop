<?php
require_once(__DIR__.'/../DB/query.php');
require_once(__DIR__.'/../DB/Database.php');



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
      
            $msg= "Proizvod je dodat";
          }else{
            $array_keys=array_keys($_SESSION[$name_of_session]);
            
            if(in_array($id_of_product,$array_keys)){
                $msg= "Vec je dodat!";
            }else{
            
              $_SESSION[$name_of_session]=$_SESSION[$name_of_session]+$name_of_array;
              $msg= "Proizvod je dodat";
              
            }
          }
          return $msg;
    }

    public function removeElementFromSession($session_name,$idofElement,$nameofElement){
        $key=array_search($idofElement,array_column($_SESSION[$session_name],$nameofElement));
        if($key!==false){
            unset($_SESSION[$session_name][$key]);
            $_SESSION[$session_name] = array_values($_SESSION[$session_name]);
            return $_SESSION[$session_name];
        }else {
           
        }
        return $_SESSION[$session_name];
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

                                                    case 'contact.php':
                                                        return 'Kontakt';
                                                        break;

                                                        case 'mapa.php':
                                                            return 'Mapa sajta';
                                                            break;

                                                            case 'placanje-i-isporuka.php':
                                                                return 'Placanje i isporuka';
                                                                break;

                                                                case 'reklamacije.php':
                                                                    return 'Reklamacije';
                                                                    break;

                                                                    case 'stencil.php':
                                                                        return 'Stensili';
                                                                        break;
            
            default:
            return '3D radionica';
                break;
        }
    }
    public function dynamicDescription($path)
    {
        $path=$_SERVER['PHP_SELF'];
        $page=basename($path);

        switch ($page) {
            case 'index.php':
                return 'Izrađujemo modlice za kolače, fondane, medenjake itd. Modlice izrađujemo od PLA plastike. Na našem sajtu možete naći najveći izbor raznolikih modlica koje će Vam ulepšati praznike';
                break;

                case 'cart.php':
                    return 'U korpi se nalaze svi dodati proizvodi. Proizvodi koji su dodati u korpu nisu još uvek poručeni';
                    break;

                    case 'o-nama.php':
                        return 'Strana o nama sadrži osnovne informacije o 3D radionici i o materijalima sa kojima radimo';
                        break;

                        case 'product.php':
                            return 'Pojedinačni proizvodi sa svojim atributima gde kupac može pogledati sve informacije vezane za pojedinačni proizvod.';
                            break;

                            case 'admin.php':
                                return 'Admin strana sadrži sve informacije vezane za porudžbine, kupce i ostale detalje. Ova strana nije dostupna regularnim kupcima';
                                break;

                                case 'add.product.php':
                                    return 'Dodavanje proizvoda spada u okviru admin strane gde se dodaju novi proizvodi od strane ovlašćenog lica';
                                    break;

                                    case 'update-product.php':
                                        return 'Ažuriranje proizvoda se odvija na admin strani od strane ovlašćenog lica i ova stranica nije dostupna regularnim korisnicima';
                                        break;

                                        case 'registracija.php':
                                            return 'Registracija korisnika se vrši an stranici registracija gde korisnici ostavljaju svoje lične podatke koji će pomoći da ne moraju unositi svoje lične podtke svaki put kada požele da naruče proizvod';
                                            break;

                                            case 'login.php':
                                                return 'Prijava korisnika predstavlja upotrebu informacija sa registracije kako bi sajt znao sa kojim korinsikom se trenutno bavi.';
                                                break;

                                                case 'Products.php':
                                                    return 'Svi proizvodi koji su uneti u bazu podataka, brzi pregled svih proizvoda';
                                                    break;

                                                    case 'contact.php':
                                                        return 'Kontakt strana omogućuje kontakt sa ovlašćenim licima u vezi bilo kojih dodatnih informacija. Korisnik može kontaktirati ovlašćeeno lice na više načina';
                                                        break;

                                                            case 'placanje-i-isporuka.php':
                                                                return 'Ova strana pruža sv informacije koje su vezane za dostavu proizvoda potrošaču';
                                                                break;

                                                                case 'reklamacije.php':
                                                                    return 'Stranica na kojoj korisnik može pročitati informacije vezane za reklamaciju proizvoda.';
                                                                    break;

                                                                    case 'stencil.php':
                                                                        return 'Stencili predstavljaju proizvod od PLA plastike koji se upotrebljavaju za dekorisanje kolača. Karakteriše ih jako tanka struktura i šupljine koje imaju smislen oblik';
                                                                        break;
            
            default:
            return '3D radionica';
                break;
        }
    }
    
    
   public function write_product($id_product,$path_to_image,$name_of_product)
   {
    $database=new Database();
    $db=$database->connection();
    
    $query=new Query($db);
    $fun=new Functions();
    
    
      ?>
       <div class="product-cart" id='<?php echo $id_product?>'>
          
            <div class="image-of-product">
               
                <a href="/Modlice/content/product.php?product=<?php echo $id_product?>"><div class="desc">Pogledajte detalje</div></a>
                <img src="/Modlice/images/modle/<?php echo $path_to_image?>" alt="product">
            </div>

            <div class="title-of-product">
                <h3><?php 
               echo $fun->cutString($name_of_product,20,18);
              
             ?></h3>
            </div>

            <div class="price">
                <p id='average-price'><?php
                $res=$query->maxminprice($id_product);
                while ($row=$res->fetch(PDO::FETCH_ASSOC)) {
                    echo $row['minimalna_cena'].'-';
                    echo $row['maksimalna_cena'];
                }
                ?>RSD</p>
            </div>
           
        </div>
    <?php
   }
   public function infoClass($text)
   {    ?>
   <div class="message" id='msg-info'>

        <div class="msg-info-image">
            <img src="/Modlice/images/icons8-info-48.png" alt="info icon">
        </div>
        <div class="msg-info-text">
            <?php echo $text?>
        </div>
    
   </div>

    <?php  
   }

   public function errorClass($text)
   {    ?>
   <div class="message" id='msg-error'>

        <div class="msg-error-image">
            <img src="/Modlice/images/icons8-error-48.png" alt="error icon">
        </div>
        <div class="msg-error-text">
            <?php echo $text?>
        </div>
    
   </div>

    <?php  
   }

   public function successfulClass($text)
   {    ?>
   <div class="message" id='msg-successful'>

        <div class="msg-successful-image">
            <img src="/Modlice/images/icons8-tick-48.png" alt="successful icon">
        </div>
        <div class="msg-successful-text">
            <?php echo $text?>
        </div>
    
   </div>

    <?php  
   }

   public function warningClass($text)
   {    ?>
   <div class="message" id='msg-warning'>

        <div class="msg-warning-image">
            <img src="/Modlice/images/icons8-xbox-x-48.png" alt="warning icon">
        </div>
        <div class="msg-warning-text">
            <?php echo $text?>
        </div>
    
   </div>

    <?php  
   }


}


?>