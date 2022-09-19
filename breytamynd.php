<?php
header('Content-Type: text/html; charset=UTF-8');
$valinn=$_POST['myndalisti'];
$valkostur=$_POST['adgerd'];
$lysing=$_POST['desc'];
include 'mysql.php';

switch ($valkostur) {

   case "breyta1" : //Eyða myndd


  mysql_query("DELETE FROM myndir 
WHERE url = '".$valinn."'");

header( "refresh: 2; url=index.php" );
echo "<div align=".'"'."left".'"'."><b><font color=".'"'."#3DCC63".'"'.">Myndin <b></font color> 
<a href=".'"'."myndirnarminar.php".'"'."><font color=".'"'."#3DCC63".'"'.">".($valinn)."</a>".''." hefur verið eytt</b></font color>";

   break;
   
    case "breyta2" :  //breyta l??gu
  mysql_query("UPDATE myndir SET description = '".$lysing."'
WHERE url = '".$valinn."'");

echo "<div align=".'"'."left".'"'."><b><font color=".'"'."#3DCC63".'"'.">Lýsingu á ></font color> 
<a href=".'"'."profill.php".'"'."><font color=".'"'."#3DCC63".'"'.">".($valinn)."</a>".''." hefur verið breytt.</b></font color>";
header( "refresh: 2; url=myndir.php?mynd=".$valinn );
   break;

   case "breyta3" :  //Leyfa ??m a??o??ynd
  mysql_query("UPDATE myndir SET access = '1'
WHERE url = '".$valinn."'");

echo "<div align=".'"'."left".'"'."><b><font color=".'"'."#3DCC63".'"'.">þeir sem geta séð myndina<b></font color> 
<a href=".'"'."profill.php".'"'."><font color=".'"'."#3DCC63".'"'.">".($valinn)."</a>".''." eru ALLIR.</b></font color>";

header( "refresh: 2; url=myndir.php?mynd=".$valinn );
   break;
   
     case "breyta4" :  //Leyfa notendum a??o??ynd
  mysql_query("UPDATE myndir SET access = '2'
WHERE url = '".$valinn."'");

echo "<div align=".'"'."left".'"'."><b><font color=".'"'."#3DCC63".'"'.">Allir notendur geta núna séð></font color> 
<a href=".'"'."profill.php".'"'."><font color=".'"'."#3DCC63".'"'.">".($valinn)."</a>".''." </b></font color>";

header( "refresh: 2; url=myndir.php?mynd=".$valinn );
   break;
   
     case "breyta5" :  //Leyfa a??s stj??ndum a??o??ynd
  mysql_query("UPDATE myndir SET access = '3'
WHERE url = '".$valinn."'");
  
echo "<div align=".'"'."left".'"'."><b><font color=".'"'."#3DCC63".'"'.">Aðeins stjórnendur geta núna séð<b></font color> 
<a href=".'"'."profill.php".'"'."><font color=".'"'."#3DCC63".'"'.">".($valinn)."</a>".''." .</b></font color>";




header( "refresh: 2; url=myndir.php?mynd=".$valinn );




   break;
   default :
   echo "hræðinleg villa kom upp...";
   break;

   }
?>
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <?php include 'nav.php';  ?>

     