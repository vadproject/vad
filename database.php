<!DOCTYPE html>
<html>
<head>
	
	
	<link rel="stylesheet" type="text/css" href="css/database_popup.css" />
	<link href='http://fonts.googleapis.com/css?family=Varela+Round|Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
	<script>
			$(document).ready(function() {
				
				//family function
				$("#printerfamily_add").click(function( event ){
					event.preventDefault();
			    	$(".family").fadeToggle("fast");
			  	});
				
				$(".familyLink").click(function(event){
					event.preventDefault();
					var action = $(this).attr('data-action');
					
					$.get( "ajax/" + action, function( data ) {
						$( ".addfamily-content" ).html( data );
					});	
					
					$(".family").fadeToggle("fast");
				});
				
				$(".close_family").click(function(){
					$(".family").fadeToggle("fast");
				});
				
				$(document).keyup(function(e) {
					if(e.keyCode == 27 && $(".family").css("display") != "none" ) { 
						event.preventDefault();
						$(".family").fadeToggle("fast");
					}
				});
			});
	</script>
	<script type="text/javascript">
				$(document).ready(function() {
				//product function

				$("#product_add").click(function( event ){
					event.preventDefault();
			    	$(".product").fadeToggle("fast");
			  	});
				
				$(".productLink").click(function(event){
					event.preventDefault();
					var action = $(this).attr('data-action');
					
					$.get( "ajax/" + action, function( data ) {
						$( ".addproduct-content" ).html( data );
					});	
					
					$(".product").fadeToggle("fast");
				});
				
				$(".close_product").click(function(){
					$(".product").fadeToggle("fast");
				});
				
				$(document).keyup(function(e) {
					if(e.keyCode == 27 && $(".product").css("display") != "none" ) { 
						event.preventDefault();
						$(".product").fadeToggle("fast");
					}
				});
		});
	</script>
	
	<script type="text/javascript">
				$(document).ready(function() {
				//target function

				$("#target_add").click(function( event ){
					event.preventDefault();
			    	$(".target").fadeToggle("fast");
			  	});
				
				$(".targetLink").click(function(event){
					event.preventDefault();
					var action = $(this).attr('data-action');
					
					$.get( "ajax/" + action, function( data ) {
						$( ".addtarget-content" ).html( data );
					});	
					
					$(".target").fadeToggle("fast");
				});
				
				$(".close_target").click(function(){
					$(".target").fadeToggle("fast");
				});
				
				$(document).keyup(function(e) {
					if(e.keyCode == 27 && $(".target").css("display") != "none" ) { 
						event.preventDefault();
						$(".target").fadeToggle("fast");
					}
				});
		});
	</script>

	<script type="text/javascript">
				$(document).ready(function() {
				//Release function

				$("#bcl_add").click(function( event ){
					event.preventDefault();
			    	$(".bcl").fadeToggle("fast");
			  	});
				
				$(".productLink").click(function(event){
					event.preventDefault();
					var action = $(this).attr('data-action');
					
					$.get( "ajax/" + action, function( data ) {
						$( ".addbcl-content" ).html( data );
					});	
					
					$(".bcl").fadeToggle("fast");
				});
				
				$(".close_bcl").click(function(){
					$(".bcl").fadeToggle("fast");
				});
				
				$(document).keyup(function(e) {
					if(e.keyCode == 27 && $(".bcl").css("display") != "none" ) { 
						event.preventDefault();
						$(".bcl").fadeToggle("fast");
					}
				});
		});
	</script>


<head>
<body>

<?php
	session_start();

    if(!isset($_SESSION['user']['username']))
    {
        header("Location:login.php");
    }

    else if(isset($_GET['release_added']))
    {
        echo '<script>alert("Release Added!");</script>';
    }	

    else if(isset($_GET['release_notadded']))
    {
        echo '<script>alert("Incomplete Details! Try again.");</script>';
    }

	else if(isset($_GET['release_exist']))
	{
	  	echo '<script>alert("Release already exists!");</script>';
	}	
	
	else if(isset($_GET['family_notadded']))
	{
	  	echo '<script>alert("Release not added! Try Again!");</script>';

	}	

	else if(isset($_GET['family_exist']))
	{
	  	echo '<script>alert("Family already exist!");</script>';

	}	

	else if(isset($_GET['family_added']))
	{
	  	echo '<script>alert("Family added!");</script>';

	}	
	else if(isset($_GET['product_added']))
	{
	  	echo '<script>alert("Product added!");</script>';

	}	
	else if(isset($_GET['target_added']))
	{
	  	echo '<script>alert("Target added!");</script>';

	}		
	else if(isset($_GET['product_exist']))
	{
	  	echo '<script>alert("Product already exist!");</script>';

	}	
	else if(isset($_GET['target_exist']))
	{
	  	echo '<script>alert("Target already exist!");</script>';

	}	
    
    
?>

