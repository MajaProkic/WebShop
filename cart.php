<?php
require_once 'DB/query.php';
require_once 'partials/header.php';
require_once 'partials/head.php';
include_once 'partials/nav.php';
require_once 'functions/functions.php';
require_once 'DB/Database.php';
$database=new Database();
$db=$database->connection();
global $db;
$query=new Query($db);
global $query;
$msg=isset($msg)?$msg:"";
$func=new Functions();
global $func;?>

<?php


 if (isset($_GET['delete'])) {
    $deleted_id=$_GET['delete'];
    $func->removeElementFromSession('product_cart',$deleted_id,'id');
    
}
if(isset($_GET['truncate_cart'])){
    if(isset($_SESSION['product_cart'])){
        session_destroy();
    }
}

if (isset($_POST['buy'])) {
    $id=$_POST['id'];
    $naziv=$_POST['naziv_proizvoda'];
    $size=$_POST['size'];
    $imprint=$_POST['imprint'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];

    $arr=$func->add_in_array_imp($id,$naziv,$size,$imprint,$price,$quantity);    
    $mess=$func->sessionCart('product_cart',$arr,$id);
    $func->refresh();
}
    
?>
<div class="cart-table">

    <h3>Proizvodi koji su dodati u korpu</h3>
    <table>
        <thead>
            <tr>
                <th>Sifra</th>
                <th>Naziv</th>
                <th>Veličina</th>
                <th>Utiskivac</th>
                <th>Kolicina</th>
                <th>Obriši</th>
                <th>Cena</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_SESSION['product_cart'])) {
                ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <?php
                $total_price=0;
                foreach ($_SESSION['product_cart'] as $key) {
                  
                    ?>
                    
                    <tr id='cart'>
                        
                    <td><input type="text" name="id" id="" value='<?php echo $key['id']; ?>'readonly="readonly"></td>
                        <td><input type="text" name="naziv" id="" value='<?php echo $key['naziv'] ?>'readonly="readonly" ></td>
                        <td><input type="text" name="size" id="" value='<?php echo $key['size'] ?>'readonly="readonly" ></td>
                        <td><?php if ($key['imprint']==0) {?>
                           <input type="text" name="utiskivac" id="" value='<?php echo 'Bez utiskivaca' ?>'readonly="readonly" >
                       <?php }else{?>
                        <input type="text" name="utiskivac" id="" value='<?php echo 'Sa utiskivacem' ?>' readonly="readonly" >
                       <?php }?>
                       <td><input type="text" name="quantity" id="" value='<?php echo $key['quantity']?>'readonly="readonly"></td>
                        <td class='delete'><a href="cart.php?delete=<?php echo $key['id'];?>">Obriši</a></td>
                        <td>
                         <input type="text" name="cena" id="" value="<?php echo $key['price'];
                         $total_price=$total_price+$key['price']*$key['quantity']?>"readonly="readonly">
                        </td>
                    </tr>
                   
            <?php 
             
                }   ?>

        </tbody>
    </table>
            <p class='total_price'> Ukupna cena: <?php echo $total_price?> RSD</p>
    <button id="truncate-cart"><a href="cart.php?truncate_cart">Isprazni korpu</a></button>
       <button><a href="index.php#<?php echo $key['id']?>">Nastavite sa kupovinom</a></button>   
    <?php
}else{
    $msg='Vasa korpa je prazna';
    ?>
    <div class="message">
        <?php echo  $msg; ?>
    </div>
   
 <?php
}
?>

</div>


