<?php 

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "perfect_cuo";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

// Check connection
if (!$conn) {
die("connection failed") ;
    
  }
else {
     echo("connection successful");
 }

?> 


