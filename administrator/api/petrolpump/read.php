<?php
//Headers
header('Access-Control-Allow-Origin:*');
header('Content-Type : application/json');
include_once("../../config/Databse.php");
include_once("../../models/Petrolpump.php");

//Instantiate Database and connect

$database = new Database();
$db = $databse->connect();

//Instantiate petrolpump Object

$petrolPump = new Petrolpump($db);

//PetrolPump Query

$result = $post->read();

//Get Row Count

$num = $result->rowCount();

//check if any row

if($num > 0){
    //pump array

    $pump_arr = array();

    $pump_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        $pump_item = array(
            'id' => $row['id'],
            'address' => $row['address'],
            'source_id' => $row['source_id'],
            'xAxis' => $row['x-axis'],
            'yAxis' => $row['y-axis'],
            'status' => $row['status'],
            'purity' => row['purity']
        );

        array_push($pump_arr['data'],$pump_item);
    }

    //turn to Json and Output

    echo json_encode($pump_arr);

}
else{

    //No Pumps Found

    echo json_encode(array('message' => 'No pumps'));
}