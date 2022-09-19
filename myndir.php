<!DOCTYPE html>
<html>
<head>
<title>Myndaskúrinn</title>

	<div id="header">		
		<br>
		<h1 id="yfirskrift">Myndaskúrinn</h1>
	</div>
</head>

<div id="flokkar">
<?php 
include 'userbar.php'; 
echo "<p>Mynd: </p>"; 
?>


</div>
<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
<body>

    
<?php include 'nav.php';  ?>
<?php include 'sql.php'; ?>	  
<?php include 'admin/adminvorn.php' ?>
<div id="lykilord">
<form method=post action=breytamynd.php>
   <?php
   $query="SELECT * FROM myndir";
$result=mysql_query($query);

$f='<select name="myndalisti">';
while ($row = mysql_fetch_array($result)) {
   $f.='<option value= "'.$row['url'].'">'.$row['url'].'</option>';
}
$f.='</select>';

echo $f; 
?>
<center>
<p> Aðgerð:</p>
<form  method='post'>
<select name="adgerd">
<option value="breyta1" id ="1">Eyða Mynd</option>
<option value="breyta2"id ="2">Breyta Lýsingu</option>
<option value="breyta3"id ="3">Breyta hverjir geta skoðað mynd í 'Allir'</option>
<option value="breyta4"id ="4">Breyta hverjir geta skoðað mynd í 'Notendur'</option>
<option value="breyta5"id ="4">Breyta hverjir geta skoðað mynd í 'Stjórnendur'</option>
</select>
 <tr>
					
				  <td font color="white"><p>&nbsp;</p>
				    <p>Breyta lýsingu (mest 25 stafir)</p>
				      <textarea type="textarea" maxlength=25 name="desc" col=30></textarea>
				</td>
				</tr>
<input type=submit value=Framkvæma />
</form>
</div>
<br>
<br>
<br>
<br>


</body>
</html>
