<!DOCTYPE html>
<html>
<head>
    
</head>
<body>
    <center><button type="button" onclick="window.location='addsamerelease.php'">Go Back</button></center>
</body>
</html>
<?php
    require("session_start.php");

    if(isset($_POST['submit']))
{

        if(!isset($_POST['target1']) && !isset($_POST['target2']) && !isset($_POST['target3'])){
            header("Location:addsamerelease.php?notarget=1");
        }    

        else{
        
            $release = strtoupper($_POST['release']);          
            
            require("databaseconnect.php");

            $release_id1 = $_POST['target1'];  
            $checkrelease1=  mysql_query("SELECT * from releaselist WHERE release_id=".$release_id1);
            if($release!='' && $release_id1!=''){
                while($row1 = mysql_fetch_array($checkrelease1)){
                    if($release==$row1['release']){
                        $storerelease1 = $row1['release'];
                        //header("Location:database.php?release_id=".$release_id1);
                        $target1 = mysql_query("SELECT target from targetlist WHERE id=".$release_id1);
                        while($targetrow1 = mysql_fetch_array($target1)){
                        echo "<center>".$release." already exist in the target ".$targetrow1['target']."<center>\n";
                        exit();
                        }
                    }
                }
            }

            $release_id2 = $_POST['target2'];
            $checkrelease2=  mysql_query("SELECT * from releaselist WHERE release_id=".$release_id2);
            if($release!='' && $release_id2!=''){
                while($row2 = mysql_fetch_array($checkrelease2)){
                    if($release==$row2['release']){
                        $storerelease2 = $row2['release'];
                        //header("Location:database.php?release_id=".$release_id2);
                        $target2 = mysql_query("SELECT target from targetlist WHERE id=".$release_id2);
                        while($targetrow2 = mysql_fetch_array($target2)){
                        echo "<center>".$release." already exist in the target ".$targetrow2['target']."<center>\n";
                        exit();
                        }
                    }
                }
            }

            $release_id3 = $_POST['target3'];   
            $checkrelease3=  mysql_query("SELECT * from releaselist WHERE release_id=".$release_id3);
            if($release!='' && $release_id3!=''){
                while($row3 = mysql_fetch_array($checkrelease3)){
                    if($release==$row3['release']){
                        $storerelease3 = $row3['release'];
                        //header("Location:database.php?release_id=".$release_id3);
                        $target3 = mysql_query("SELECT target from targetlist WHERE id=".$release_id3);
                        while($targetrow3 = mysql_fetch_array($target3)){
                        echo "<center>".$release." already exist in the target ".$targetrow3['target']."<center>\n";
                        exit();
                        }
                    }
                }
            }

            if($release!=$storerelease1 && $release!=$storerelease2 && $release!=$storerelease3 && $release!='' && $release_id1!='' && $release_id2!='' && $release_id3!='' ){       
                $insert_releases = " INSERT INTO releaselist VALUES('','$release','$release_id1'),('','$release','$release_id2'),('','$release','$release_id3')";

                if (!mysql_query($insert_releases,$con)){
                    die('Error: ' . mysql_error());
                }
                header("Location:addsamerelease.php?release_added='yes'");
            }

            else if($release!=$storerelease1 && $release!=$storerelease2 && $release!='' && $release_id1!='' && $release_id2!=''){
                $insert_releases = " INSERT INTO releaselist VALUES('','$release','$release_id1'),('','$release','$release_id2')";

                if (!mysql_query($insert_releases,$con)){
                    die('Error: ' . mysql_error());
                }
                header("Location:addsamerelease.php?release_added='yes'");
            }

            else if($release!=$storerelease1 && $release!=$storerelease3 && $release!='' && $release_id1!='' && $release_id3!=''){
                $insert_releases = " INSERT INTO releaselist VALUES('','$release','$release_id1'),('','$release','$release_id3')";

                if (!mysql_query($insert_releases,$con)){
                    die('Error: ' . mysql_error());
                }
                header("Location:addsamerelease.php?release_added='yes'");
            }

            else if($release!=$storerelease2 && $release!=$storerelease3 && $release!='' && $release_id2!='' && $release_id3!=''){
                $insert_releases = " INSERT INTO releaselist VALUES('','$release','$release_id2'),('','$release','$release_id3')";

                if (!mysql_query($insert_releases,$con)){
                    die('Error: ' . mysql_error());
                }
                header("Location:addsamerelease.php?release_added='yes'");
            }

            else if($release!=$storerelease1 && $release!='' && $release_id1!=''){
                $insert_releases = " INSERT INTO releaselist VALUES('','$release','$release_id1')";

                if (!mysql_query($insert_releases,$con)){
                    die('Error: ' . mysql_error());
                }
                header("Location:addsamerelease.php?release_added='yes'");
            }   
    mysql_close($con);
    }
}

?>

