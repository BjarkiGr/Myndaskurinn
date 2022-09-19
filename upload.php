<!DOCTYPE html>
<html>
<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();
include 'userinfo.php';
if(!isset($_SESSION['user_id'])){
echo "Þú ert ekki innskráður!!";
	die;
}
?>
<head>
	<title>Myndaskúrinn</title>
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
	<div id="header">		
		<br>
		<h1 id="yfirskrift">Myndaskúrinn</h1>
	</div>
</head>
<body>
<div id="flokkar">

<?php 
include 'userbar.php';
?>
</div> 
   <?php include 'userinfo.php'; ?>
  <?php include 'nav.php'; ?>
  
        <form action="" method="post" enctype="multipart/form-data" name="newad" id="newad">
          <p>&nbsp;</p>
          <p>&nbsp;</p>
		  <center>
          <p>Veldu mynd til þess að senda inn</p>
          <table cellspacing=15 cellpadding=5>
				<tr>
				<td><center><input type="file" name="image" /></td>
				</tr>
				
				<tr>
					<td><font color="Black"><b> Flokkur: </b></font color>
						<form method=post action=breyta.php>
							<select name="mynd_adgerd">
								<option value="Allar myndir" id ="1">Allar Myndir</option>
								<option value="Bílamyndir"id ="2">Bílamyndir</option>
								<option value="Dýramyndir"id ="3">Dýramyndir</option>
								<option value="Náttúrumyndir"id ="4">Náttúrumyndir</option>
							</select>
						
						Hverjir geta séð mynd: 
						<!---  select from myndir  where access == x.. Þarf að gera fullt af if else svo þetta virki með flokkuninni + search :/ nennnis kv haffi ---->
							<select name="access">
								<option value= 1 id ="1">Allir</option>
								<option value= 1 id ="2" disabled>notendur</option>
								<option value= 2 id ="3" disabled>stjórnendur</option>
							</select>
						</form>
						<span id="post-41">
				        </td>
		        
				        </tr>
			
                        </span>
					
		        <tr>
					
				  <td font color="black"><font color = "black" >Stutt lýsing (mest 25 stafir)
				  <textarea type="textarea" maxlength=25 name="desc" col=30></textarea></td>
				</tr>
				
				<tr>
				  <td>  <center><input name="Submit" type="submit" value="Senda inn" /></td>
				</tr>
          </table>
        </form>
		
        <?php
$access = "0";
//kóði tekinn frá http://www.reconn.us/image_thumbnail.html. Býr til thumbnail af myndinni
define ("MAX_SIZE","1500");

define ("WIDTH","100");
define ("HEIGHT","100");

include("myndadrasl.php");

function make_thumb($img_name,$filename,$new_w,$new_h)
{

$ext=getExtension($img_name);
if(!strcmp("jpg",$ext) || !strcmp("jpeg",$ext))
$src_img=imagecreatefromjpeg($img_name);
 
if(!strcmp("png",$ext))
$src_img=imagecreatefrompng($img_name);
$old_x=imageSX($src_img);
$old_y=imageSY($src_img);
$ratio1=$old_x/$new_w;
$ratio2=$old_y/$new_h;
if($ratio1>$ratio2) {
$thumb_w=$new_w;
$thumb_h=$old_y/$ratio1;
}
else {
$thumb_h=$new_h;
$thumb_w=$old_x/$ratio2;
}

$dst_img=ImageCreateTrueColor($thumb_w,$thumb_h);
 
imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y);
 
if(!strcmp("png",$ext))
imagepng($dst_img,$filename);
else
imagejpeg($dst_img,$filename);
 

imagedestroy($dst_img);
imagedestroy($src_img);
}
 
function getExtension($str) {
$i = strrpos($str,".");
if (!$i) { return ""; }
$l = strlen($str) - $i;
$ext = substr($str,$i+1,$l);
return $ext;
}
 

$errors=0;
if(isset($_POST['Submit']))
{

$image=$_FILES['image']['name'];

if ($image)
{

$filename = stripslashes($_FILES['image']['name']);
 
$extension = getExtension($filename);
$extension = strtolower($extension);

if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png"))
{
echo '<h1>Óþekkt skráargerð!</h1>';
$errors=1;
}
else
{

$size=getimagesize($_FILES['image']['tmp_name']);
$sizekb=filesize($_FILES['image']['tmp_name']);
 

if ($sizekb > MAX_SIZE*1024)
{
echo '<h1>Skrá er of stór!</h1>';
$errors=1;
}

 

$image_name= $filename.'.'.$extension;

$newname="uploads/".$image_name;
$copied = copy($_FILES['image']['tmp_name'], $newname);

if (!$copied)
{
echo '<h1>Innsending mistókst!</h1>';
$errors=1;
}
else
{

$thumb_name='uploads/thumbs/thumb_'.$image_name;

$thumb=make_thumb($newname,$thumb_name,WIDTH,HEIGHT);
}} }}


if ($thumb_name=='')
{
//ef enginn mynd var valinn. Kemur í veg fyrir að tómar myndir séu sendar inn
$errors=1;
}

if(isset($_POST['Submit']) && !$errors)
{
echo '<font color ="white"><h1>Innsending Myndar tókst!</h1>';
echo '<img src="'.$thumb_name.'">';
$poop = $_POST['mynd_adgerd'];
echo "<br>Mynd send í flokkinn ". $poop;
$poop2 = $_POST['access'];


if ($poop2 == '1')
{
echo "<br> Myndin er aðgengileg öllum notendum!";
}


if ($poop2 == '2')
{
echo " Myndin er aðgengileg skráðum notendum";
}

if($poop2 == '3')
{
echo " Myndin er aðeins aðgengileg stjórnendum!";
}









SaveMynd($filename, $extension, $_POST['mynd_adgerd'], $_POST['desc'], $notandi_notandanafn, $_POST['access']);

}
?>

