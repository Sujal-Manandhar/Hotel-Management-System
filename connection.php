<?php 
ini_set('display_errors', 0);
error_reporting(0);
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");
header("X-Content-Type-Options: nosniff");
$con=mysqli_connect("localhost","root","","hotel") or die('DATABASE connection failed');
?>