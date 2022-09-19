<!DOCTYPE html>
<html>
<head>


<title>ok</title>

<link rel="stylesheet" href="css/footer.css" type="text/css" media="screen" />


</head>

<body>


<div id="footer">


    <ul id="footer_menu">
    
    
        <li class="imgmenu"><a href="index.php"></a></li>
        
        
		<li><a href="#">Aðgangur</a>
        
            <ul class="dropup">
                <li><a href="logout.php">Útskráning</a></li>
                <li><a href="profill.php">Prófíll</a></li>
                <li><a href="lykilord.php">Breyta Lykilorði</a></li>
                <li><a href="upload.php">Senda inn mynd</a></li>
            </ul>
            
        </li>
       
        <li><a href="upload.php">Uploada Mynd</a>
        </li>
		
        <li><a href="profill.php">Prófíll</a>
        </li>
       <li><a href="myndirnarminar.php">Mínar Myndir</a>
        </li>
		  <li><a href="lykilord.php">Breyta Lykilorði</a>
        </li>
		 <li><a href="logout.php">Útskráning</a>
        </li>
		
	
    </ul>



<p><?php echo "Skráður inn sem <b><a href=".'"'."profill.php".'"'.">
<font color=".'"'."#3DCC63".'"'.">".$nafn." </font color></a>"?></p>
    <p><a href="#">Myndaskúrinn</a> &copy; 2014 Bjarki & Haffi </p>




    <ul id="social">
        <li><a href="#" class="tooltip"><img src='css/img/twitter.png' alt="" /><span>Twitter</span></a></li>
        <li><a href="#" class="tooltip"><img src='css/img/rss.png' alt="" /><span>RSS</span></a></li>
        <li><a href="#" class="tooltip"><img src='css/img/flickr.png' alt="" /><span>Flickr</span></a></li>
        <li><a href="#" class="tooltip"><img src='css/img/facebook.png' alt="" /><span>Facebook</span></a></li>
        
    </ul>



</div>



</body>
</html>