<h1>Popunite Vaše podatke za slanje</h1>

    <div class="page">
        <div class="form-div">
            <div class="left-side">
                <div class="sub-inline">
                    <?php if (isset($_SESSION['username'])) {
                       $user=$query->getSpecificUserByUsername($_SESSION['username']);
                        while ($row=$user->fetch(PDO::FETCH_ASSOC)) {?>
                            <input type="text" name="ime" id="" placeholder="Ime" required="required" value='<?php echo $row['ime']?>' >
                    <input type="text" name="prezime" id="" placeholder="Prezime" required="required" value='<?php echo $row['prezime']?>' >
                </div>
                        <input type="text" name="email" id="" placeholder='E-mail' required="required"  value='<?php echo $row['email']?>'>
                         <div class="sub-inline-three">
                            <input type="text" name="mesto" id="" placeholder='Mesto' required="required" value='<?php echo $row['mesto']?>'>
                            <input type="text" name="ulica" id="" placeholder='Ulica' required="required" value='<?php echo $row['ulica']?>'>
                            <input type="number" name="broj" id="" placeholder='Broj' required="required" value='<?php echo $row['broj']?>'>
                        </div>
              
                        <input type="number" name="telefon" id="" placeholder='Broj telefona' required="required" value='<?php echo $row['broj_telefona']?>'>
                      <?php  }
                    }else{?>
                    <input type="text" name="ime" id="" placeholder="Ime" required="required" >
                    <input type="text" name="prezime" id="" placeholder="Prezime" required="required" >
                </div>
                        <input type="text" name="email" id="" placeholder='E-mail' required="required" >
                         <div class="sub-inline-three">
                            <input type="text" name="mesto" id="" placeholder='Mesto' required="required" >
                            <input type="text" name="ulica" id="" placeholder='Ulica' required="required" >
                            <input type="number" name="broj" id="" placeholder='Broj' required="required" >
                        </div>
                        <input type="number" name="telefon" id="" placeholder='Broj telefona' required="required" >
              <?php }?>
                        
                    <textarea name="napomena" id="" cols="30" rows="10" placeholder='Napomena'></textarea>
                
            </div>

                <button id='btn-poruci'><input type="submit" name="poruci" id="" value='Poruči'></button>

            </form>

        </div>
        <div class="right-side">
            <p>Slanje se obavlja kurirskom službom PostExpress. Cena ove usluge <b>okvirno</b> iznosi 300 dinara. </p>

        </div>

    </div>
    <div class="footer">
    <?php include_once 'partials/footer.php'?>
    </div>

<?php
if(isset($_POST['poruci'])){
    $id = $naziv = $size = $imprint = $cena = $kolicina = $ime = $prezime = $email = $mesto = $ulica = $broj = $telefon = $napomena = ""; 
    $id=$func->test_input($_POST['id']);
    $naziv=$func->test_input($_POST['naziv']);
    $size=$func->test_input($_POST['size']);
    $imprint=$func->test_input($_POST['utiskivac']);
    $cena=$func->test_input($_POST['cena']);
    $kolicina=$func->test_input($_POST['quantity']);

    $ime=$func->test_input($_POST['ime']);
    $prezime=$func->test_input($_POST['prezime']);
    $email=$func->test_input($_POST['email']);
    $mesto=$func->test_input($_POST['mesto']);
    $ulica=$func->test_input($_POST['ulica']);
    $broj=$func->test_input($_POST['broj']);
    $telefon=$func->test_input($_POST['telefon']);
    $napomena=$func->test_input($_POST['napomena']);
    $datum=date('Y/m/d');

    $getUSersID=$query->getUsersID($email);
    $countOfRows=$getUSersID->rowCount();

    if($countOfRows==0){
        $res=$query->insertKupac($ime,$prezime,$email,$mesto,$ulica,$broj,$telefon,$napomena);

        if($res) 
        $msg='Greska pri unosu kupca u bazu';
        else 
        $msg='Uspesno unet kupac';
        $getUSersIDD=$query->getUsersID($email);
        while ($row=$getUSersIDD->fetch(PDO::FETCH_ASSOC)) {
            $id_new_user= $row['id'];
            global $id_new_user;
        }
       $insertOrder=$query->insertOrder($id_new_user,$datum);
      echo 'nov kupaac';

    }else{
        $msg= 'Ovaj kupac vec postoji';

        while ($row=$getUSersID->fetch(PDO::FETCH_ASSOC)) {
            $id_user= $row['id'];
            global $id_user;
        }
        $insertOrder=$query->insertOrder($id_user,$datum);
        echo 'stari kupac';
    }

    $getidoforder=$query->getIdOfOrder();
    while ($row=$getidoforder->fetch(PDO::FETCH_ASSOC)) {
        $idOfOrder=$row['id'];
        global $idOfOrder;
    
    }
  

    $func->refresh();
}


?>
