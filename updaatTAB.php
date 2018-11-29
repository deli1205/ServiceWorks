<?php
$dsn = "localhost";
$user = "root" ; 
$password = "" ;
$conn = mysql_connect($dsn,$user,$password);
$d1 = $_GET["d1"]; 
$d2 = $_GET["d2"]; 
$d3 = $_GET["d3"]; 
$d4 = $_GET["d4"]; 
$d5 = $_GET["d5"]; 
$d6 = $_GET["d6"]; 
$status = $_GET["status"];
mysql_select_db("service",$conn);
mysql_query("SET NAMES 'UTF8'");
mysql_query("UPDATE classtab SET ClassID='$d1', ClassName='$d2', Year='$d3', School='$d4', Department='$d5', Note='$d6';
mysql_close( $conn);
?>