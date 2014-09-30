<?php
	require("session_start.php");
	require("databaseconnect_addrequest.php");
	$family_id = trim(mysql_real_escape_string($_POST["family_id"]));

	$product_sql = "SELECT * FROM productlist WHERE product_id = ".$family_id ." ORDER BY product";
	$count = mysqli_num_rows( mysqli_query($con, $product_sql) );
	if ($count > 0 ) {
	$product_query = mysqli_query($con, $product_sql);
	?>

	<select required name="product" id="select_product">
		<option value="" default selected disabled="" style="color:#A9A9A9;">Select Product...</option> 
		<?php while ($rs = mysqli_fetch_array($product_query, MYSQLI_ASSOC)) { ?>
		<option value="<?php echo $rs['id']; ?>"><?php echo $rs['product']; ?></option>
		<?php } ?>
	</select>

	<?php 
		}

?>

<script src="js/jquery-1.9.0.min.js"></script>
<script>
$(document).ready(function(){
	$("select#select_product").change(function(){

		var product_id = $("select#select_product option:selected").attr('value');
	    //alert(product_id);
	    $("#target select").html( "" );
	    $("#basecodelevel select").html( "" );
	    
		if (product_id.length > 0 ) { 
		 $.ajax({
				type: "POST",
				url: "fetch_target.php",
				data: "product_id="+product_id,
				cache: false,
				success: function(html) {    
					$("#target").html( html );
				}
			});
		} else {
			$("#target").html( "" );
		}
	});
});
</script>