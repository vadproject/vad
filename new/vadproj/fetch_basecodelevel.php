<?php
	require("session_start.php");
	require("databaseconnect_addrequest.php");
	$target_id = trim(mysql_escape_string($_POST["target_id"]));
	 
	$release_sql = "SELECT * FROM releaselist WHERE release_id = " .$target_id;
	$count = mysqli_num_rows( mysqli_query($con, $release_sql));

	if ($count > 0 ) {
	$release_query = mysqli_query($con, $release_sql);
	?>

	<select required name="basecodelevel" id="select_basecodelevel">
		<option value="" default selected disabled="" style="color:#A9A9A9;">Select Release...</option> 
		<?php while ($rs = mysqli_fetch_array($release_query, MYSQLI_ASSOC)) { ?>
		<option value="<?php echo $rs['id']; ?>"><?php echo $rs['release']; ?></option>
		<?php } ?>
	</select>

	<?php 
		}
?>