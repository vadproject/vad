<?php
	
	session_start();

    if(!isset($_SESSION['user']['username']))
    {
        header("Location:login.php");
    }


?>