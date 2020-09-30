<?php

$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "all_garments_in_one_place";

$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

if(mysqli_connect_errno()){
  echo "Error: ".mysqli_connect_err();
  die();
}

?>
