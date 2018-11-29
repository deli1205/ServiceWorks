<?php
$dsn = "localhost:23390";
$user = "mmlab" ; 
$password = "niucs" ;
$conn = mysql_connect($dsn,$user,$password);
mysql_select_db("service",$conn);
mysql_query("SET NAMES 'UTF8'");
$result = mysql_query("SELECT * FROM classtab");
$row_num = mysql_num_rows($result);
$field_num = mysql_num_fields($result); 
while($row = mysql_fetch_array($result))
  {
		echo "<li> $row[2] </li>";
  }

mysql_close( $conn);
?>






