<!DOCTYPE html>
<?php 
include 'userbar.php'; 
?>
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


$error = false;
if(isset($_POST['change'])){
	
	$new = sha1($_POST['n_password']);
	$c_new = sha1($_POST['c_n_password']);
	
			include 'sql.php';
			
			
			
			
			
			
			//uppfæri lykilorð í SQL
mysql_query("UPDATE userinfo SET password = '".$c_new."' WHERE username = '".$notandi_notandanafn."'");
			
			header('Location: logout.php');
			

			
			die;
		
	
	
	$error = true;
}

?>


	<h2>Breyta Lykilorði</h2>
	<div id="lykilord">
		
	<form method="post" action="">
		<?php 
		if($error){
			echo '<p>Lykilorð passa ekki saman.</p>';
		}
		?>
		<br>
		
		<p>Nýtt Lykilorð <input type="password" name="n_password" /></p>
		<p>Staðfesta Lykilorð <input type="password" name="c_n_password" /></p>
		<p><input type="submit" name="change" value="Breyta Lykilorði" /></p>
	</form>
</div>
<?php include 'nav.php' ?>
</body>
</html>