<?php

	require("session_start.php");
	require("databaseconnect_addrequest.php");
	$product_id = trim(mysql_escape_string($_POST["product_id"]));
	 
	$target_sql = "SELECT * FROM targetlist WHERE target_id = ".$product_id ." ORDER BY target";
	$count = mysqli_num_rows( mysqli_query($con, $target_sql) );
	if ($count > 0 ) {
	$target_query = mysqli_query($con, $target_sql);
	?>
	<select required name="target" id="select_target">
		<option value="" default selected disabled="" style="color:#A9A9A9;">Select Target...</option> 
		<?php while ($rs = mysqli_fetch_array($target_query, MYSQLI_ASSOC)) { ?>
		<option value="<?php echo $rs['id']; ?>"><?php echo $rs['target']; ?></option>
		<?php } ?>
	</select>

	<?php 
		}

?>

<script src="js/jquery-1.9.0.min.js"></script>
<script>
$(document).ready(function(){
	$("select#select_target").change(function(){

		var target_id = $("select#select_target option:selected").attr('value');
	    //alert(target_id);
	    $("#basecodelevel select").html( "" );
	    
		if (target_id.length > 0 ) { 
		 $.ajax({
				type: "POST",
				url: "fetch_basecodelevel.php",
				data: "target_id="+target_id,
				cache: false,
				success: function(html) {    
					$("#basecodelevel").html( html );
				}
			});
		} else {
			$("#basecodelevel").html( "" );
		}
	});
});
</script>