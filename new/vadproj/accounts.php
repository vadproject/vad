<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="css/tabledesign_accounts.css" />
	<link rel="stylesheet" type="text/css" href="css/adduser_popup.css" />
	<link href='http://fonts.googleapis.com/css?family=Varela+Round|Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
	<script>
			$(document).ready(function() {
			$("#admin_add").click(function( event ){
				event.preventDefault();
		    	$(".overlay").fadeToggle("fast");
		  	});
			
			$(".overlayLink").click(function(event){
				event.preventDefault();
				var action = $(this).attr('data-action');
				
				$.get( "ajax/" + action, function( data ) {
					$( ".login-content" ).html( data );
				});	
				
				$(".overlay").fadeToggle("fast");
			});
			
			$(".close").click(function(){
				$(".overlay").fadeToggle("fast");
			});
			
			$(document).keyup(function(e) {
				if(e.keyCode == 27 && $(".overlay").css("display") != "none" ) { 
					event.preventDefault();
					$(".overlay").fadeToggle("fast");
				}
			});
		});
	</script>

<head>
<body>

<?php
	require("session_start.php");

    if(isset($_GET['deleted']))
    {
        echo '<script>alert("Account Deleted!");</script>';
    }	

    else if(isset($_GET['adminadded']))
    {
        echo '<script>alert("User added as Administrator!");</script>';
    }

	else if(isset($_GET['notadded']))
	{
	  	echo '<script>alert("User already exists as Administrator!");</script>';
	}	
	else if(isset($_GET['invaliduser']))
	{
	  	echo '<script>alert("Invalid Username!");</script>';

	}		
     
	$username = $_SESSION['user']['username'];
	
	require("databaseconnect.php");
	
	$result = mysql_query("SELECT * from admins ORDER BY admin");

	$checktableifnotempty = mysql_result(mysql_query('SELECT COUNT(*) FROM admins'), 0);
		
	if (!$checktableifnotempty) { 
		echo '<center><b><div  style="margin-top:100px;">';		
	    		echo "No Admin Account so far.";  
		echo '</div></b></center>';
	} 

	else{


echo '<div id="autorefresh" class="wrapper">';
	echo '<h2><center>Admin Users</center></h2><br>';
    echo '<div class="table">';
  	    echo '<div class="row header blue">';
		    echo '<div class="headercell">';
		    	echo "Administrators";
		    echo '</div>';
		    echo '<div class="headercell">';
		    	echo "Option";
		    echo '</div>';
    	echo '</div>';	

    while($adminrow = mysql_fetch_array($result)){

		
		  echo '<div class="row">';
		      echo '<div class="cell">';
		      	echo $adminrow['admin'];
		      echo'</div>';
		      echo '<div class="deletecell">';
    			echo '<a href="deleteaccount.php?id=' . $adminrow['ID'] .'" ><img src="images/delete_account.png"></a>';     
		      echo '</div>';
	   	  echo '</div>';		
		
	}
	
	echo '</div>';
echo '</div>';
	}
	mysql_close($con);
?>
	<a href="login.php" id="admin_add"><center><img src="images/add_admin.png"></center></a>
<div class="overlay" style="display: none;">
	<div class="add_admin">
		<div class="admin-content">
			<a class="close">x</a>
			<h3>Add Administrator</h3>
			<form method="post" action="addadmin.php">
				<label for="username">
					Username:
					<input type="text" name="addusername" id="username" placeholder="Username" required="required" autofocus="autofocus" />
				</label>		
				<button type="submit">Add User</button>
			</form>
		</div>
	</div>
</div>

</body>
</html>