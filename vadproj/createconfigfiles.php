<?php

	session_start();

    if(!isset($_SESSION['user']['username']))
    {
        header("Location:login.php");
    }

    else if(!isset($_GET['id']))
    {
        header("Location:index.php");
    }

    $id = $_GET['id'];

    $con = mysql_connect("localhost","root","");

	if (!$con){
		die('Could not connect: ' . mysql_error());
	}

	mysql_select_db("vad", $con);
	
		$result = mysql_query("SELECT from request WHERE ID is ".$id);	
		
		while($row = mysql_fetch_array($result)){

			$family = $row['Family'];
			$productname = $row['ProductName'];
			$basecodelevel = $row['BaseCodeLevel'];
			$panelsize  = $row['PanelSize'];
			$targetvendor = $row['TargetVendor'];
			
			echo $family;
			}
			    if (!file_exists('C:\xampp\htdocs\vadproject\vad\config')) {
			    mkdir('C:\xampp\htdocs\vadproject\vad\config', 0777, true);
				}

				 if (!file_exists('C:\xampp\htdocs\vadproject\vad\config\NewYork')) {
			    mkdir('C:\xampp\htdocs\vadproject\vad\config\NewYork', 0777, true);
				}

				$vad_config = 'C:\xampp\htdocs\vadproject\vad\config\NewYork\vad.config';
				$handle = fopen($vad_config, 'w') or die('Cannot open file:  '.$vad_config);
				$data = "# On the first 3 lines the first field is the .cfg path, the second is the
# release directory which the .cfg has paths to, the third is the resulting
# tarfile name, and the optional forth field specifies a pattern to substitute
# in the install path. (So the first line specifies that the install path be
# /m/lf/shaft/next/builds/release/Jefferson/LS.TA.P109)

/users/kjorbina/vad/config/NewYork/NewYork.VAD.cfg         /m/lf/hs/next/builds/release/NewYork/LHS40.NY.P413               lf.VAD.tar  /NewYork/Naga/
/users/kjorbina/vad/config/NewYork/NewYork_Kernel.VAD.cfg  /fwb/hs/next/releases/KernelHS/FHN.HS40.F413/release/latest      fwb.VAD.tar
/users/kjorbina/vad/config/NewYork/NewYork_Netapps.VAD.cfg /m/nf/hs/next/builds/release/NetAppsHS/NH.HS40.N413              nf.VAD.tar
#/users/jgilbert/vad/config/Homestretch/btools_PS.VAD.bt      *                                                             btools.VAD.tar

TOP_DIR LHS40.NY.P413
COMPRESSED_FILE LHS40.NY.P413.VAD.tar.gz
";
				fwrite($handle, $data);
				fclose($handle);


?>
