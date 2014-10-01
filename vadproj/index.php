<?php

    require("session_start.php");  

    $fullname = $_SESSION['user']['displayname'];
    $username = $_SESSION['user']['username'];
    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>VAD</title>
    <link rel="shortcut icon" href="images/vad_ico.ico"/>
    <link rel="stylesheet" type="text/css" href="css/index_css.css" />
    <link rel="stylesheet" type="text/css" href="css/menu.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/subhome.css" />
    <link href='http://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>

</head>

<body>

<div id="pageContent">
    <div id="rounded">
        <div id="main" class="container">

                <div id="logout"><a href="logout.php?logout=1" title="Log-out" style="text-decoration:none;"><h3>L<img  src="images/logout_button.png" style="width:20px;height:20px" alt="Log-out User" title="Log-out"/>gout</h3></a></div>  
                <img src="images/vadlogo.png" style="margin-bottom:1px;margin-top:15px;">

            
            <h4><div id="welcome">Welcome <?php echo $fullname?>!</div></h4>
            
            <div id="wrapper">
          
                <nav role="navigation" id="access">
                  <ul id="menu">
                        <li> <a href="index.php"><b>Home</a>
                            <ul class ="sub_home">
                                <li>
                                    <a href="index.php">Create list</a>
                                </li>
                                <br>
                                <li>
                                    <a href ="resignlist.php">Resign list</a>
                                    
                                </li>
                            </ul>
                          
                            </li>
                        <li><a  target="myiframe" href="requestform.php">Request Vad</a></li>
                            <?php 
                                    require("databaseconnect.php");

                                    $adminresult = mysql_query("SELECT admin from admins");
                                    while($adminrow = mysql_fetch_array($adminresult)){  
                                        if($username==$adminrow['admin']){
                                            echo "<li><a  target='myiframe' href='resign.php'>Re-sign Vad</a></li>";  
                                            echo "<li><a  target='myiframe' href='accounts.php'>Accounts</a></li>";  
                                            echo "<li><a  target='myiframe' href='database.php'>Database</a></li>";                               
                                        }
                                    } 
                                    mysql_close();
                            ?>
                                                
                 </ul>
                </nav>
            </div>

            <div class="clear"></div>    
                
                    <iframe  id="mainframe" name="myiframe" src="createvad.php"  frameborder="0"></iframe>   
            
            <div class="clear"></div>
        </div>
    </div>
</div>

</body>
</html>
