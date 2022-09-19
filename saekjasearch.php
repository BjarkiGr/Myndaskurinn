

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
<head profile="http://gmpg.org/xfn/11">
<title>Hópur 2 - Lokaverkefni</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"> 
 <link rel="stylesheet" type="text/css" href="css/toflur.css">
<script type="text/javascript" src="js/top_up-min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">


<style type="text/css">
.button {font-size:15px;
padding:6px;
font-weight:bold;
}
.input {padding:9px;
border:solid 1px #999;
margin:4px;
width:220px;
}
</style>
</head>

<body>
<div id="poop">

</div>
<div id="page">
  <div id="header">
    <div class="logo">
    </div>
    
   
 <table cellspacing='0'>
	
	<tr><th>Ljósmynd</th><th>Nafn Innsendanda</th><th>Flokkur</th><th>Lýsing</th><th>Nafn á Skrá</th><th>Dagsetning</th></tr>

        <blockquote>
          <p>
		
		  <tr>
		
<?php
include 'sql.php';
 include 'mysql.php';

// sækir flokkinn sem var valinn
$flokkur=$_REQUEST["leit"]; 
echo 'Leitarorð: '.$flokkur;
$sql = mysql_query("select * from myndir where description like '%$flokkur%'");
$samtals = 0;
while ($row = mysql_fetch_array($sql)){  echo "<tr>";
			   echo "<td>";
			 // echo "<a style='border: 0;' href='uploads/".$row['url'].".".$row['extension']."'><img src='uploads/thumbs/thumb_".$row['url'].".".$row['extension']."' /></a><br />";			
			   echo" <b> <a  href='uploads/".$row['url'].".".$row['extension']."'toptions='overlayClose = 1, group = links, effect = clip, title = (Mynd {alt} {current} af {total}) Eigandi: ".$row['user']." | Flokkur: ".$row['album']." | Lýsing: ".$row['description']." | Dagsetning: ".date("d/m/Y", $row['date'])."'><img src='uploads/thumbs/thumb_".$row['url'].".".$row['extension']." '  /></a>";
			   echo "</td></b>";
			  echo "<ul>";
			  echo "<li>";	
echo "<br>";			  
			  echo "<div style='color:red;'>";
//			  echo "<a styl='border: 0;' href='uploads/".$row['url'].".".$row['extension']."'><img src='uploads/thumbs/thumb_".$row['url'].".".$row['extension']."' /></a><br />";
			   echo "<td>".$row['user']."<br /></td>";
			  echo "<td>".$row['album']."<br /></td>";
			  echo "<td>".$row['description']."<br /></td>";
			  echo "<td>".$row['url']."<br /></td>";
			  echo "<td>".date("d/m/Y", $row['date']);
		    
			  echo "</li></ul></div>";
		
			  echo "</td>";
			   echo "</tr>";
	$samtals = $samtals+1;
    }
	
	//echo '<br/><b> <font color = "red">Leit lokið.';
	echo '<br/> Niðurstöður: <b> <font color = "red"> '.$samtals;
	
?>
      <br>
	  <br>