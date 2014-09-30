<?php

	require('session_start.php');

    if(!isset($_SESSION['user']['username']))
    {
        header("Location:login.php");
    }

    else if(!isset($_POST['submit']))
    {
        header("Location:index.php");
    }

    $id = $_POST['id'];

   require('databaseconnect.php');

   		$lfpath = trim(mysql_escape_string($_POST['lfpath']));
   		$fwbpath = trim(mysql_escape_string($_POST['fwbpath']));
   		$nfpath = trim(mysql_escape_string($_POST['nfpath']));
   		$alias = trim(mysql_escape_string(ucfirst(strtolower($_POST['alias']))));
	
		$result = mysql_query("SELECT * from request WHERE ID =".$id);	
		
		while($row = mysql_fetch_array($result)){

			$family = $row['Family'];
			$productname = $row['ProductName'];
			$basecodelevel = $row['BaseCodeLevel'];
			$panelsize  = $row['PanelSize'];
			$targetvendor = $row['TargetVendor'];
						
			}
			

			    if (!file_exists('C:\xampp\htdocs\vadproject\vad\config')){
			    mkdir('C:\xampp\htdocs\vadproject\vad\config', 0777, true);
				}

				chdir('C:\xampp\htdocs\vadproject\vad\config');

				if (!file_exists($productname)){
			    mkdir($productname, 0777, true);
			    chdir('C:\xampp\htdocs\vadproject\vad\config\\'.$productname);
				}

				if($family=="WinnersCircle"){
					$vad_config = 'vad.config';
				}
				else{
					$vad_config = strtolower($productname).'.config';
				}
				
				$handle1 = fopen($vad_config, 'w') or die('Cannot open file:  '.$vad_config);
				$data1 = '# On the first 3 lines the first field is the .cfg path, the second is the
# release directory which the .cfg has paths to, the third is the resulting
# tarfile name, and the optional forth field specifies a pattern to substitute
# in the install path. (So the first line specifies that the install path be
# /m/lf/shaft/next/builds/release/Jefferson/LS.TA.P109)

/users/kjorbina/vad/config/'.$productname.'/'.$productname.'.VAD.cfg         '.$lfpath.'               lf.VAD.tar  /'.$productname.'/'.$alias.'/
/users/kjorbina/vad/config/'.$productname.'/'.$productname.'_Kernel.VAD.cfg  '.$fwbpath.'      fwb.VAD.tar
/users/kjorbina/vad/config/'.$productname.'/'.$productname.'_Netapps.VAD.cfg '.$nfpath.'              nf.VAD.tar
#/bonus/scratch/kjorbina/config/'.$family.'/btools_PS.VAD.bt      *                                                         btools.VAD.tar

TOP_DIR '.$basecodelevel.'
COMPRESSED_FILE '.$basecodelevel.'.VAD.tar.gz
';
				fwrite($handle1, $data1);
				fclose($handle1);


				$handle2 = fopen($productname.'_Netapps.VAD.cfg', 'w') or die('Cannot open file:  '.$productname.'_Netapps.VAD.cfg');
				if($family=="Homestretch"){
				$data2 = '##################################################################################
# Configuration information for AF/ppc VAD releases
##################################################################################

ppc/inclpub/nw
ppc/inclpub/net_enums.gh
ppc/netapps/TN3270/TN3270

#lnx_ws/inclpub/nw
#lnx_ws/inclpub/net_enums.gh

';
}

				else if($family=="WinnersCircle"){
				$data2 = '##################################################################################
#
# URL:     $URL$
#
# Version: $Id$
#
# Description: Configuration information for Sting VAD releases
#
##################################################################################
#
# Source Files
#
##################################################################################
# Name of File/directory                        recurse flag
##################################################################################
armgn/inclpub/nw
armgn/inclpub/net_enums.gh
armgn/netapps/TN3270/TN3270

';
}
				else if($family=="Pride"){
				$data2 = '##################################################################################
#
# URL:     $URL$
#
# Version: $Id$
#
# Description: Configuration information for Sting VAD releases
#
##################################################################################
#
# Source Files
#
##################################################################################
# Name of File/directory                        recurse flag
##################################################################################
arm/inclpub/nw
arm/inclpub/net_enums.gh
arm/netapps/TN3270/TN3270

';	
}

				fwrite($handle2, $data2);
				fclose($handle2);

				mysql_close($con);

				header("Location:createvad.php?configcreated=1");
				
?>
