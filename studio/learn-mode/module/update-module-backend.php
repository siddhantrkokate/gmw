<?php
    
    include("../../../api/connection.php");
    
    if(isset($_POST["contentID"]) && isset($_POST["moduleName"]) && isset($_POST["moduleID"])){
        
        $contentID = $_POST["contentID"];
        $moduleName = $_POST["moduleName"];
        $moduleID = $_POST["moduleID"];
        
        $select = "UPDATE `$contentID` SET `moduleName`='$moduleName' WHERE moduleID='$moduleID'";
        $query = mysqli_query($conn, $select);
        
        if(!$query){
            echo 20;
        }else{
            echo 10;
        }
        
    }
    
?>