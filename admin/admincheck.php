<?php
//Athuga hvort innskráður notandi sé Vefstjóri.

$admin = "admin/current"; //skráin sem inniheldur nafn Vefstjóra
$file = fopen($admin, 'r') or die("Skra finnst ekki!."); //leitar af skrá
$current = fread($file, filesize($admin)); //les inn skrá í variable sem heitir 'current'
fclose($file); //lokar skrá
$vefstjori = strtolower($current); //setur nafn Vefstjóra í variable sem heitir 'vefstjori'
$notandi=strtolower($_SESSION['username']); //setur nafnið á innskráðum notanda í variable sem kallast 'notandi'
$nafn= ucfirst($notandi); //setur fyrsta stafinn í nafninu í uppercase

//#Athuga hvort innskráður notandi sé Vefstjóri.
?>


