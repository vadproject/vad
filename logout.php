<?php

require("session_start.php");

if($_GET['logout']){
	session_destroy();
	header("Location:login.php");
}

else if(!isset($_GET['logout'])){
	header("Location:index.php");
}
?>