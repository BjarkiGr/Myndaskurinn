<?php    //kóði sem athugar á Admin síðunum hvort notandinn sé admin	
  if (($notandi_stada > 1) or ($notandi_notandanafn == "root") ){	  } else {	 
  header("refresh: 2; index.php");	
  echo "<font color=".'"'."red".'"'."> Aðeins stjórnendur hafa aðgang að þessari síðu.. færi þig á aðalsíðu..";	  
  die;	  }	  ?>