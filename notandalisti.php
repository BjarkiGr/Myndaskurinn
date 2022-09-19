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
<?php 
include 'userbar.php'; 
  $result0 = mysql_query("SELECT count(*) from userinfo;");
$penis = mysql_result($result0, 0);
?>
</div>


<br><br><br>

<p style="text-align: center;"><script language="JavaScript">
	function onDelete()
	{
		if(confirm('Ertu viss um að þú viljir eyða notanda?')==true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
</script>
<?php
include 'admin/adminvorn.php';
?>	
<br><br><br> <h2>Listi yfir skráða meðlimi</h2>
        <?php
       
            $results = mysql_query("SELECT * FROM userinfo");
	
            while($row = mysql_fetch_array($results))
			{
            ?>
             
<center>


<table width="600" border="1">
  <tr>
 
  <th width="200"> Nafn </center></div></th>
    <th width="98"> <div align="center">Email </div></th>
    <th width="198"> <div align="center">Notandanafn </div></th>
    <th width="97"> <div align="center">Heimilisfang </div></th>
	<th width="97"> <div align="center">Staða </div></th>
  </tr>
  <tr>

	 <td><font color="red"> <?=$row["nafn"];?></td></font>
    <td><font color="red"> <?=$row["email"];?></td></font>
    <td><font color="red"> <?=$row["username"];?></td></font>
	<td><font color="red"> <?=$row["heimlisfang"];?></td></font>
    <td><b><font color="black"> <div align="center"><?=$row["stada"];?></div></td></font></b> 
  </tr>

</table>

</p>          
<?php
            }
            ?>
<center><font color = "red"> 
0 = Óstaðfestur Aðgangur, 1 = Staðfestur Notandi, 2 = Stjórnandi, 3 = Kerfisstjóri
<br><br>
</font color></center>
<?php include 'nav.php' ?>
</body>
</html> 
