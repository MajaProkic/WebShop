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
                return 'Dobrodo??li na sajt 3D radionice!';
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
                                        return 'A??uriranje proizvoda';
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
                return 'Izra??ujemo modlice za kola??e, fondane, medenjake itd. Modlice izra??ujemo od PLA plastike. Na na??em sajtu mo??ete na??i najve??i izbor raznolikih modlica koje ??e Vam ulep??ati praznike';
                break;

                case 'cart.php':
                    return 'U korpi se nalaze svi dodati proizvodi. Proizvodi koji su dodati u korpu nisu jo?? uvek poru??eni';
                    break;

                    case 'o-nama.php':
                        return 'Strana o nama sadr??i osnovne informacije o 3D radionici i o materijalima sa kojima radimo';
                        break;

                        case 'product.php':
                            return 'Pojedina??ni proizvodi sa svojim atributima gde kupac mo??e pogledati sve informacije vezane za pojedina??ni proizvod.';
                            break;

                            case 'admin.php':
                                return 'Admin strana sadr??i sve informacije vezane za porud??bine, kupce i ostale detalje. Ova strana nije dostupna regularnim kupcima';
                                break;

                                case 'add.product.php':
                                    return 'Dodavanje proizvoda spada u okviru admin strane gde se dodaju novi proizvodi od strane ovla????enog lica';
                                    break;

                                    case 'update-product.php':
                                        return 'A??uriranje proizvoda se odvija na admin strani od strane ovla????enog lica i ova stranica nije dostupna regularnim korisnicima';
                                        break;

                                        case 'registracija.php':
                                            return 'Registracija korisnika se vr??i an stranici registracija gde korisnici ostavljaju svoje li??ne podatke koji ??e pomo??i da ne moraju unositi svoje li??ne podtke svaki put kada po??ele da naru??e proizvod';
                                            break;

                                            case 'login.php':
                                                return 'Prijava korisnika predstavlja upotrebu informacija sa registracije kako bi sajt znao sa kojim korinsikom se trenutno bavi.';
                                                break;

                                                case 'Products.php':
                                                    return 'Svi proizvodi koji su uneti u bazu podataka, brzi pregled svih proizvoda';
                                                    break;

                                                    case 'contact.php':
                                                        return 'Kontakt strana omogu??uje kontakt sa ovla????enim licima u vezi bilo kojih dodatnih informacija. Korisnik mo??e kontaktirati ovla????eeno lice na vi??e na??ina';
                                                        break;

                                                            case 'placanje-i-isporuka.php':
                                                                return 'Ova strana pru??a sv informacije koje su vezane za dostavu proizvoda potro??a??u';
                                                                break;

                                                                case 'reklamacije.php':
                                                                    return 'Stranica na kojoj korisnik mo??e pro??itati informacije vezane za reklamaciju proizvoda.';
                                                                    break;

                                                                    case 'stencil.php':
                                                                        return 'Stencili predstavljaju proizvod od PLA plastike koji se upotrebljavaju za dekorisanje kola??a. Karakteri??e ih jako tanka struktura i ??upljine koje imaju smislen oblik';
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