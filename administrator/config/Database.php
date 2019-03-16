<?php
class Database {
    //DB params
    private $host = "localhost";
    private $dbname = "id8983458_bytes";
    private $username="id8983458_root";
    private $password = "ankeshraj";
    private $conn;

    //DB connect

    public function connect(){
        $this->conn = null;
        try{
            $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name,$this->username,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            echo 'Connection Error : ' . $e->getMessage();
        }
        return $this->conn;

        }
    }

?>