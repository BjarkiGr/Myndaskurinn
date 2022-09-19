<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();
include 'userinfo.php';
if(!isset($_SESSION['user_id'])){
echo "Þú ert ekki innskráður!!";
	die;
}
?>
<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
<head><title>Prófílsíða</title></head>
<body>
</style>
<center>
<br>
<h1 id="profile"><?php echo $notandi_fullt_nafn;?> - Prófílsíða</h1>
<div id="profileRammi">
	<table id="profileTable">
		<tbody>
		<br>
			<tr><td id="profileTD">Notendanafn: </td><td id="profileTD2"><?php echo $notandi_notandanafn; ?></td></tr>
			<tr><td id="profileTD">Netfang: </td><td id="profileTD2"><?php echo $notandi_email; ?></td></tr>
			<tr><td id="profileTD">Fullt Nafn: </td><td id="profileTD2"><?php echo $notandi_fullt_nafn; ?></td></tr>
			<tr><td id="profileTD">Kennitala: </td><td id="profileTD2"><?php echo $notandi_kennitala; ?></td></tr>
			<tr><td id="profileTD">Heimilisfang: </td><td id="profileTD2"><?php echo $notandi_heimlisfang; ?></td></tr>
			<tr><td id="profileTD">Staða: </td><td id="profileTD2"><?php echo $notandi_stada_name ?></td></tr>
		</tbody>
	</table>
</div>
</html>
<?php include 'nav.php';  ?>
