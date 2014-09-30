<!DOCTYPE html>
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

		if(!isset($_POST['family']) || !isset($_POST['product']) || !isset($_POST['target']) || !isset($_POST['basecodelevel']) ||
						!isset($_POST['target_vendor']) || !isset($_POST['pe_spr_number'])){
							
			header("Location:requestform.php?request_notadded='yes'");				
		}			

		else{
		
		$target_vendor = $_POST['target_vendor'];
		$pe_spr_number = trim(mysql_real_escape_string($_POST['pe_spr_number']));
		$comments = trim(mysql_real_escape_string($_POST['comments']));
		$creator = $username;
		date_default_timezone_set('Asia/Manila');
		$datetime= date("Y-m-d H:i:s");
		
		require("databaseconnect.php");

		$family_value = mysql_query("SELECT * FROM printer_family WHERE id=".$_POST['family']);
		$printername_value = mysql_query("SELECT * FROM productlist WHERE id=".$_POST['product']);
		$paneltype_value = mysql_query("SELECT * FROM targetlist WHERE id=".$_POST['target']);
		$basecodelevel_value = mysql_query("SELECT * FROM releaselist WHERE id=".$_POST['basecodelevel']);

		 while($familyrow = mysql_fetch_array($family_value)){  
		 	$family = $familyrow['family'];
		 }
		 while($printerrow = mysql_fetch_array($printername_value)){  
		 	$printername = $printerrow['product'];
		 }
		 while($targetrow = mysql_fetch_array($paneltype_value)){  
		 	$paneltype = $targetrow['target'];
		 }
		 while($basecoderow = mysql_fetch_array($basecodelevel_value)){  
		 	$basecodelevel = $basecoderow['release'];
		 }

		$sql = " INSERT INTO request (ID,Family,ProductName,PanelSize,BaseCodeLevel,TargetVendor,PE_SPR,Comments,Creator,Date_Created,Status) VALUES('','$family','$printername','$paneltype','$basecodelevel','$target_vendor','$pe_spr_number','$comments','$creator','$datetime','Ongoing')";

		if (!mysql_query($sql,$con)){
			die('Error: ' . mysql_error());
		}
		
		header("Location:requestform.php?created='yes'");
		mysql_close($con);
		}
	}
?>