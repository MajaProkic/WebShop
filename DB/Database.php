<?php
class Database{
    private $host='localhost';
    private $username='root';
    private $password='';
    private $db_name='modle';
    private $conn;

    public function connection ()
    {
        $this->conn=null;

        try {
            $this->conn=new PDO('mysql:host='.$this->host.'; dbname='.$this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection error'. $e->getMessage();
        }
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $this->conn;
    }
}

?>