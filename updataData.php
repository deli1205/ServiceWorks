<?php
$dsn = "localhost";
$user = "root" ; 
$password = "" ;
$tabname = $_GET["tabname"];
$qid = $_GET["qid"];
$conn = mysqli_connect($dsn,$user,$password);
mysqli_select_db($conn,"service");
mysqli_query($conn,"SET NAMES 'UTF8'");

if($tabname=="registrationtab")
{
	$result = mysqli_query($conn,"SELECT * FROM $tabname WHERE No='$qid'");
	if ($result==null)
	{
		echo "<li> 找不到資料 </li>";
		exit();
	}
	$row = mysqli_fetch_array($result);
	$a1=$row[1];
	$a2=$row[2];
	$a3=$row[3];
	$a4=$row[4];
	$a5=$row[5];

	echo "<div id=\"EditPanel\">";
//**********************************************
	$result = mysqli_query($conn,"SELECT * FROM yeartab");
	echo "<li>學年：<select id=\"inputYear\">";
	echo"<option>$a1</option>";
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
	echo"<option>$a2</option>";

	echo"<option> 上 </option>";
	echo"<option> 下 </option>";
	echo "</select></li>";


//**********************************************
	$result = mysqli_query($conn,"SELECT * FROM coursetab");
	echo "<li>課程：<select id=\"inputCid\">";
	$word = mysqli_query($conn,"SELECT * FROM coursetab WHERE CourseID='$a3'");
	$row = mysqli_fetch_array($word);
	echo"<option value=\"$a3\">$a3-$row[2]</option>";
	if ($result==null)
	{
		echo "<option> 找不到資料 </option></select></li>";
		exit();
	}	
	while($row = mysqli_fetch_array($result))
	{
		echo"<option value=\"$row[1]\">$row[1]-$row[2]</option>";
	}
	echo "</select></li>";


//**********************************************
	$result = mysqli_query($conn,"SELECT * FROM teachertab");
	echo "<li>開課教師：<select id=\"inputTid\">";
	$word = mysqli_query($conn,"SELECT * FROM teachertab WHERE TeacherID='$a4'");
	$row = mysqli_fetch_array($word);
	echo "<option value=\"$a4\">$a4-$row[2]</option>";
	if ($result==null)
	{
		echo "<option> 找不到資料 </option></select></li>";
		exit();
	}	
	while($row = mysqli_fetch_array($result))
	{
		echo"<option value=\"$row[1]\">$row[1]-$row[2]</option>";
	}
	echo "</select></li>";


//**********************************************
	$result = mysqli_query($conn,"SELECT * FROM classtab");
	echo "<li>上課班級：<select id=\"inputClassid\">";
	$word = mysqli_query($conn,"SELECT * FROM classtab WHERE ClassID='$a5'");
	$row = mysqli_fetch_array($word);
	echo"<option value=\"$a5\">$a5-$row[2]</option>";
	if ($result==null)
	{
		echo "<option> 找不到資料 </option></select></li>";
		exit();
	}	
	while($row = mysqli_fetch_array($result))
	{
		echo"<option value=\"$row[1]\">$row[1]-$row[2]</option>";
	}
	echo "</select></li>";

	echo "<li class=\"addbtn\"><input id=\"addbtn\" type=\"button\" onClick=\"UpdataRegistrationTab()\" value=\"save\"/></li>";
	echo "</div>";			

}


if($tabname=="yeartab")
	{
		$result = mysqli_query($conn,"SELECT * FROM $tabname WHERE No='$qid'");
		if ($result==null)
		{
			echo "<li> 找不到資料 </li>";
			exit();
		}
		$row = mysqli_fetch_array($result);
		echo " <div id=\"EditPanel\">
					<li>學年度:<input id=\"inputYear\" type=\"text\" value=\"$row[1]\"/></li>
					<li>學期:<input id=\"inputSeason\" type=\"text\" value=\"$row[2]\"/></li>
					<li>備註:<input id=\"inputNote\" type=\"text\" value=\"$row[3]\"/></li>
					<li class=\"addbtn\"><input id=\"addbtn\" type=\"button\" onClick=\"UpdataYearTab()\" value=\"save\"/></li>
				</div>";	
}


