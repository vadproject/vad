<?php

require("session_start.php");

if(isset($_POST['submit']))
{

    if(!isset($_POST['printerfamily'])){
                        
        header("Location:database.php?family_notadded='yes'");                 
    }     

    else{
        
        $strtolower = strtolower($_POST['printerfamily']);
        $family = ucfirst($strtolower);
      
        require("databaseconnect.php");

        $checkrelease=  mysql_query("SELECT * from printer_family");
        $storefamily = '';
        while($row = mysql_fetch_array($checkrelease)){
            if($family==$row['family']){
                $storefamily = $row['family'];
                header("Location:database.php?family_exist='yes'");
            }
        }

        if($family!=$storefamily){       
            $insert_family = " INSERT INTO printer_family VALUES('','$family')";

            if (!mysql_query($insert_family,$con)){
                die('Error: ' . mysql_error());
            }
            header("Location:database.php?family_added='yes'");
        }
        
   
    mysql_close($con);
    }
}

?>