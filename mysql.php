<?php
$db="myndaskurinn01";
$mysqli = new mysqli("37.148.204.139","myndaskurinn01","UPEa7pBS@");
if (!$con)
  {

  die('Could not connect: ' . mysqli_error());
  }

$mysqli -> select_db("myndaskurinn01");
?>