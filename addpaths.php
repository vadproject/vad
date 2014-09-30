<?php

 require('session_start.php'); 

if(!isset($_GET['id']))
    {
        header("Location:createvad.php");
    }

 $id = $_GET['id'];

   require('databaseconnect.php');
	
		$result = mysql_query("SELECT * from request WHERE ID =".$id);	
		
		while($row = mysql_fetch_array($result)){			
			$productname = $row['ProductName'];
			$basecodelevel = $row['BaseCodeLevel'];
			$panelsize  = $row['PanelSize'];					
			}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Path</title>
</head>
<body>


<form action="createconfigfiles.php" method="POST">
                       
                <center>
               	<div style="margin-top:100px;">
                <table border="0" width="600px;" class="table">
                	<tr>                     
                              <h3>Paths for <?php echo $productname."-".$panelsize."-".$basecodelevel;?></h3>
                    </tr>
                    <tr>                     
                             <td><input type="hidden" name="id" value="<?php echo $id ;?>"></td>
                    </tr>                    
                    <tr>                     
                             <td style="font-size:18px;">LF Path :</td>
                        <td>
                            <input type="text" required title="LF Path required" autofocus name="lfpath" style="width:500px;height:35px;font-size:16px;" placeholder="LF Path..." \>
                        </td>
                    </tr>
                    <tr>
                             <td style="font-size:18px;">FWB Path :</td>
                        <td>
                             <input type="text" required title="FWB Path required" name="fwbpath" style="width:500px;height:35px;font-size:16px;" placeholder="FWB Path..." \>                                          
                        </td>
                    </tr>
                    <tr>
                             <td style="font-size:18px;">NF Path :</td>
                        <td>
                            <input type="text" required title="NF Path required" name="nfpath" style="width:500px;height:35px;font-size:16px;" placeholder="NF Path..." \>                                          
                        </td>
                    </tr>
                    <tr>     <td style="font-size:18px;">Alias :</td>                
                             <td>
                             	<input type="text" required title="Alias required" name="alias" style="width:500px;height:35px;font-size:16px;" placeholder="Alias..."\>
                             </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <center>
                                <input type="submit" value="Submit" name="submit" style="height:35px;font-size:16px;cursor:pointer;">
                                <a href="createvad.php"><button type="button" style="height:35px;font-size:16px;cursor:pointer;">Cancel</button></a>
                            </center>
                        </td>
                    </tr>
                </table>
                </div>

                </center>
</form>
<?php mysql_close($con);?>
</body>
</html>