<?php

require("session_start.php");  
require("databaseconnect_addrequest.php");

$username = $_SESSION['user']['username'];
if(isset($_GET['request_id'])){	
		$request_id = trim(mysql_escape_string($_GET["request_id"]));

		$request_sql = "SELECT * FROM request WHERE ID = ".$request_id;
		$count = mysqli_num_rows( mysqli_query($con, $request_sql) );
		if ($count > 0 ) {
		$request_query = mysqli_query($con, $request_sql);
		$rs = mysqli_fetch_array($request_query, MYSQLI_ASSOC)


?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/viewfulldetails.css"/>
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
	<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>


	<script type="text/javascript">
	onload=function(){
	var e=document.getElementById("refreshed");
	if(e.value=="no")e.value="yes";
	else{e.value="no";location.reload();}
	}
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$( "#viewcomment" ).dialog({ 

				modal: true,
				autoOpen: false,
				resizable: false,
				draggable: true,
				closeOnEscape: false,
                height: 'auto',
                width: '300px',
                buttons: [ { text: "Close", click: function() { $( this ).dialog( "close" ); } } ]
			}).parent().find('.ui-dialog-titlebar-close').hide();
			

			$( "#view" ).click(function() {
				$( "#viewcomment" ).dialog( "open" );
			});
		});
	</script>

</head>
<body onload="document.refresh();">
<input type="hidden" id="refreshed" value="no">

<div class="container" style="width:450px;height:auto;">
	<a href="createvad.php"><img src="images/back_icon.png" title="Go Back" style="width:32px;height:32spx;"></a>
</div>

<div class="details_table" style="width:450px;height:auto;">
			<table>
				<tr> 
					<td>
						Queries
					</td>
					<td >
						Details
					</td>
					
				</tr>
				<tr>
					<td >
						Family <div style="float:right;">→</div> 
					</td>
					<td>
						<?php echo $rs['Family'];?>
					</td>
					
				</tr>
				<tr>
					<td >
						Product Name <div style="float:right;">→</div> 
					</td>
					<td>
						<?php echo $rs['ProductName'];?>
					</td>
					
				</tr>
				<tr>
					<td >
						Target <div style="float:right;">→</div> 
					</td>
					<td>
						<?php echo $rs['PanelSize'];?>
					</td>
					
				</tr>
				<tr>
					<td >
						Base Code level <div style="float:right;">→</div> 
					</td>
					<td>
						<?php echo $rs['BaseCodeLevel'];?>
					</td>
					
				</tr>
				<tr>
					<td >
						Target Vendor <div style="float:right;">→</div> 
					</td>
					<td>
						<?php echo $rs['TargetVendor'];?>
					</td>
					
				</tr>
				<tr>
					<td >
						PE/SPR No. <div style="float:right;">→</div> 
					</td>
					<td>
						<?php echo $rs['PE_SPR'];?>
					</td>
					
				</tr>
				<tr>
					<td >
						Comments <div style="float:right;">→</div> 
					</td>
					<td>
						<?php 
							if($rs['Comments']!="" && isset($rs['Comments'])){
								$wholecomment = $rs['Comments'];
								$comment  = mb_substr($rs['Comments'], 0, 15);
								echo '<div id="view" style="cursor:pointer;color:white;">'.$comment.'...</div>'; 
							
						?>
							<div id="viewcomment" title="<?php echo $rs['Creator']; ?>'s comment." style="word-wrap: break-word;"><font face="Calibri" size="4"><?php echo $wholecomment; ?></font></div>
						<?php
							}

							else{
								echo "No Comment.";
							}
						?>
						
					</td>
					
				</tr>
				<tr>
					<td >
						Creator <div style="float:right;">→</div> 
					</td>
					<td>
						<?php echo $rs['Creator'];?>
					</td>
					
				</tr>
				<tr>
					<td >
						Date Created <div style="float:right;">→</div> 
					</td>
					<td>
						<?php echo $rs['Date_Created'];?>
					</td>
					
				</tr>
				<tr>
					<td >
						Status <div style="float:right;">→</div> 
					</td>
					<td>
						<?php echo $rs['Status'];?>
					</td>
					
				</tr>

				<tr>
					<td>
						Actions <div style="float:right;">→</div>
					</td>

				<?php
				$close= @mysqli_close($mysql_db_hostname, $mysql_db_user, $mysql_db_password,$mysql_db_database);

				require("databaseconnect.php");
					$adminresult = mysql_query("SELECT admin from admins");
				        while($adminrow = mysql_fetch_array($adminresult)){  
				            if($username==$adminrow['admin']){
				            		$adminuser = $adminrow['admin'];				  
			    				  echo '<td><select title="Manage" style="cursor:pointer;" name="gotoAction" onchange="location = this.options[this.selectedIndex].value;">
				 							<option selected="yes" disabled>---------------</option>
				 							<option value="editrequest.php?id=' . $rs['ID'] . '">Edit</option>
				 							<option value="deleterequest.php?id=' . $rs['ID'] . '">Delete</option>
				 							<option value="addpaths.php?id=' . $rs['ID'] . '">Create Vad</option>
				 							
										</select></td></tr>';
					      		                             
			            	}
		           		}  

		               if(!isset($adminuser)){

		               		if($rs['Creator']==$username){	            
		    				  echo '<td><select title="Manage" style="cursor:pointer;" name="gotoAction" onchange="location = this.options[this.selectedIndex].value;">
			 							<option selected="yes" disabled>---------------</option>
			 							<option value="editrequest.php?id=' . $rs['ID'] . '">Edit</option>
			 							<option value="deleterequest.php?id=' . $rs['ID'] . '">Delete</option>
									</select></td></tr>';			      		
				      		}
				      		else{
				      			echo '<td><a style="color:black;text-decoration:none;" title="Only the Admin and '.$rs['Creator'].' can manage this request.">Disabled</a></td></tr>';
				      		}
		               
		               }

				?>
			</table>  
</div>

</body>
</html>


<?php 
		}
	}

?>
