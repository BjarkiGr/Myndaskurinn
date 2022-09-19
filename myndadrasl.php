<?php
//setur uplysingar um mynd inn í gagnagrunninn
	include("mysql.php");
	//function sem seivar myndina
	function SaveMynd($url, $extension, $mynd_adgerd, $desc, $user, $access) {
		$e_url = mysql_real_escape_string($url);
		$e_ext = mysql_real_escape_string($extension);
		$e_album = mysql_real_escape_string($mynd_adgerd);
		$e_desc = mysql_real_escape_string($desc);
		$e_user = mysql_real_escape_string($user);
		$e_access = mysql_real_escape_string($access);
					
		$q = "INSERT INTO myndir (url, extension, date, album, description, user, access) VALUES ('".$e_url."', '".$e_ext."', ".time().", '".$e_album."', '".$e_desc."', '".$e_user."', ".$e_access.")";
		mysql_query($q);
	}
	
?>