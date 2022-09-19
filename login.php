<?php
header('Content-Type: text/html; charset=UTF-8');
// startar session
session_start();
			//echo "<br>";
// athugar ef notandi er nú þegar loggaður inn
if(isset( $_SESSION['user_id'] ))
{
    $message = 'Þú ert nú þegar innskráður';
	
}
// athugar ef bæði username og password dálkurinn var með gildi
if(!isset( $_POST['form_username'], $_POST['form_password']))
{
    $message = 'Skráðu inn notendanafn og lykilorð!';
	
}
// athuga lengd á notendanafni og lykilorði
elseif (strlen( $_POST['form_username']) > 20 || strlen($_POST['form_username']) < 4)
{
    $message = 'Notendanafn of stutt!';
}

elseif (strlen( $_POST['form_password']) > 20 || strlen($_POST['form_password']) < 4)
{
    $message = 'Lykilorð of stutt';
}
// athugar ef notendanafn er bara Stafir eða tölur
elseif (ctype_alnum($_POST['form_username']) != true)
{
   
    $message = "Ógilt notendanafn";
}

elseif (ctype_alnum($_POST['form_password']) != true)
{
        
        $message = "Ógilt lykilorð";
}
else
{
    // hendir út ógildum kóða sem gæti verið notaður til að sql injecta (t.d html tögg)
    $form_username = filter_var($_POST['form_username'], FILTER_SANITIZE_STRING);
    $form_password = filter_var($_POST['form_password'], FILTER_SANITIZE_STRING);

    //sha1 encrypta lykilorð
    $form_password = sha1( $form_password );
    

//reyna að framkvæma sql skipun
    try
    {
         include "sql.php";
       

  
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //select skipun sem sækir notendanafn og lykilorð
        $stmt = $dbh->prepare("SELECT id, username, password FROM userinfo 
                    WHERE username = :form_username AND password = :form_password");


        $stmt->bindParam(':form_username', $form_username, PDO::PARAM_STR);
        $stmt->bindParam(':form_password', $form_password, PDO::PARAM_STR, 40);

      //keyrir skipun
        $stmt->execute();

        // leitar af niðurstöðum
        $user_id = $stmt->fetchColumn();

        // ef engar niðurstöður þá koma villuskilaboð
        if($user_id == false)
        {
                $message = 'Vitlaust notendanafn eða lykilorð!';
        }
  
        else
        {
                // setur session user_id í gildi
                $_SESSION['user_id'] = $user_id;
           
                $message = 'Innskr⯩ng tókst. Færi þig yfir á aðalsíðu';
				$_SESSION['username']=$form_username;
				  header('Location: index.php');
				echo "Velkominn faggot ". $_SESSION['username'];
				
        }


    }
    catch(Exception $e)
    {
 
        $message = 'Reyndu aftur síðar"';
    }
}
?>

<html>
	<head>
		<title>Innskráning</title>
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
	</head>
	<body>
		<div id="loginRammi">
			<h2 style="color: #FF6600">Innskráning</h2>
			<p class="current">Athugið: Þú þarft að vera innskráður til að skoða efni á þessari síðu.</p>
			<br>
			
			<form action="login.php" method="post">
			
			<div id="inputRammi">
			
				<p id="inputDot">
					<label for="form_username">Notendanafn:</label>
					<input type="text" id="form_username" name="form_username" value="" maxlength="20"/>
				</p>
				
				<p id="inputDot">
					<label for="form_password">Lykilorð:</label>
					<input type="password" id="form_password" name="form_password" value="" maxlength="20"/>
				</p>
				</div>
				<p id="takki">
					<input type="submit" value="Innskráning" />
				</p>
				
			</form>
	<p>
	  <?php echo $message ?>
	<p>Áttu ekki aðgang? Skráðu þig <u><a style="color: white" href="register.php">hér</a></u></p>
</div>
</body>
</html>