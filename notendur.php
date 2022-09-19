<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
	<title>Myndaskúrinn</title>
	<div id="header">		
		<br>
		<h1 id="yfirskrift">Myndaskúrinn</h1>
	</div>
</head>
<body>
<div id="flokkar">

</div>
<?php 
include 'userbar.php'; 
?>
<?php include 'nav.php';  ?>
<?php include 'sql.php'; ?>
<?php include 'admin/adminvorn.php' ?>
<center>
<div id="lykilord">
<form method=post action=breyta.php>
   <?php
   $query="SELECT * FROM userinfo";
$result=mysql_query($query);
echo "<font color=".'"'."white".'"'."><b>Notandi: </b></font color>"; 
$f='<select name="notandalisti">';
while ($row = mysql_fetch_array($result)) {
   $f.='<option value= "'.$row['username'].'">'.$row['username'].'</option>';
}
$f.='</select>';
echo '<br>';
echo $f; 
?>
<br>
<font color="white"><p> Aðgerð:</p></font>
<form  method='post'>
<select name="adgerd">
<option value="breyta1" id ="1">Breyta stöðu í 'Stjórnandi'</option>
<option value="breyta2"id ="2">Breyta stöðu í 'Notandi'</option>
<option value="breyta3"id ="3">Gera Aðgang 'Óvirkan'</option>
<option value="breyta4"id ="4">Eyða Aðgang</option>
<option value="breyta5"id ="4">Búa til 'Random' Notanda</option>
</select>
<br>
<input type=submit value=Framkvæma />
</form>
<?php

$result0 = mysql_query("SELECT * from userinfo WHERE stada = '0';");


$num_rows = mysql_num_rows($result0);

if ($num_rows > 0) {
echo "<br><font color = \"red\">Óstaðfestir notendur: ";
$penis = mysql_result($result0, 0);
$STH = $dbh->query('SELECT * from userinfo WHERE stada = "0" ');
$STH->setFetchMode(PDO::FETCH_ASSOC);
while($row = $STH->fetch()) {
    echo $row['username'] . ", \n";
}
    } else {
    echo "Engir óstaðfestir notendur";
}


?>
 </div>  

