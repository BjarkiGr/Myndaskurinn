
 <link rel="stylesheet" type="text/css" href="css/toflur.css">
	
	<table cellspacing='0'>
		 <br><br><p>Tafla með bröndurum úr gagnagrunni</p>
	<tr><th>Ljósmynd</th><th>Nafn Innsendanda</th><th>Flokkur</th><th>Lýsing</th><th>Nafn á Skrá</th><th>Dagsetning</th></tr>

        <blockquote>
          <p>
		  

	
		  <tr>
		  
		
		<?php
		$teljari=0;
			include("mysql.php");
			
			if (($notandi_stada > 1)) { 
			$result = mysql_query("SELECT * FROM myndir");
			}else{
				
				$result = mysql_query("SELECT * FROM myndir where access =  '1' ");
				}
			
			
			while($row = mysql_fetch_array($result))
			  {
			
$teljari++;
			  echo "<tr>";
			   echo "<td>";
			 
				
			   echo" <b> <a  href='uploads/".$row['url'].".".$row['extension']."'toptions='group = links, effect = clip, title = (Mynd {alt} {current} af {total}) <td>Eigandi: ".$row['user']." | Flokkur: ".$row['album']." | Lýsing: ".$row['description']." | Dagsetning: ".date("d/m/Y", $row['date'])."'><img src='uploads/thumbs/thumb_".$row['url'].".".$row['extension']." '  /></a>";
			   echo "</td></b>";
			
			  echo "<ul>";
			  echo "<li>";	
echo "<br>";			  
			  echo "<div style='color:red;'>";			
			  echo "<td>".$row['user']."<br /></td>";
			
			  echo "<td>".$row['album']."<br /></td>";
			  echo "<td>".$row['description']."<br /></td>";
			  echo "<td>".$row['url']."<br /></td>";
			  echo "<td>".date("d/m/Y", $row['date']);
		    
			  echo "</li></ul></div>";
		
			  echo "</td>";
			   echo "</tr>";
			   
			   	  
			 
			  }
			
		if (($teljari > 0)) { //Athugar ef það er enginn mynd í gagnagrunninum

 
		}else{
		  echo "<br>";	
	echo "<font color = 'black'> <center> Engar myndir í gagnagrunni! </center> </font>";
	echo "<tr>";
			   echo "<td>";
			 
			
			   echo"<b><center><img src='uploads/FAIL.jpg'></center>";
			
			   echo "<br>";	
			   echo "<br>";	
			   echo "</td></b><br>";
			   echo "<td>";
			   echo "<ul>";
			   echo "<li>";	
               echo "<br>";			  
	
			
			  echo "</li></ul></div>";
		
			  echo "</td>";
			   echo "</tr>";
		
die;
	
	
} 
			mysql_close($con);
			echo "<br><br><font color = 'black'> <center><b> Myndir í Gagnagrunni. (Smelltu á þær til að opna)</b> </center> </font>";
		
			?> 
			
			
			</tbody>
			</table>
			
			 </div><br/>