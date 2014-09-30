<?php

require("session_start.php");

if(isset($_POST['submit']))
{

    if(!isset($_POST['family']) || !isset($_POST['product'])){
                        
        header("Location:database.php?release_notadded='yes'");                 
    }     

    else{
    
        $product = trim(mysql_escape_string(ucfirst(strtolower($_POST['product']))));
        $product_id = trim(mysql_escape_string($_POST['family']));  
     
        require("databaseconnect.php");

        $checkproduct=  mysql_query("SELECT * from productlist");

        while($row = mysql_fetch_array($checkproduct)){
            if($product==$row['product']){
                $storeproduct = $row['product'];
                header("Location:database.php?product_exist='yes'");
            }
        }

        if(!isset($storeproduct)){       
            $insert_product = " INSERT INTO productlist VALUES('','$product','$product_id')";

            if (!mysql_query($insert_product,$con)){
                die('Error: ' . mysql_error());
            }
            echo $product_id;
            header("Location:database.php?product_added='yes'");
        }
        
   
    mysql_close($con);
    }
}

?>