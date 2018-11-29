<?php
$dsn = "localhost";
$user = "root" ; 
$password = "" ;
$conn = mysqli_connect($dsn,$user,$password);
mysqli_select_db($conn,"service");
mysqli_query($conn,"SET NAMES 'UTF8'");

echo "<div id=\"EditPanel\">";
//**********************************************
$result = mysqli_query($conn,"SELECT * FROM yeartab");
echo "<li>學年：<select id=\"inputYear\">";
echo"<option>  </option>";
if ($result==null)
{
	echo "<option > 找不到資料 </option></select></li>";
	exit();
}	
while($row = mysqli_fetch_array($result))
{
	echo"<option> $row[1] </option>";
}
echo "</select></li>";


//**********************************************
$result = mysqli_query($conn,"SELECT * FROM yeartab");
echo "<li>學期：<select id=\"inputSeason\">";
echo"<option>  </option>";

echo"<option> 1 </option>";
echo"<option> 2 </option>";
echo "</select></li>";


//**********************************************
$result = mysqli_query($conn,"SELECT * FROM coursetab");
echo "<li>課程：<select id=\"inputCid\">";
echo"<option>  </option>";
if ($result==null)
{
	echo "<option > 找不到資料 </option></select></li>";
	exit();
}	
while($row = mysqli_fetch_array($result))
{
	echo"<option value=\"$row[1]\">$row[1] $row[2] </option>";
}
echo "</select></li>";


//**********************************************
$result = mysqli_query($conn,"SELECT * FROM teachertab");
echo "<li>開課教師：<select id=\"inputTid\">";
echo "<option>  </option>";
if ($result==null)
{
	echo "<option value=\"$row[1]\"> 找不到資料 </option></select></li>";
	exit();
}	
while($row = mysqli_fetch_array($result))
{
	echo"<option value=\"$row[1]\">$row[1] $row[2] </option>";
}
echo "</select></li>";


//**********************************************
$result = mysqli_query($conn,"SELECT * FROM classtab");
echo "<li>上課班級：<select id=\"inputClassid\">";
echo"<option value=\"$row[1]\">  </option>";
if ($result==null)
{
	echo "<option > 找不到資料 </option></select></li>";
	exit();
}	
while($row = mysqli_fetch_array($result))
{
	echo"<option value=\"$row[1]\">$row[1] $row[2] </option>";
}
echo "</select></li>";

echo "<li class=\"addbtn\"><input id=\"addbtn\" type=\"button\" onClick=\"AddtoRegistrationTab()\" value=\"save\"/></li>";
echo "</div>";
			
mysqli_close( $conn);
?>
