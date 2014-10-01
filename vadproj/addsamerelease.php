
<html>
<head>
<title>
    Add Release in multiple targets
</title>
</head>

<body>
<?php

    require("session_start.php");

    if(isset($_GET['notarget'])){
        echo "<script>alert('Please select at least 1 target!');</script>";
    }
    if(isset($_GET['release_added'])){
        echo "<script>alert('Release Added!');</script>";
    }


?>

<?php require("databaseconnect_addrequest.php"); ?>
<form action="saverelease.php" method="POST">
                       
                <center>
                <table border="0" width="400px;" class="table" style="margin-top:100px;">
                        <?php
                        $sql1 = "SELECT * FROM targetlist ORDER BY target_id";
                        $query1 = mysqli_query($con, $sql1);

                        $sql2 = "SELECT * FROM targetlist ORDER BY target_id";
                        $query2 = mysqli_query($con, $sql2);

                        $sql3 = "SELECT * FROM targetlist ORDER BY target_id";
                        $query3 = mysqli_query($con, $sql3);
                        
                        ?>                     
                    <tr>
                             
                             <td style="font-size:18px;">Target 1:</td>
                        <td>
                            <select required name="target1" id="target1" style="width:170px;height:35px;font-size:18px;">
                            <option value="" default selected disabled="" style="color:#A9A9A9;">Target...</option>                  
                            <?php while ($rs = mysqli_fetch_array($query1, MYSQLI_ASSOC )) { ?>
                            <option value="<?php echo $rs['id']; ?>"><?php echo $rs['target']; ?></option>

                            <?php } ?>
                            </select>                                                 
                        </td>
                    </tr>
                    <tr>
                             <td style="font-size:18px;">Target 2 (optional) :</td>
                        <td>
                            <select required name="target2" id="target2" style="width:170px;height:35px;font-size:18px;">
                            <option value="" default selected disabled="" title="Optional" style="color:#A9A9A9;">Other target...</option>                  
                            <?php while ($rs = mysqli_fetch_array($query2, MYSQLI_ASSOC )) { ?>
                            <option value="<?php echo $rs['id']; ?>"><?php echo $rs['target']; ?></option>

                            <?php } ?>
                            </select>                                                 
                        </td>
                    </tr>
                    <tr>
                             <td style="font-size:18px;">Target 3 (optional) :</td>
                        <td>
                            
                            <select required name="target3" id="target3" style="width:170px;height:35px;font-size:18px;">
                            <option value="" default selected disabled="" title="Optional"style="color:#A9A9A9;">Other target...</option>                  
                            <?php while ($rs = mysqli_fetch_array($query3, MYSQLI_ASSOC )) { ?>
                            <option value="<?php echo $rs['id']; ?>"><?php echo $rs['target']; ?></option>

                            <?php } ?>
                            </select>                                                 
                        </td>
                    </tr>
                    <tr>
                             <td style="font-size:18px;">Release :</td>
                        <td>
                             <input type="text" name="release" style="width:170px;height:35px;font-size:18px;" placeholder="Release..." required="required"/>                                               
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <center><input type="submit" value="Add Release" name="submit" style="height:35px;font-size:16px;cursor:pointer;"></center>
                        </td>
                    </tr>
                </table></center>
</form>
<?php $closecon= @mysqli_close($con); ?>
</body>
</body>
</html>