<div class="options" >
	<div class="button" title="Add Printer Family" id="printerfamily_add"><a>Add Printer Family</a></div>
	<div class="button" title="Add Product" id="product_add"><a>Add Product</a></div>
	<div class="button" title="Add Target" id="target_add"><a>Add Target</a></div>
	<div class="button" title="Add Release" id="bcl_add"><a>Add Release</a></div>
	<a href="addsamerelease.php" title="Add Multiple Release" target="myiframe" style="text-decoration:none;color:white;"><div class="button" id="bcl_add_multiple">Add Release to multiple Targets</div></a>
</div>

<div class="family" style="display: none;">
	<div class="add_family">
		<div class="addfamily-content">
			<a class="close_family">x</a>
			<h3>Add Printer Family</h3>
			<form method="post" action="addprinterfamily.php">
				<label for="family">
					Printer Family:
					<input type="text" name="printerfamily" id="printerfamily" placeholder="Printer Family Name..." required="required" autofocus="autofocus" />
				</label>		
				<button type="submit" name="submit">Add Family</button>
			</form>
		</div>
	</div>
</div>

<?php 
	$con = mysql_connect("localhost","root","");

	if (!$con){
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("vad", $con);

	$familyresult = mysql_query("SELECT * from printer_family");
	$targetresult = mysql_query("SELECT * from targetlist ORDER BY target");
	$productresult = mysql_query("SELECT * from productlist ORDER BY product");

?>

<div class="product" style="display: none;">
	<div class="add_product">
		<div class="addproduct-content">
			<a class="close_product">x</a>
			<h3>Add Product</h3>
			<form method="post" action="addproduct.php">
				<label for="family">
				    Family:
					<select required name="family">
                            <option value="" default selected disabled="" style="color:#A9A9A9;">Select Family...</option>                  
                            <?php while ($query_family = mysql_fetch_array($familyresult, MYSQL_ASSOC )) { ?>
                            <option value="<?php echo $query_family['id']; ?>"><?php echo $query_family['family']; ?></option>

                            <?php } ?>
                    </select>                                                 
				</label>	
				<label for="product">
				    Product:
				    <input required type="text" name="product" id="productname" placeholder="Product Name..." required="required" autofocus="autofocus" />
					           	                                   
				</label>		
				<button type="submit" name="submit">Add Product</button>
			</form>
		</div>
	</div>
</div>

<div class="target" style="display: none;">
	<div class="add_target">
		<div class="addtarget-content">
			<a class="close_target">x</a>
			<h3>Add Target</h3>
			<form method="post" action="addtarget.php">
				<label for="Product">
				    Product:
					<select required name="product">
                            <option value="" default selected disabled="" style="color:#A9A9A9;">Select Product...</option>                  
                            <?php while ($query_product = mysql_fetch_array($productresult, MYSQL_ASSOC )) { ?>
                            <option value="<?php echo $query_product['id']; ?>"><?php echo $query_product['product']; ?></option>

                            <?php } ?>
                    </select>                                                 
				</label>	
				<label for="target">
				    Target:
				    <input required type="text" name="target" id="targetname" placeholder="Target Name..." required="required" autofocus="autofocus" />
					           	                                   
				</label>		
				<button type="submit" name="submit">Add Target</button>
			</form>
		</div>
	</div>
</div>

<div class="bcl" style="display: none;">
	<div class="add_bcl">
		<div class="addbcl-content">
			<a class="close_bcl">x</a>
			<h3>Add Release</h3>
			<form method="post" action="addbasecodelevel.php">
				<label for="target">
				    Target:
					<select required name="target" >
                            <option value="" default selected disabled="" style="color:#A9A9A9;">Select Target...</option>                  
                            <?php while ($query_target = mysql_fetch_array($targetresult, MYSQL_ASSOC )) { ?>
                            <option value="<?php echo $query_target['id']; ?>"><?php echo $query_target['target']; ?></option>
                            <?php } ?>
                    </select>                                                 
				</label>	
				<label for="release">
				    Release:
				    <input type="text" name="release"  placeholder="Release..." required="required" autofocus="autofocus" />
					           	                                   
				</label>
				<!--
				<label for="lf_path">
				    LF Path:
				    <input type="text" name="lf_path"  placeholder="LF Path..." required="required" autofocus="autofocus" />
					           	                                   
				</label>
				<label for="fwb_path">
				    FWB Path:
				    <input type="text" name="fwb_path"  placeholder="FWB Path..." required="required" autofocus="autofocus" />
					           	                                   
				</label>
				<label for="nf-path">
				    NF_Path:
				    <input type="text" name="path"  placeholder="NF_Path:..." required="required" autofocus="autofocus" />
					           	                                   
				</label>
				-->
				<button type="submit" name="submit">Add Base Code Level</button>
			</form>
		</div>
	</div>
</div>
<?php mysql_close(); ?>


</body>
</html>