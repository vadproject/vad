<?php

require("session_start.php");

if(isset($_POST['submit']))
{

    if(!isset($_POST['product']) || !isset($_POST['target'])){
                        
        header("Location:database.php?release_notadded='yes'");                 
    }     

    else{
    
        $target = trim(mysql_escape_string($_POST['target'])); 
        $target_id = trim(mysql_escape_string($_POST['product']));  
     
        require("databaseconnect.php");

        $checktarget=  mysql_query("SELECT * from targetlist");

        while($row = mysql_fetch_array($checktarget)){
            if($target==$row['target']){
                $storetarget = $row['target'];
                header("Location:database.php?target_exist='yes'");
            }
        }

        if(!isset($storetarget)){       
            $insert_target = " INSERT INTO targetlist VALUES('','$target','$target_id')";

            if (!mysql_query($insert_target,$con)){
                die('Error: ' . mysql_error());
            }
            
            header("Location:database.php?target_added='yes'");
        }
        
   
    mysql_close($con);
    }
}

?>