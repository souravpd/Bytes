<?php
try{
    $pdo = new PDO("mysql:host=localhost;dbname=id8983458_bytes", "id8983458_root", "ankeshraj");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
 
if(isset($_GET['otp']) && isset($_GET['flowrate'])){
    $otp = $_GET['otp'];
    $flowrate = $_GET['flowrate'];
    try{
        $sql = "INSERT INTO temp (otp,flowrate) VALUES ($otp,$flowrate) ";   
        $pdo->exec($sql);
        echo "Records inserted successfully.";
    } catch(PDOException $e){
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }

}
 
// Close connection
unset($pdo);
?>