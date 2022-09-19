<?php
header('Content-Type: text/html; charset=UTF-8');
//Nýskráning
$errors = array();
if(isset($_POST['login'])){
	$username = preg_replace('/[^A-Za-z]/', '', $_POST['username']);
	$email = $_POST['email'];
	$password = $_POST['password'];
	$c_password = $_POST['c_password'];


	if($username == ''){
		$errors[] = 'Ekkert notandanafn skráð.';
	}
	if($email == ''){
		$errors[] = 'Ekkert netfang skráð';
	}
	if($password == '' || $c_password == ''){
		$errors[] = 'Ekkert lykilorð skráð';
	}
	if($password != $c_password){
		$errors[] = 'Lykilorð stemma ekki';
	}
	if(count($errors) == 0){
		
		include 'sql.php'; //stillingar fyrir SQL tengingu



//sæki upplýsingar frá nýskráningarformi
$name = $_POST['full_name'];
$kt = $_POST['kt'];
$address = $_POST['address'];
$username = $_POST['username'];
$emailreg = $_POST['email'];
$passwordreg = $_POST['password'];
 $passwordreg = sha1( $passwordreg );
//$passwordreg = md5($passwordreg);
//skrái inn upplýsingar frá nýskráningar formi í SQL

 $stmt = $dbh->prepare("INSERT INTO userinfo (nafn, kennitala, heimlisfang, username, email, password, stada)
VALUES ('$name', '$kt', '$address', '$username', '$emailreg', '$passwordreg', '1')");


 $stmt->execute();
header( "refresh:2;url=index.php" );
echo '<link rel="stylesheet" type="text/css" href="css/stylesheet.css">';

echo'
<div id="registerokRammi">
<br><br>
<center><font color="white">Skráning tókst!<br>
Færi þig yfir á innskráningarsíðu..
</div> ';



		die;
}
}
?>

<!DOCTYPE html>
<head>
	<title>Nýskrá</title>
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
</head>
<body>
<div id="registerRammi">
	<form align="center" method="post" action="">

<h2 style="color: #FF6600">Nýskráning</h2>

<div id="inputRammi2">
	<p id="inputDot">Fullt Nafn:
		<input type="text" name="full_name" size="20" id="full_name" /></p>

	<p id="inputDot">Kennitala:
		<input type="text" name="kt" size="20" id="kt" /></p>

	<p id="inputDot">Heimilisfang:
		<input type="text" name="address" size="20" id="address" /></p>

	<div style="margin-bottom:6px"></div>
	<p id="inputDot">Notendanafn:
		<input id="txtUserName type="text" name="username" size="20" />
		<Label ID="lblMsg" Text = "UserExists" runat="server" style =" visibility:hidden "></Label></p>
	  
	<p id="inputDot">Netfang:
		<input type="text" name="email" size="20" /></p>
	<p id="inputDot">Lykilorð:
	    <input type="password" name="password" size="20" /></p>
	<p id="inputDot">Staðfesta Lykilorð:
		<input type="password" name="c_password" size="20" /></p>
	</div> 
	<p id="takki"><input align="center" type="submit" name="login" value="Nýskrá"  /></p>
	
	</form>
</body>

	  
 

 <?php
		if(count($errors) > 0){
			echo '<ul>';
			foreach($errors as $e){
				echo '<li><font color=white>' . $e . '</li></font color>';
			}
			echo '</ul>';
		}
		?>
</div>
</html>