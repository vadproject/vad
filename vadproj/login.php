<?php

session_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" lang="en">
<title>VAD Log-In </title>
<head>
	<meta charset="UTF-8">
    <link rel="shortcut icon" href="images/vad_ico.ico"/>
	<link rel="stylesheet" type="text/css" href="css/loginpage.css">
</head>

<body>

	<section class="login">
	<div class="titulo">Emulator's Developer Login</div>
	<form action="LoginController.php" method="post" enctype="application/x-www-form-urlencoded">
    	<center>
    	<input type="text" required title="Username required" placeholder="Username" data-icon="U" name="shortname" autofocus="autofocus" />
        <input type="password" required title="Password required" placeholder="Password" data-icon="x" name="pass"/>
        </center>
        <input type="submit" name="login" class="enviar" value="Log In">
    </form>
</section>


</body>
</html>

<?php

if(isset($_GET['login_failed']))
    {
        
        echo '<script>alert("Wrong Username or Password! Try again.");</script>';
        
    }   


?>