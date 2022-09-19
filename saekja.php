<!DOCTYPE html>
<html>

<script type="text/javascript" src="js/top_up-min.js"></script>
 <link rel="stylesheet" type="text/css" href="css/stylesheet.css">

<body>
<center>
	<table cellspacing='0'>
	
	<tr><th>Ljósmynd</th><th>Nafn Innsendanda</th><th>Flokkur</th><th>Lýsing</th><th>Nafn á Skrá</th><th>Dagsetning</th></tr>

		  <tr>
		  <?php




// sækir flokkinn sem var valinn
$flokkur=$_REQUEST["flokk"]; 


//echo "Leitarorð: "+.$flokkur+."'";

		$teljari=0;
			include("mysql.php");
			
			if ($flokkur == 'Allar Myndir')
			{
			$result = mysql_query("SELECT * FROM myndir ");
			}
			else
			{
			$result = mysql_query("SELECT * FROM myndir where album =  '$flokkur' ");
			}
			
			while($row = mysql_fetch_array($result))
			  {
			
$teljari++;
			  echo "<tr>";
			   echo "<td>";
			 
				//kóði fyrir javascript popup info
			 
			   echo" <b> <a  href='uploads/".$row['url'].".".$row['extension']."'toptions='overlayClose = 1 , group = links, effect = clip, title = (Mynd {alt} {current} af {total} ) Eigandi: ".$row['user']." | Flokkur: ".$row['album']." | Lýsing: ".$row['description']." | Dagsetning: ".date("d/m/Y", $row['date'])."'><img src='uploads/thumbs/thumb_".$row['url'].".".$row['extension']." '  /></a>";
			   echo "</td></b>";
			   echo "</td></b>";
			
			  echo "<ul>";
			  echo "<li>";				  
		
//birtir myndir hérna		
			  echo "<td>".$row['user']."<br /></td>";
			
			  echo "<td>".$row['album']."<br /></td>";
			  echo "<td>".$row['description']."<br /></td>";
			  echo "<td>".$row['url']."<br /></td>";
			  echo "<td>".date("d/m/Y", $row['date']);
			  echo "</li></ul></div>";
			  echo "</td>";
			   echo "</tr>";
			   //endar töflu með myndum
			   
					
			 
			  }
			
		if (($teljari > 0)) { //Athugar ef það er enginn mynd í gagnagrunninum

 
		}else{
		  echo "<br>";	
	echo "<p>Engar myndir á vefsíðunni!</p>";
	
			 
			
			   echo"<b><center><img src='http://www.nedhardy.com/wp-content/uploads/images/2010/february/cat_fail/cat_fail_5.jpg'></center>";
		echo "<br>";
		echo "<br>";
		echo "<br>";

		
die;
	
	
} 
			mysql_close($con);
			
		
?>
<br>
<br><br><br>