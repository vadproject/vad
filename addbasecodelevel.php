<?php

require("session_start.php");

if(isset($_POST['submit']))
{

    if(!isset($_POST['target']) || !isset($_POST['release'])){
                        
        header("Location:database.php?release_notadded='yes'");                 
    }     

    else{
    
        $release = trim(mysql_escape_string(strtoupper($_POST['product'])));
        $release_id = $_POST['target'];  
     
        require("databaseconnect.php");

        $checkrelease=  mysql_query("SELECT * from releaselist");

        while($row = mysql_fetch_array($checkrelease)){
            if($release==$row['release']){
                $storerelease = $row['release'];
                header("Location:database.php?release_exist='yes'");
            }
        }

        if(!isset($storerelease)){       
            $insert_release = " INSERT INTO releaselist VALUES('','$release','$release_id')";

            if (!mysql_query($insert_release,$con)){
                die('Error: ' . mysql_error());
            }
            header("Location:database.php?release_added='yes'");
        }
        
   
    mysql_close($con);
    }
}

?>