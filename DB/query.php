<?php

 class Query{
    private $conn;

    private $SELECTALLFROMCATEGORY="SELECT * FROM kategorija ORDER BY naziv ";
    private $GETALLPRODUCTS="SELECT * FROM modla ORDER BY id DESC";
    private $INSERTPRODUCT="INSERT INTO modla (id, naziv, kategorija_id, opis, slika, hashtag) VALUES(?,?,?,?,?,?)"; 
    private $INSERTCATEGORY="INSERT INTO kategorija (naziv) VALUES(?)";
    private $DELETEPRODUCT="DELETE FROM modla WHERE id=?";
    private $SELECTPRODUCTBYID="SELECT * FROM modla WHERE id=?";
    private $UPDATEPRODUCT="UPDATE modla SET id=?, naziv=?, kategorija_id=?, opis=?, slika=?, hashtag=? WHERE id=?";
    private $SELECTPRODUCTBYCATEGORY="SELECT * FROM product WHERE kategorija_id=?";
    private $INSERTKUPAC="INSERT INTO kupci (ime, prezime, email, mesto, ulica, broj, telefon, napomena) VALUES(?,?,?,?,?,?,?,?)";
    private $INSERTORDEREDITEMS="INSERT INTO poručeni_artikli (ID_proizvoda, ID_narudzbenice, kolicina, utiskivac, velicina, cena) VALUES(?,?,?,?,?,?)";
    private $INSERTORDER="INSERT INTO narudzbenica (id_user, datum) VALUES (?,?)";
    private $SELECTIDOFUSER="SELECT id FROM kupci WHERE email=?";
    private $SELECTIDOFORDER="SELECT id FROM narudzbenica ORDER BY id DESC LIMIT 1";
    private $SELECTSIZES = "SELECT velicine.Dimenzija,velicine.ID from velicine_po_modli inner join velicine on velicine_po_modli.ID_velicine=velicine.ID  where ID_modle=?";
    private $SELECTIDCATEGORYANDNAME = "SELECT modla.kategorija_id, kategorija.naziv FROM modla INNER JOIN kategorija ON modla.kategorija_id=kategorija.id where modla.id=?";
    private $INSERTINTOUSER = "INSERT INTO user(ime,prezime, mesto,ulica,broj,broj_telefona,username,password,email,role) VALUES (?,?,?,?,?,?,?,?,?,?)";
    private $GETUSERBYINFO = "SELECT * FROM USER";
    private $GETSPECIFICUSER = "SELECT * FROM USER WHERE email=? and broj_telefona=?";
    private $GETSPECIFICUSERBYUSERNAME="SELECT * FROM USER WHERE username=?";
    private $GETSPEECIFICPRODUCT ="SELECT * FROM MODLA WHERE naziv=? and opis=?";
    private $INSERTINTOUTISKIVACIPOMODLAMA="INSERT INTO utiskivaci_po_modlama (ID_utiskivaca, ID_modle) VALUES(?,?)";
    private $INSERTINTOVELICINEPOMODLAMA="INSERT INTO velicine_po_modli (ID_velicine, ID_modle, RedniBrojVelicine) VALUES(?,?,?)";
    private $INSERTINTOCENE="INSERT INTO cene (	ID_velicine,ID_utiskivaca,Cena)";
    private $SELECTIMPRINT="SELECT u.Naziv, u.ID from utiskivaci u inner join utiskivaci_po_modlama upm on u.ID=upm.ID_utiskivaca where ID_modle=?";
    private $SELECTCENA="SELECT Cena from cene where ID_velicine =? and ID_utiskivaca=?";
    private $MAXMINPRICE="SELECT DISTINCT MAX(cene.Cena) AS 'maksimalna_cena', MIN(cene.Cena) as 'minimalna_cena', cene.ID_velicine, cene.ID_utiskivaca, velicine_po_modli.ID_modle FROM `velicine_po_modli` INNER JOIN cene ON velicine_po_modli.ID_velicine=cene.ID_velicine INNER JOIN utiskivaci_po_modlama ON cene.ID_utiskivaca=utiskivaci_po_modlama.ID_utiskivaca WHERE velicine_po_modli.ID_modle=190";
    private $SELECTCOOKIECUTTERSBYCATEGORIES="SELECT modla.naziv as' modlaNaziv', modla.id as 'modlaId', modla.opis, modla.slika, modla.hashtag, modla.kategorija_id, kategorija.id as 'kategorijaId', kategorija.naziv as 'kategorijaNaziv' FROM `modla` INNER JOIN kategorija ON modla.kategorija_id=kategorija.id where kategorija.naziv=?";
    private $UPDATESIZESBYCOOKIECUTTER="UPDATE velicine_po_modli SET ID_velicine=? where ID_modle=? and RedniBrojVelicine=?";
    private $UPDATEIMPRINTSBYCOOKIECUTTERS="DELETE FROM utiskivaci_po_modlama WHERE ID_modle=? AND ID_utiskivaca=?";
    private $ADDIMPRINT="INSERT INTO utiskivaci_po_modlama (ID_utiskivaca, ID_modle) VALUES(?,?)";
    

    public function __construct($db){
        $this->conn = $db;
    }

    public function addImprint($id_utiskivaca,$id_modle){
     
        $stmt=$this->conn->prepare($this->ADDIMPRINT);
        $stmt->execute([$id_utiskivaca,$id_modle]);
     }

    public function updateImprintsByCookieCutters($id_modle,$id_utiskivaca){
     
        $stmt=$this->conn->prepare($this->UPDATEIMPRINTSBYCOOKIECUTTERS);
        $stmt->execute([$id_modle,$id_utiskivaca]);
     }

    public function updateSizesByCookieCutter($id_velicine, $id_modle, $redniBrojVelicine){
     
        $stmt=$this->conn->prepare($this->UPDATESIZESBYCOOKIECUTTER);
        $stmt->execute([$id_velicine, $id_modle, $redniBrojVelicine]);
     }

    public function selectcookiecutterbycategories($name){
        return $this->sendOnlyOneVariableQuery($this->SELECTCOOKIECUTTERSBYCATEGORIES,$name);
    }

    public function maxminprice(){
        return $this->sendQueryWithReturnValueAndNoParams($this->MAXMINPRICE);
     }

    public function insertCena($id_velicine,$id_utiskivaca,$cena){
      $stmt=$this->conn->prepare($this->INSERTINTOCENE);
      $stmt->execute([$id_velicine,$id_utiskivaca,$cena]);
    }

        public function insertVelicinePoModlama($id_velicine,$id_modle,$redni_broj){
                $stmt=$this->conn->prepare($this->INSERTINTOVELICINEPOMODLAMA);
                $stmt->execute([$id_velicine,$id_modle,$redni_broj]);    
    }

    public function insertUtiskivaciPoModlama($id_utiskivaca,$id_modle){
      $stmt=$this->conn->prepare($this->INSERTINTOUTISKIVACIPOMODLAMA);
      $stmt->execute([$id_utiskivaca,$id_modle]);
    }

    public function getprice($id_velicine,$id_utiskivaca){
        $stmt=$this->conn->prepare($this->SELECTCENA);
        $stmt->execute([$id_velicine,$id_utiskivaca]);
        return $stmt;
    }

    public function getSpecificProduct($naziv,$opis){
        $stmt=$this->conn->prepare($this->GETSPEECIFICPRODUCT);
        $stmt->execute([$naziv,$opis]);
        return $stmt;
    }

    public function getSpecificUserByUsername($username)
    {
        $stmt=$this->conn->prepare($this->GETSPECIFICUSERBYUSERNAME);
        $stmt->execute([$username]);
        return $stmt;
    }

    public function getSpecificUser($email,$broj){
        $stmt=$this->conn->prepare($this->GETSPECIFICUSER);
        $stmt->execute([$email,$broj]);
        return $stmt;
    }
     public function getUsers(){
        return $this->sendQueryWithReturnValueAndNoParams($this->GETUSERBYINFO);
     }

    public function selectImprint($id)
    {
        return $this->sendOnlyOneVariableQuery($this->SELECTIMPRINT,$id);
    }
    public function selectIdCategoryAndName($id){
        return $this->sendOnlyOneVariableQuery($this->SELECTIDCATEGORYANDNAME,$id);
    }
    public function selectProductByCategory($id){
        return $this->sendOnlyOneVariableQuery($this->SELECTPRODUCTBYCATEGORY,$id);
    }
    public function selectAllCategories(){
        return $this->sendQueryWithReturnValueAndNoParams($this->SELECTALLFROMCATEGORY);
     }

     public function getAllProducts(){
        return $this->sendQueryWithReturnValueAndNoParams($this->GETALLPRODUCTS);
     }

     public function getProductByid($id)
     {
         return $this->sendOnlyOneVariableQuery($this->SELECTPRODUCTBYID,$id);
     }

     public function getUsersID($email)
     {
         $stmt=$this->conn->prepare($this->SELECTIDOFUSER);
        $stmt->execute([$email]);
        return $stmt;
     }

     public function selectSizes($id){
        return $this->sendOnlyOneVariableQuery($this->SELECTSIZES,$id);
    }
     
     public function getIdOfOrder(){
        return $this->sendQueryWithReturnValueAndNoParams($this->SELECTIDOFORDER);
     }

     public function updateProduct($idd,$naziv,$kategorija,$opis,$slika,$hashtag,$id){
     
        $stmt=$this->conn->prepare($this->UPDATEPRODUCT);
        $stmt->execute([$idd,$naziv,$kategorija,$opis,$slika,$hashtag,$id]);
     }
     
    public function insertUser($ime, $prezime,$mesto,$ulica,$broj,$broj_telefona,$username,$password,$email,$role){
        $stmt=$this->conn->prepare($this->INSERTINTOUSER);
        $stmt->execute([$ime, $prezime,$mesto,$ulica,$broj,$broj_telefona,$username,$password,$email,$role]);
        
     }

     public function insertProduct($id,$naziv,$kategorija,$opis,$slika,$hashtag){
       $stmt=$this->conn->prepare($this->INSERTPRODUCT);
       $stmt->execute([$id,$naziv,$kategorija,$opis,$slika,$hashtag]);
     }

     public function insertKupac($ime,$prezime,$email,$mesto,$ulica,$broj,$telefon,$napomena){
        $stmt=$this->conn->prepare($this->INSERTKUPAC);
        $stmt->execute([$ime,$prezime,$email,$mesto,$ulica,$broj,$telefon,$napomena]);
     }

     public function insertOrderedItems($id_proizvoda,$id_narudzbenice, $kolicina, $utiskivac, $velicina, $cena){
        $stmt=$this->conn->prepare($this->INSERTORDEREDITEMS);
        $stmt->execute([$id_proizvoda,$id_narudzbenice, $kolicina, $utiskivac, $velicina, $cena]);
     }

     public function insertOrder($id_usr,$date){
        $stmt=$this->conn->prepare($this->INSERTORDER);
        $stmt->execute([$id_usr,$date]);
     }

     public function insertCategory($naziv){
        $stmt=$this->conn->prepare($this->INSERTCATEGORY);
        $stmt->execute([$naziv]);
     }

     public function sendQueryWithReturnValueAndNoParams($query){
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
     }

     public function deleteProduct($id){
   
        $stmt=$this->conn->prepare($this->DELETEPRODUCT);
        $stmt->execute([$id]);
    }

     public function sendQuery($query){
  
         $stmt=mysqli_stmt_init($this->conn);
         $stmtParams=mysqli_stmt_prepare($stmt,$this->$query);
         if (!$stmt) {
            mysqli_error($this->conn);
         }else{
             mysqli_stmt_execute($stmt);
         }
     }

     public function sendOnlyOneVariableQuery($query,$variable){
   
        $stmt=$this->conn->prepare($query);
        $stmt->execute([$variable]);
       
        return $stmt;
            
    }
 }

?>