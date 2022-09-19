<?php
session_start();

if(!isset($_SESSION['user_id'])){
	header('Location: login.php');
	  exit();
	die;
}
 


//Mikilvægt!

include 'admin/admincheck.php'; // sækir variables um stjórnanda
include 'userinfo.php'; // sækir allar upplýsingar um notanda

/*
Upplýsingar frá 'userinfo.php'
-------------------------------
$notandi_fullt_nafn - Fullt Nafn
$notandi_kennitala = Kennitala
$notandi_heimlisfang = Heimilisfang
$notandi_notandanafn = Username
$notandi_email = Email
$notandi_lykilord = Password
$notandi_id = ID
$notandi_stada = 0 = Óstaðfestur Aðgangur, 1 = Staðfestur Notandi, 2 = Stjórnandi, 3 = Kerfisstjóri
*/
$result0 = mysql_query("SELECT count(*) from userinfo WHERE stada = '0';");
$penis = mysql_result($result0, 0);


if (($notandi_stada > 1)){ // Ef innskráður notandi er Stjórnandi ( Admin )

echo "<div align=".'"'."center".'"'."></b>
<font color=".'"'."red".'"'."> Admin Stýring </font color>  
<a href=".'"'."notendur.php".'"'."><i><font color=".'"'."red".'"'."> - Stjórna Notendum - </a></font color>
<a href=".'"'."myndir.php".'"'."><i><font color=".'"'."white".'"'."><font color=".'"'."red".'"'.">  Stjórna Myndum - </a></font color>
<a href=".'"'."notandalisti.php".'"'."><i><font color=".'"'."white".'"'."><font color=".'"'."red".'"'.">  Yfirlit Notenda</a></font color>
<br>
</div>";
echo "<font color=".'"'."white".'"'."</font color>";

echo "<font color=".'"'."white".'"'."</font color>";


//Athugar ef það eru nýjir notendur komnir á síðuna sem er ekki búið að staðfesta.
// $penis = fjöldi óvirka/óstðafestra notenda

if ($penis <= 0)
{
}
else
{
//echo "<div class=\"example\">
//<font color=\"black\"><a href=\"notendur.php\"> ".$penis."</a href></div> Notandi sem þarfnast staðfestingar!</font>
echo "<center><font color=\"black\"><a href=\"notendur.php\"> ".$penis." Notendur sem eru óvirkir!</a href></font color></center>";
}


}
?>
</div>
</body>