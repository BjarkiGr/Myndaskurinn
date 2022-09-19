<?php

if(!isset($_SESSION['user_id']))
{
    $message = 'Þú þarft að vera innskráður til að sjá þess síðu';
}
else
{
    try
    {      
      include "sql.php";
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $dbh->prepare("SELECT username FROM userinfo
        WHERE id = :phpro_user_id"); 
        $stmt->bindParam(':phpro_user_id', $_SESSION['user_id'], PDO::PARAM_INT); 
        $stmt->execute();

        $notandi_session = $stmt->fetchColumn();
        if($notandi_session == false)
        {
            $message = 'Villa';
        }
        else
        {
            $message = 'Velkominn '.$notandi_session;
        }
    }
    catch (Exception $e)
    {
       
        $message = 'Reyndu síðar"';
    }
}

?>

<html>
<head>
<title>Lokaverkefni GSÖ</title>
</head>
<body>

</body>
</html>