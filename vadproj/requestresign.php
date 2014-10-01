<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="css/tabledesign.css" />
	<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript">
	onload=function(){
	var e=document.getElementById("refreshed");
	if(e.value=="no")e.value="yes";
	else{e.value="no";location.reload();}
	}
	</script>
	

<head>
<body onload="document.refresh();">
<input type="hidden" id="refreshed" value="no">


<?php
	require("session_start.php");  
	
    if(isset($_GET['deleted']))
    {
        echo '<script>alert("Request Deleted!");</script>';
    }	

    else if(isset($_GET['updated']))
    {
        echo '<script>alert("Request Updated!");</script>';
    }

	$username = $_SESSION['user']['username'];
	
		require("databaseconnect.php");
		
		$result = mysql_query("SELECT * from resignlist");	

		$checktablenotempty = mysql_result(mysql_query('SELECT COUNT(*) FROM resignlist'), 0);

	if (!$checktablenotempty) { 
		echo '<center><b><div  style="margin-top:100px;">';		
	    		echo "No Created Request so far.";  
		echo '</div></b></center>';
	} 

	else{


echo '<div id="autorefresh" class="wrapper">';
    echo '<h2><center>Requests List</center></h2>';
    echo '<div class="table">';
  	    echo '<div class="row header green">';
		    echo '<div class="headercell">';
		    	echo "Family";
		    echo '</div>';
		    echo '<div class="headercell">';
		    	echo "Product Name";
		    echo '</div>';
		    echo '<div class="headercell">';
		    	echo "Target Size";
		    echo '</div>';
		    echo '<div class="headercell">';
		    	echo "Target Vendor";
		    echo '</div>';
		    echo '<div class="headercell">';
		    	echo "Creator";
		    echo '</div>';
		    echo '<div class="headercell">';
		    	echo "Date Created";
		    echo '</div>';  
		    echo '<div class="headercell">';
		    	echo "Status";
		    echo '</div>';  
			echo '<div class="headercell">';
		    	echo "Actions";
		    echo '</div>';                                                                     
    	echo '</div>';	

    while($row = mysql_fetch_array($result)){

		
		  echo '<div class="row">';
		      echo '<div class="cell">';
		      	echo $row['Family'];
		      echo'</div>';
		      echo'<div class="cell">';
		      	echo $row['ProductName'];
		      echo '</div>';
		      echo '<div class="cell">';
		      	echo $row['PanelSize'];
		      echo '</div>';
		      echo '<div class="cell">';
		      	echo $row['TargetVendor'];
		      echo '</div>';
		      echo '<div class="cell">';
		      	echo $row['Creator'];
		      echo '</div>';
		      echo '<div class="cell">';
		      	echo $row['Date_Created'];
		      echo '</div>';
		      echo '<div class="cell">';
		      	echo $row['Status'];
		      echo '</div>';

		        $adminresult = mysql_query("SELECT admin from admins");
		        while($adminrow = mysql_fetch_array($adminresult)){  
		            if($username==$adminrow['admin']){
		            		$adminuser = $adminrow['admin'];
		            	echo '<div class="cell">';
	    				  echo '<select style="cursor:pointer;" name="gotoAction" onchange="location = this.options[this.selectedIndex].value;">
		 							<option selected="yes" disabled>---------------</option>
		 							<option value="editrequest.php?id=' . $row['ID'] . '">Edit</option>
		 							<option value="deleterequest.php?id=' . $row['ID'] . '">Delete</option>
		 							<option value="createconfigfiles.php?id=' . $row['ID'] . '">Create/Test Vad</option>
		 							
								</select>';
			      		echo '</div>';                                
	            	}
           		}  

               if(!isset($adminuser)){

               		if($row['Creator']==$username){

               		echo '<div class="cell">';
    				  echo '<select style="cursor:pointer;" name="gotoAction" onchange="location = this.options[this.selectedIndex].value;">
	 							<option selected="yes" disabled>---------------</option>
	 							<option value="editrequest.php?id=' . $row['ID'] . '">Edit</option>
	 							<option value="deleterequest.php?id=' . $row['ID'] . '">Delete</option>
							</select>';
		      		echo '</div>';  

		      		}
		      		else{
		      			echo '<div class="cell"></div>';
		      		}
               
               }

	   	  echo '</div>';		
		
	}
	
	echo '</div>';
echo '</div>';
	}
	mysql_close($con);

?>

</body>
</html>