if($tabname=="classtab")
{
	$result = mysqli_query($conn,"SELECT * FROM $tabname WHERE ClassID='$qid'");
	if ($result==null)
	{
		echo "<li> 找不到資料 </li>";
		exit();
	}
	$row = mysqli_fetch_array($result);
	echo "	<div id=\"EditPanel\">
			<li>ID:<input id=\"inputID\" type=\"text\" value=\"$row[1]\"/></li>
			<li>班名:<input id=\"inputName\" type=\"text\" value=\"$row[2]\"/></li>
			<li>學年度:<input id=\"inputYear\" type=\"text\" value=\"$row[3]\"/></li>
			<li>隸屬學校:<input id=\"inputSchool\" type=\"text\" value=\"$row[4]\"/></li>
			<li>隸屬院所:<input id=\"inputDepartment\" type=\"text\" value=\"$row[5]\"/></li>
			<li>備註:<input id=\"inputNote\" type=\"text\" value=\"$row[6]\"/></li>
			<li class=\"addbtn\"><input id=\"addbtn\" type=\"button\" onClick=\"UpdataClassTab()\" value=\"save\"/></li>
		</div>";	
}
if($tabname=="coursetab")
{
	$result = mysqli_query($conn,"SELECT * FROM $tabname WHERE CourseID='$qid'");
	if ($result==null)
	{
		echo "<li> 找不到資料 </li>";
		exit();
	}
	$row = mysqli_fetch_array($result);
	echo "<div id=\"EditPanel\">
			<li>ID:<input id=\"inputID\" type=\"text\" value=\"$row[1]\"/></li>
			<li>課程名稱:<input id=\"inputName\" type=\"text\" value=\"$row[2]\"/></li>
			<li>備註:<input id=\"inputNote\" type=\"text\" value=\"$row[3]\"/></li>
			<li class=\"addbtn\"><input id=\"addbtn\" type=\"button\" onClick=\"UpdataCourseTab()\" value=\"save\"/></li>
		</div>";	
}

if($tabname=="studenttab")
{
	$status = $_GET["status"];
	$result = mysqli_query($conn,"SELECT * FROM $tabname WHERE StudnetID='$qid'");
	if ($result==null)
	{
		echo "<li> 找不到資料 </li>";
		exit();
	}
	$row = mysqli_fetch_array($result);
	if($status==2)
	{
			echo "<div id=\"EditPanel\">
			<li>學號(ID):<input id=\"inputID\" type=\"text\" value=\"$row[1]\"/></li>
			<li>姓名:<input id=\"inputName\" type=\"text\" value=\"$row[2]\"/></li>
			<li>手機:<input id=\"inputTele\" type=\"text\" value=\"$row[4]\"/></li>
			<li>Email:<input id=\"inputEmail\" type=\"text\" value=\"$row[5]\"/></li>
			<li>戶籍:<input id=\"inputAddr\" type=\"text\" value=\"$row[6]\"/></li>
			<li>備註:<input id=\"inputNote\" type=\"text\" value=\"$row[7]\"/></li>
			<li class=\"addbtn\"><input id=\"addbtn\" type=\"button\" onClick=\"UpdataStudentTab()\" value=\"save\"/></li>
		</div>";
	}
	else
	{
			echo "<div id=\"EditPanel\">
			<li>學號(ID):<input id=\"inputID\" type=\"text\" value=\"$row[1]\"/></li>
			<li>姓名:<input id=\"inputName\" type=\"text\" value=\"$row[2]\"/></li>
			<li>班級ID:<input id=\"inputClass\" type=\"text\" value=\"$row[3]\"/></li>
			<li>手機:<input id=\"inputTele\" type=\"text\" value=\"$row[4]\"/></li>
			<li>Email:<input id=\"inputEmail\" type=\"text\" value=\"$row[5]\"/></li>
			<li>戶籍:<input id=\"inputAddr\" type=\"text\" value=\"$row[6]\"/></li>
			<li>備註:<input id=\"inputNote\" type=\"text\" value=\"$row[7]\"/></li>
			<li class=\"addbtn\"><input id=\"addbtn\" type=\"button\" onClick=\"UpdataStudentTab()\" value=\"save\"/></li>
		</div>";
	}

}

if($tabname=="teachertab")
{
	$result = mysqli_query($conn,"SELECT * FROM $tabname WHERE TeacherID='$qid'");
	if ($result==null)
	{
		echo "<li> 找不到資料 </li>";
		exit();
	}
	$row = mysqli_fetch_array($result);
	echo "<div id=\"EditPanel\">
			<li>ID:<input id=\"inputID\" type=\"text\" value=\"$row[1]\"/></li>
			<li>姓名:<input id=\"inputName\" type=\"text\" value=\"$row[2]\"/></li>
			<li>Email:<input id=\"inputEmail\" type=\"text\" value=\"$row[3]\"/></li>
			<li>手機:<input id=\"inputTele\" type=\"text\" value=\"$row[4]\"/></li>
			<li>備註:<input id=\"inputNote\" type=\"text\" value=\"$row[5]\"/></li>
			<li class=\"addbtn\"><input id=\"addbtn\" type=\"button\" onClick=\"UpdataTeacherTab()\" value=\"save\"/></li>
		</div>";	
}

mysqli_close( $conn);
?>