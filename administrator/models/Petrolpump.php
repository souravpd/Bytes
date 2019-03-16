<?php
class Petrolpump{
    //DB stuff
    private $conn;
    private $table = "petrolpump";

    //properties

    public $id;
    public $address;
    public $source_id;
    public $x_axis;
    public $y_axis;
    public $status;
    public $purity;
    public $traffic;

    //Constructor with DB

    public function __construct($db){
        $this->conn =  $db ;
    }

    //GET POSTS

    public function read(){
        //Create Query

        $query = 'SELECT p.id,
        p.address,
        p.source_id,
        p.x-axis,
        p.y-axis,
        p.status,
        p.purity,
        p.traffic
        FROM '.$this->table.' p ';
        
        //Prepare Statement

        $stmt = $this->conn->prepare($query);

        //Execute Query

        $stmt->execute();
        return $stmt;
    }

}
?>