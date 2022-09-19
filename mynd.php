

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
<head profile="http://gmpg.org/xfn/11">
<title>Lokaverkefni</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"> 
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">



</head>

<body>
<div id="poop">



</div>
<div id="page">
  <div id="header">
   
     <!--/logo -->

    <!--/searchform -->
    
    <?php include 'nav.php';  ?>
<?php include 'mysql.php'; ?>	  

	  
<form method=post action=breytamynd.php>
   <?php
   $query="SELECT * FROM myndir WHERE user='".$_SESSION['username']."'";
   
$result=mysql_query($query);
echo "<font color=".'"'."white".'"'."><b>Mynd: </b></font color>"; 
$f='<select name="myndalisti">';
while ($row = mysql_fetch_array($result)) {
   $f.='<option value= "'.$row['url'].'">'.$row['url'].'</option>';
}
$f.='</select>';

echo $f; 
?>
<font color=".'"'."black".'"'."><b> Aðgerð:</b></font color>"
<form  method='post'>
<select name="adgerd">
<option value="breyta1" id ="1">Eyða Mynd</option>
<option value="breyta2"id ="2">Breyta Lýsingu</option>
<option value="breyta3"id ="3">Breyta hverjir geta skoðað mynd í 'Allir'</option>
<option value="breyta4"id ="4">Breyta hverjir geta skoðað mynd í 'Notendur'</option>
<option value="breyta5"id ="4">Breyta hverjir geta skoðað mynd í 'Stjórnendur'</option>
</select>
 <tr>
					
				  <td font color="black"><p>&nbsp;</p>
				    <p>Breyta lýsingu (mest 25 stafir)</span><span class="kkkkkkkkkkkkkkkkkkk" id="post-41"></span> 				    
				      <textarea type="textarea" maxlength=25 name="desc" col=30></textarea>
	                </p></td>
				</tr>
 <left>  <input type=submit value=Framkvæma /></left>
</form>




</body>
</html>
