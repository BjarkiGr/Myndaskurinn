
<?php
include "checklogin.php";
//Sækir upplýsingar úr gagnagrunni sem eru skráðar á notandann sem er loggaður inn
//MYSQL :s
$notandi_id="";
$notandi_fullt_nafn="";
$notandi_stada_name="";
include 'mysql.php';
$result = mysql_query("SELECT * FROM userinfo
WHERE username = '$notandi_session'");
while($row = mysql_fetch_array($result)) 
  {
  $notandi_fullt_nafn = $row['nafn'];
  $notandi_kennitala = $row['kennitala'];
  $notandi_heimlisfang = $row['heimlisfang'];
  $notandi_notandanafn = $row['username'];
  $notandi_email = $row['email'];
  $notandi_lykilord = $row['password'];
  $notandi_id = $row['id'];
  $notandi_stada = $row['stada'];
  
  }
  
  if ($notandi_stada == "0") {
 $notandi_stada_name = "Óstaðfestur Notandi";
  }
   if ($notandi_stada == "1") {
 $notandi_stada_name = "Notandi";
  }
   if ($notandi_stada == "2") {
  $notandi_stada_name = "Stjórnandi";
  }
   if ($notandi_stada == "3") {
  $notandi_stada_name = "Kerfisstjóri";
  }
  
 $notandi=strtolower($notandi_notandanafn); //setur nafnið á innskráðum notanda í variable sem kallast 'notandi'
$nafn= ucfirst($notandi); //setur fyrsta stafinn í nafninu í uppercase

?>

