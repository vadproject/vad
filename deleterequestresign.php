<?php

	require("session_start.php");

    if(!isset($_GET['id']))
    {
        header("Location:index.php");
    }

    $id = $_GET['id'];

	require("databaseconnect.php");

	$sql="DELETE FROM resignlist WHERE ID = '$id'";

	if (!mysql_query($sql,$con)){
		die('Error: ' . mysql_error());
	}

	else{

	header("Location:requestresign.php?deleted='yes'");
		
	mysql_close($con);
	}
    
?>

