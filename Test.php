<?php
$dsn = "localhost";
$user = "root" ; 
$password = "" ;
$conn = mysql_connect($dsn,$user,$password);
$q = $_GET["q"];
$l = (int)$_GET["l"];
$status = $_GET["status"];
mysql_select_db("service",$conn);
mysql_query("SET NAMES 'UTF8'");
if($status==2)
{
	$t = $_GET["t"];
	$result = mysql_query("SELECT * FROM $q WHERE ClassID='$t'");
}
else
{
	$result = mysql_query("SELECT * FROM $q");
}

if ($result==null)
{
	echo "<li> 找不到資料 </li>";
	exit();
}

$row_num = mysql_num_rows($result);
$field_num = mysql_num_fields($result);

$cnt = 1;
echo "<table>";  
if ($q=="classtab")
{
	echo "<tr><th colspan=\"8\" onClick=\"addclass()\"><img id=\"add\" src=\"img/add.png\" title=\"新增\"></th></tr>";
	echo "<tr><th>No</th><th>ID</th><th>班名</th><th>學年度</th><th>隸屬學校</th><th>隸屬院所</th><th>備註</th><th>操作</th></tr>";
	while($row = mysql_fetch_array($result))
	{
		echo "<tr id=\"$row[1]\" name=\"$cnt\" onClick=\"Select('studenttab','status3',this.id)\">";
		echo "<td>$cnt</td>"; $cnt=$cnt+1;
		for($x=1;$x<$field_num;$x=$x+1)
		{  
		//	$db_data[$y][$x]=$row[$x];
			echo "<td> $row[$x]  </td>";
		}
		echo "<td colspan=\"$field_num\">
				<img onClick=\"updataclass(this.name)\" name=\"$row[1]\" src=\"img/edit.png\" title=\"編輯\">
				<img onClick=\"showlist('studenttab','status3',this.name)\" name=\"$row[1]\" src=\"img/student.png\" title=\"學生名單\">
				<img onClick=\"DeleteData(this.name)\" name=\"$row[1]\" src=\"img/delete.png\" title=\"刪除\">
			</td>";
		echo "</tr>";
	}
}

if ($q=="coursetab")
{
	echo "<tr><th colspan=\"8\"><img id=\"add\" src=\"img/add.png\" title=\"新增\"></th></tr>";		
	echo "<tr><th>No</th><th>ID</th><th>課程名稱</th><th>學年度</th><th>老師ID</th><th>學期</th><th>備註</th><th>操作</th></tr>";
	while($row = mysql_fetch_array($result))
	{
		echo "<tr id=\"$row[1]\" name=\"$cnt\" onClick=\"Select('sp','status3',this.id)\">";
		echo "<td>$cnt</td>"; $cnt=$cnt+1;
		for($x=1;$x<$field_num;$x=$x+1)
		{  
		//	$db_data[$y][$x]=$row[$x];
			if($x==6){}
			else{echo "<td> $row[$x] </td>";}
		}
		echo "<td colspan=\"$field_num\"><img onClick=\"editcourse()\" id=\"add\" src=\"img/edit.png\" title=\"編輯\"><img id=\"add\" src=\"img/delete.png\" title=\"刪除\"></td>";
		echo "</tr>";
	}
}

if ($q=="studenttab")
{	
	for($x=0;$x<$l;$x=$x+1)
	{  
		echo "<tr> <th id=\"space\"> $x </th> </tr>";
	}
	echo "<tr><th colspan=\"9\"><img id=\"add\" src=\"img/add.png\" title=\"新增\"></th></tr>";	
	echo "<tr><th>No</th><th>ID</th><th>姓名</th><th>班級</th><th>手機</th><th>Email</th><th>戶籍</th><th>備註</th><th>操作</th></tr>";
	while($row = mysql_fetch_array($result))
	{
		echo "<tr id=$row[1] name=\"$cnt\" onClick=\"Select('null','status3',this.id)\">";
		echo "<td>$cnt</td>"; $cnt=$cnt+1;
		for($x=1;$x<$field_num;$x=$x+1)
		{  
		//	$db_data[$y][$x]=$row[$x];
			echo "<td> $row[$x] </td>";
		}
		echo "<td colspan=\"$field_num\"><img onClick=\"editstudent()\" id=\"add\" src=\"img/edit.png\" title=\"編輯\"><img id=\"add\" src=\"img/delete.png\" title=\"刪除\"></td>";		
		echo "</tr>";
	}


}

if ($q=="teachertab")
{
	echo "<tr><th colspan=\"8\" ><img id=\"add\" src=\"img/add.png\" title=\"新增\"></th></tr>";	
	echo "<tr><th>No</th><th>ID</th><th>姓名</th><th>Email</th><th>手機</th><th>備註</th><th>操作</th></tr>";
	while($row = mysql_fetch_array($result))
	{
		echo "<tr id=$row[1] name=\"$cnt\" onClick=\"Select('null','status3',this.id)\">";
		echo "<td>$cnt</td>"; $cnt=$cnt+1;
		for($x=1;$x<$field_num;$x=$x+1)
		{  
		//	$db_data[$y][$x]=$row[$x];
			echo "<td> $row[$x]  </td>";
		}
		echo "<td colspan=\"$field_num\"><img onClick=\"editteacher()\" id=\"add\" src=\"img/edit.png\" title=\"編輯\"><img id=\"add\" src=\"img/delete.png\" title=\"刪除\"></td>";		
		echo "</tr>";
	}
}

echo "</table>";  

mysql_close( $conn);
?>




