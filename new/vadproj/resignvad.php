<html>
<head>
<title>
	Request Added!
</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
</html>

<?php

	require("session_start.php");

    $username = $_SESSION['user']['username'];

	if(isset($_POST['submit']))
	{

		if(!isset($_POST['family']) || !isset($_POST['product']) || !isset($_POST['target']) ||
						!isset($_POST['target_vendor'])){
							
			header("Location:resign.php?request_notadded='yes'");				
		}			

		else{
		
		$target_vendor = $_POST['target_vendor'];
		$creator = $username;
		date_default_timezone_set('Asia/Manila');
		$datetime= date("Y-m-d H:i:s");
		
		require("databaseconnect.php");

		$family_value = mysql_query("SELECT * FROM printer_family WHERE id=".$_POST['family']);
		$printername_value = mysql_query("SELECT * FROM productlist WHERE id=".$_POST['product']);
		$paneltype_value = mysql_query("SELECT * FROM targetlist WHERE id=".$_POST['target']);

		 while($familyrow = mysql_fetch_array($family_value)){  
		 	$family = $familyrow['family'];
		 }
		 while($printerrow = mysql_fetch_array($printername_value)){  
		 	$printername = $printerrow['product'];
		 }
		 while($targetrow = mysql_fetch_array($paneltype_value)){  
		 	$paneltype = $targetrow['target'];
		 }

		$sql = " INSERT INTO resignlist (ID,Family,ProductName,PanelSize,TargetVendor,Creator,Date_Created,Status) VALUES('','$family','$printername','$paneltype','$target_vendor','$creator','$datetime','Ongoing')";

		if (!mysql_query($sql,$con)){
			die('Error: ' . mysql_error());
		}
		
		header("Location:resign.php?created='yes'");
		header("Location:resign.php?created='yes'");
		mysql_close($con);
		}
	}
?>