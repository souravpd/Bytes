<?php
require_once("./DB-config.php");
if(isset($_GET['otp']) && isset($_GET['flowrate']) && isset($_GET['density'])){
    $otp = $_GET['otp'];
    $flowrate = $_GET['flowrate'];
    $flowrate = $_GET['density'];
    try{
        $sql = "INSERT INTO temp (otp,flowrate,density) VALUES ($otp,$flowrate,$density) ";   
        $pdo->exec($sql);
        echo "Records inserted successfully.";
    } catch(PDOException $e){
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
}
// Close connection
unset($pdo);
?>