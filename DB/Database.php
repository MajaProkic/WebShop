<?php
class Database{
    private $host='localhost';
    //private $username='maja98_majaprokic';
    //private $password='Majaprokic998.';
    private $username='root';
   private $password='';
    private $db_name='modle';
   // private $db_name='maja98_modle';
    private $charset='utf8mb4';

    private $conn;

    public function connection ()
    {
        $this->conn=null;

        try {
            $this->conn=new PDO('mysql:host='.$this->host.'; dbname='.$this->db_name, $this->username, $this->password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
           
         
        } catch (PDOException $e) {
            echo 'Connection error'. $e->getMessage();
        }
        $this->conn=new PDO('mysql:host='.$this->host.'; dbname='.$this->db_name, $this->username, $this->password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      
 
        return $this->conn;
    }
}

?>