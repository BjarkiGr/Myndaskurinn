<?php
header('Content-Type: text/html; charset=UTF-8');
$valinn=$_POST['notandalisti'];
$valkostur=$_POST['adgerd'];

include 'mysql.php';


switch ($valkostur) {

   case "breyta1" : //Breyta stöðu í Stjórnanda

mysql_query("UPDATE userinfo SET stada = '2'
WHERE username = '".$valinn."'");



header( "refresh: 2; url=notendur.php?notandi=".$valinn );
echo "<div align=".'"'."left".'"'."><b><font color=".'"'."#3DCC63".'"'.">Notandinn <b></font color> 
<a href=".'"'."profill.php".'"'."><font color=".'"'."#3DCC63".'"'.">".($valinn)."</a>".''." hefur verið skráður sem stjórnandi.</b></font color>";

   break;

   case "breyta2" :  //Breyta stöðu í notanda
  mysql_query("UPDATE userinfo SET stada = '1'
WHERE username = '".$valinn."'");



header( "refresh: 2; url=notendur.php?notandi=".$valinn );
echo "<div align=".'"'."left".'"'."><b><font color=".'"'."#3DCC63".'"'.">Notandinn <b></font color> 
<a href=".'"'."profill.php".'"'."><font color=".'"'."#3DCC63".'"'.">".($valinn)."</a>".''." hefur verið skráður sem notandi.</b></font color>";
   break;
   
     case "breyta3" :  //Gera aðgang óvirkan
  mysql_query("UPDATE userinfo SET stada = '0'
WHERE username = '".$valinn."'");

header( "refresh: 2; url=notendur.php?notandi=".$valinn );
echo "<div align=".'"'."left".'"'."><b><font color=".'"'."#3DCC63".'"'.">Aðgangurinn hjá <b></font color> 
<a href=".'"'."profill.php".'"'."><font color=".'"'."#3DCC63".'"'.">".($valinn)."</a>".''." hefur verið gerður óvirkur.</b></font color>";
   break;
   
     case "breyta4" :  //Eyða notanda
  mysql_query("DELETE FROM userinfo WHERE username = '".$valinn."'");
  header( "refresh: 2; url=notendur.php?notandi=".$valinn );
  echo "<div align=".'"'."left".'"'."><b><font color=".'"'."#3DCC63".'"'.">Notandinn <b></font color> 
<a href=".'"'."profill.php".'"'."><font color=".'"'."#3DCC63".'"'.">".($valinn)."</a>".''." hefur verið eyddur af síðunni.</b></font color>";

   break;   
    case "breyta5" : //Búa til Random Notanda
//kóði sem býr til random runu af orðum og tölum	
$lengd = 10;
$nafn_lengd = 0;
$random_nafn = "";
while($nafn_lengd < $lengd) {
$x=1;
$y=3;
$part = rand($x,$y);
if($part==2){$a=65;$b=90;}
if($part==3){$a=97;$b=122;} 
$code_part=chr(rand($a,$b));
$nafn_lengd = $nafn_lengd + 1;
$random_nafn = $random_nafn.$code_part;

$randomsha1= sha1('random');
}





		
	
mysql_query("INSERT INTO userinfo (nafn, kennitala, heimlisfang, username, email, password, stada)
VALUES ('$random_nafn', '111111-1111', 'Skikkjubaer', '$random_nafn', 'notandi@hopur2.is', '$randomsha1', 1)");


header( "refresh: 2; url=notendur.php?notandi=".$valinn );
echo "<div align=".'"'."left".'"'."><b><font color=".'"'."#3DCC63".'"'.">Búinn var til random notandi. Notandanafn: </font color> 
<a href=".'"'."profill.php".'"'."><font color=".'"'."#3DCC63".'"'.">".($random_nafn)."</a><b>".''.". Lykilorð: random</b></font color>";





   break;
   default :
   echo "hræðinleg villa kom upp...";
   break;

   }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Myndaskúrinn</title>
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
	<div id="header">		
		<br>
		<h1 id="yfirskrift">Myndaskúrinn</h1>
	</div>
</head>
<body>
<div id="flokkar">

  
       



    <?php 
	include 'userbar.php'; 
	include 'nav.php';  ?>