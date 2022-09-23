<?php

 /*** mysql server ***/
    $mysql_hostname = 'localhost';

    /*** mysql notandi ***/
    $mysql_username = 'root';

    /*** mysql lykilord ***/
    $mysql_password = '';

    /*** gagnagrunns nafn ***/
    $mysql_dbname = 'myndaskurinn01';
	  $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
	?>