<?php
//Athuga hvort innskr��ur notandi s� Vefstj�ri.

$admin = "admin/current"; //skr�in sem inniheldur nafn Vefstj�ra
$file = fopen($admin, 'r') or die("Skra finnst ekki!."); //leitar af skr�
$current = fread($file, filesize($admin)); //les inn skr� � variable sem heitir 'current'
fclose($file); //lokar skr�
$vefstjori = strtolower($current); //setur nafn Vefstj�ra � variable sem heitir 'vefstjori'
$notandi=strtolower($_SESSION['username']); //setur nafni� � innskr��um notanda � variable sem kallast 'notandi'
$nafn= ucfirst($notandi); //setur fyrsta stafinn � nafninu � uppercase

//#Athuga hvort innskr��ur notandi s� Vefstj�ri.
?>


