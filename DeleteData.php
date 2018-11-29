<?php
$dsn = "localhost";
$user = "root" ; 
$password = "" ;
$t = $_GET["t"];  
$conn = mysqli_connect($dsn,$user,$password);
mysqli_select_db($conn,"service");
mysqli_query($conn,"SET NAMES 'UTF8'");
mysqli_query($conn,"DELETE FROM classtab WHERE ClassID='$t'");
mysqli_close( $conn);
?>