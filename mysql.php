<?php
$db="myndaskurinn01";
$con = mysql_connect("37.148.204.139","myndaskurinn01","UPEa7pBS@");
if (!$con)
  {

  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($db, $con);
?>