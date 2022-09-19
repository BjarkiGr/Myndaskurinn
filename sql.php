<?php

 /*** mysql server ***/
    $mysql_hostname = '37.148.204.139';

    /*** mysql notandi ***/
    $mysql_username = 'myndaskurinn01';

    /*** mysql lykilord ***/
    $mysql_password = 'UPEa7pBS@';

    /*** gagnagrunns nafn ***/
    $mysql_dbname = 'myndaskurinn01';
	  $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
	?>