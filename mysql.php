<?php
$db="myndaskurinn01";
$mysqli = new mysqli("37.148.204.139","myndaskurinn01","UPEa7pBS@");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$mysqli -> select_db("myndaskurinn01");
?>