<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="css/tabledesign.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
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
        echo '<div style="background:white;color:red;padding:10px;float:left;">Request Deleted!</div>';
    }	

    else if(isset($_GET['updated']))
    {
        echo '<div style="background:white;color:red;padding:10px;float:left;">Request Updated!</div>';
    }
    else if(isset($_GET['configcreated']))
    {
    	echo '<div style="background:white;color:red;padding:10px;float:left;">Config Files Created!</div>';
    }

	$username = $_SESSION['user']['username'];
	
		require("databaseconnect.php");
		
		$result = mysql_query("SELECT * from request");	

		$checktablenotempty = mysql_result(mysql_query('SELECT COUNT(*) FROM request'), 0);

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
		    	echo "PE/SPR No.";
		    echo '</div>';
		    echo '<div class="headercell">';
		    	echo "Base Code Level";
		    echo '</div>';
		    echo '<div class="headercell">';
		    	echo "Target Vendor";
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
		      	echo '<a href="viewfulldetails.php?request_id='.$row['ID'].'" style="cursor:pointer;text-decoration:none;" title="View full details">'.$row['PE_SPR'].'</a>';
		      echo '</div>';
		      echo '<div class="cell">';
		      	echo '<a href="viewfulldetails.php?request_id='.$row['ID'].'" style="cursor:pointer;text-decoration:none;" title="View full details">'.$row['BaseCodeLevel'].'</a>';
		      echo '</div>';
		      echo '<div class="cell">';
		      	echo '<a href="viewfulldetails.php?request_id='.$row['ID'].'" style="cursor:pointer;text-decoration:none;" title="View full details">'.$row['TargetVendor'].'</a>';
		      echo '</div>';
		      echo '<div class="cell">';
		      	echo '<a href="viewfulldetails.php?request_id='.$row['ID'].'" style="cursor:pointer;text-decoration:none;" title="View full details">Ongoing</a>';
		      echo '</div>';
		      
		    
		        $adminresult = mysql_query("SELECT admin from admins");
		        while($adminrow = mysql_fetch_array($adminresult)){  
		            if($username==$adminrow['admin']){
		            		$adminuser = $adminrow['admin'];
		            	echo '<div class="cell">';
	    				  echo '<select title="Manage" style="cursor:pointer;" name="gotoAction" onchange="location = this.options[this.selectedIndex].value;">
		 							<option selected="yes" disabled>---------------</option>
		 							<option value="editrequest.php?id=' . $row['ID'] . '">Edit</option>
		 							<option value="deleterequest.php?id=' . $row['ID'] . '">Delete</option>
		 							<option value="addpaths.php?id=' . $row['ID'] . '">Create Vad</option>
		 							
								</select>';
			      		echo '</div>';                                
	            	}
           		}  

               if(!isset($adminuser)){

               		if($row['Creator']==$username){

               		echo '<div class="cell">';
    				  echo '<select title="Manage" style="cursor:pointer;" name="gotoAction" onchange="location = this.options[this.selectedIndex].value;">
	 							<option selected="yes" disabled>---------------</option>
	 							<option value="editrequest.php?id=' . $row['ID'] . '">Edit</option>
	 							<option value="deleterequest.php?id=' . $row['ID'] . '">Delete</option>
							</select>';
		      		echo '</div>';  

		      		}
		      		else{
		      			echo '<div class="cell"><a style="color:black;text-decoration:none;" title="Only the Admin and '.$row['Creator'].' can manage this request.">Disabled</a></div>';
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