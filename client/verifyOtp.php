<?php 
//require_once("./functions/DB-config.php");
$flowrate="";
$error="";
if(isset($_POST['button-3'])){
    $otp = $_POST['otp'];
    
    try{
        $sql = "SELECT * FROM temp WHERE otp='.$otp.'"; 
        $result = $pdo->query($sql);
        if($result->rowCount() > 0){
            while($row = $result->fetch()){
                $otp = $row['otp'];
                $flowrate = $row['flowrate'];
                $density = $row['density'];               
            }
            // Free result set
            unset($result);
        } else{
            $error =  "No records matching your query were found.";
        }
    } catch(PDOException $e){
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
    // Close connection
    unset($pdo);
    
}
require_once("./includes/header.php");
?>
<div class="container my-4">
    <div class="row">
        <div class="col-12 col-lg-8">
            <!--start card-->
            <div class="card-wrapper card-space">
                <div class="card card-bg card-big border-bottom-card">
                    <div class="flag-icon"></div>
                    <div class="etichetta">
                        <svg class="icon">
                            <use xlink:href="./svg/sprite.svg#it-settings"></use>
                        </svg>
                        <span>OTP -3456</span>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input class="form-control" type="text" id="input-text-read-only" readonly>
                            <label for="input-text-read-only">Contenuto in sola lettura</label>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><svg class="icon icon-sm">
                                            <use xlink:href="./svg/sprite.svg#it-pencil"></use>
                                        </svg></div>
                                </div>
                                <label for="input-group-1">Con Etichetta</label>
                                <input type="text" class="form-control" id="input-group-1" name="input-group-1">
                                <div class="input-group-append">
                                    <button class="btn" type="button" id="button-1">Invio</button>
                                </div>
                            </div>
                        </div>
                        <input class="btn btn-outline-primary btn-sm" value="submit" id="submitTransaction"
                            name="submitTransaction">
                    </div>
                </div>
            </div>
            <!--end card-->
        </div>
    </div>
</div>
<?php require_once("./includes/footer.php");