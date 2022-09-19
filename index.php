<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();
if(!isset($_SESSION['user_id'])){
include 'login.php';
	die;
}
 include 'userinfo.php';
?>
<html>
<head>
	<script type="text/javascript" src="http://gettopup.com/releases/latest/top_up-min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
	<title>Myndaskúrinn</title>
	<div id="header">		
		<br>
		<h1 id="yfirskrift">Myndaskúrinn</h1>
	</div>
</head>

<?php 
if ($notandi_stada>1) //birtir admin menu
{
include 'userbar.php';
} 
?>

<br>
  <?php include 'search.php'; ?>
  <br>
  <br>
 <?php include 'nav.php';  ?>
