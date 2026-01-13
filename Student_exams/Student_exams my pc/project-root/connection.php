<?php
session_start();
$servername     = "localhost";
$username       = "root";
$password       = "";
$databasename   = "institute_db";

$conn = mysqli_connect($servername, $username, $password, $databasename);
 if($conn)
 {
  // echo '<script>alert("Connection is Done!")</script>'; 
 }
 else
 {
    echo "Connection faild".mysqli_connect_error();
 }
 
 ?>