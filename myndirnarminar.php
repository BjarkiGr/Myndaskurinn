<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();
include 'userinfo.php';
if(!isset($_SESSION['user_id'])){
echo "Þú ert ekki innskráður!!";
	die;
}
?>
<html>
<head>
<script type="text/javascript" src="http://gettopup.com/releases/latest/top_up-min.js"></script>
 <link rel="stylesheet" type="text/css" href="css/stylesheet.css">

</head>
 
<body>
<div id="header">		
	<br>
	<h1 id="yfirskrift">Myndaskúrinn</h1>
</div>

<div id="flokkar">
<?php 
include 'admin/admincheck.php'; // sÃ¦kir variables um stjÃ³rnanda
include 'userinfo.php'; // sÃ¦kir allar upplÃ½singar um notanda
?>

</div>
   
   
    <?php include 'nav.php'; ?>
	
 
 
	<table cellspacing='0'>
	
	<tr><th></th><th>Nafn Innsendanda</th><th>Flokkur</th><th>Lýsing</th><th>Nafn á Skrá</th><th>Dagsetning</th></tr>

        <blockquote>
          <p>
		
		  <tr>
		
		<?php
			include("sql.php");
			$teljari = 0;
			echo "<p font-size='18px'>Þínar Myndir</p>";
			$result = mysql_query("SELECT * FROM myndir WHERE user='".$_SESSION['username']."'");
			while($row = mysql_fetch_array($result))
			  {
			  
			  
		
			  echo "<tr>";
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
			   
	$teljari++;
			   	  
			 
			  }
			  
			  
			  
			  
			mysql_close($con);
			
			if (($teljari > 0)) { //Athugar ef það er enginn mynd í gagnagrunninum

 
		}else{
		  echo "<br>";	
	echo "<font color = 'white'> <center> Þú hefur ekki sent inn neina mynd! </center> </font><br>";
	echo "<tr>";
			   echo "<td>";
			 
			
			  
			   echo "<br>";	
			
			   echo "</td></b>";
			    echo "<td>";
			  echo "<ul>";
			  echo "<li>";	
echo "<br>";			  
	
			
			  echo "</li></ul></div>";
		
			  echo "</td>";
			   echo "</tr>";
			   
die;

}
			?> 
			
			
			</tbody>
			</table>
			
			 </div><br />
			
			 <html>
  <head>
 
  </head>
  
</html>
</body>
</html>
