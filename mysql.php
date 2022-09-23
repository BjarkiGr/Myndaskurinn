<?php
$db="myndaskurinn01";
$mysqli = new mysqli("root","myndaskurinn01","");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$mysqli -> select_db("myndaskurinn01");
?>