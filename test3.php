<?php
$dsn = "localhost";
$user = "root" ; 
$password = "" ;
$tabname= $_GET["tabname"];
$act= $_GET["act"];
$l = (int)$_GET["l"];
$cnt = 1;
$conn = mysqli_connect($dsn,$user,$password);
mysqli_select_db($conn,"service");
//mysqli_query("SET NAMES 'UTF8'");

if ($tabname=="registrationtab")
{
//*****------新增資料-----*****************
	if($act=="add")
	{
		$d1 = $_GET["d1"]; 
		$d2 = $_GET["d2"]; 
		$d3 = $_GET["d3"]; 
		$d4 = $_GET["d4"]; 
		$d5 = $_GET["d5"]; 	
		mysql_query("INSERT INTO $tabname (No, Year, Season, CourseID, TeacherID, ClassID) VALUES (NULL, '$d1', '$d2', '$d3', '$d4', '$d5');");
	}	
//*****------修改資料-----*****************	
	if($act=="upda")
	{
		$qid = $_GET["qid"]; 
		$d1 = $_GET["d1"]; 
		$d2 = $_GET["d2"]; 
		$d3 = $_GET["d3"]; 
		$d4 = $_GET["d4"]; 
		$d5 = $_GET["d5"]; 
		mysql_query("UPDATE $tabname SET Year='$d1', Season='$d2', CourseID='$d3', TeacherID='$d4', ClassID='$d5' WHERE No='$qid'");		
	}
//*****------刪除資料-----*****************
	if($act=="del")
	{
		$qid = $_GET["qid"];		
		mysql_query("DELETE FROM $tabname WHERE No='$qid'");			
	}		
	//*****------查詢產生TABLE-----*****************
	$result = mysql_query("SELECT registrationtab.No, registrationtab.Year, registrationtab.Season, coursetab.CourseName ,teachertab.TeacherName,classtab.ClassName
							FROM registrationtab 
							JOIN coursetab ON registrationtab.CourseID=coursetab.CourseID
							JOIN teachertab ON registrationtab.TeacherID=teachertab.TeacherID
							JOIN classtab ON registrationtab.ClassID=classtab.ClassID");
	if ($result==null)
	{
		echo "<li> 找不到資料 </li>";
		exit();
	}
	$row_num = mysql_num_rows($result);
	$field_num = mysql_num_fields($result);
	echo "<table>";
	echo "	<tr>
				<th colspan=\"7\" onClick=\"addregistration2()\">
					<img id=\"add\" src=\"img/add.png\" title=\"新增\">
				</th>
			</tr>
			<tr>
				<th>No</th>
				<th>學年度</th>
				<th>學期</th>
				<th>課程名稱</th>
				<th>開課老師</th>
				<th>上課班級</th>
				<th>操作</th>
			</tr>
		";
	while($row = mysql_fetch_array($result))
	{
		echo "<tr id=\"$row[0]\" name=\"$cnt\" onClick=\"Select('registrationtab',2,this.id)\">";
		echo "<td>$cnt</td>"; 
		$cnt=$cnt+1;
		for($x=1;$x<$field_num;$x=$x+1)
		{  
			
			//$dbdata[$y][$x]=$row[$x];
			echo "<td> $row[$x]  </td>";
		}
		echo "<td colspan=\"$field_num\">
				<img onClick=\"updataregistration(this.name)\" name=\"$row[0]\" src=\"img/edit.png\" title=\"編輯\">
				<img onClick=\"DeleteRegistration(this.name)\" name=\"$row[0]\" src=\"img/delete.png\" title=\"刪除\">
			  </td>";
		echo "</tr>";
	}
	echo "</table>";
}



if ($tabname=="yeartab")
{
//*****------新增資料-----*****************
	if($act=="add")
	{
		$d1 = $_GET["d1"]; 
		$d2 = $_GET["d2"]; 
		$d3 = $_GET["d3"]; 		
		mysql_query("INSERT INTO $tabname (No, Year, Season, Note) VALUES (NULL, '$d1', '$d2', '$d3');");
	}	
//*****------修改資料-----*****************	
	if($act=="upda")
	{
		$qid = $_GET["qid"]; 
		$d1 = $_GET["d1"]; 
		$d2 = $_GET["d2"];
		$d3 = $_GET["d3"]; 
		mysql_query("UPDATE $tabname SET Year='$d1', Season='$d2', Note='$d3' WHERE No='$qid'");		
	}
//*****------刪除資料-----*****************
	if($act=="del")
	{
		$qid = $_GET["qid"];		
		mysql_query("DELETE FROM $tabname WHERE No='$qid'");			
	}		
//*****------查詢產生TABLE-----*****************
	$result = mysql_query("SELECT * FROM $tabname");
	if ($result==null)
	{
		echo "<li> 找不到資料 </li>";
		exit();
	}
	$row_num = mysql_num_rows($result);
	$field_num = mysql_num_fields($result);
	echo "<table>";
	echo "	<tr>
				<th colspan=\"5\" onClick=\"addyear()\">
					<img id=\"add\" src=\"img/add.png\" title=\"新增\">
				</th>
			</tr>
			<tr>
				<th>No</th>
				<th>學年度</th>
				<th>學期</th>
				<th>備註</th>
				<th>操作</th>
			</tr>
		";
	while($row = mysql_fetch_array($result))
	{
		echo "<tr id=\"$row[0]\" name=\"$cnt\" onClick=\"Select('yeartab',2,this.id)\">";
		echo "<td>$cnt</td>"; 
		$cnt=$cnt+1;
		for($x=1;$x<$field_num;$x=$x+1)
		{  
		//	$db_data[$y][$x]=$row[$x];
			echo "<td> $row[$x]  </td>";
		}
		echo "<td colspan=\"$field_num\">
				<img onClick=\"updatayear(this.name)\" name=\"$row[0]\" src=\"img/edit.png\" title=\"編輯\">
				<img onClick=\"DeleteYear(this.name)\" name=\"$row[0]\" src=\"img/delete.png\" title=\"刪除\">
			  </td>";
		echo "</tr>";
	}
	echo "</table>";
}
  
  
  
if ($tabname=="classtab")
{
//*****------新增資料-----*****************
	if($act=="add")
	{
		$d1 = $_GET["d1"]; 
		$d2 = $_GET["d2"]; 
		$d3 = $_GET["d3"]; 
		$d4 = $_GET["d4"]; 
		$d5 = $_GET["d5"]; 
		$d6 = $_GET["d6"];
		mysql_query("INSERT INTO classtab (No, ClassID, ClassName, Year, School, Department, Note) VALUES (NULL, '$d1', '$d2', '$d3', '$d4', '$d5', '$d6');");
	}	
//*****------修改資料-----*****************	
	if($act=="upda")
	{
		$qid = $_GET["qid"]; 
		$d1 = $_GET["d1"]; 
		$d2 = $_GET["d2"]; 
		$d3 = $_GET["d3"]; 
		$d4 = $_GET["d4"]; 
		$d5 = $_GET["d5"]; 
		$d6 = $_GET["d6"];
		mysql_query("UPDATE classtab SET ClassID='$d1', ClassName='$d2', Year='$d3', School='$d4', Department='$d5', Note='$d6' WHERE  ClassID='$qid'");		
	}
//*****------刪除資料-----*****************
	if($act=="del")
	{
		$cid = $_GET["cid"];		
		mysql_query("DELETE FROM classtab WHERE ClassID='$cid'");			
	}
//*****------查詢產生TABLE-----*****************
	$result = mysql_query("SELECT * FROM $tabname");
	if ($result==null)
	{
		echo "<li> 找不到資料 </li>";
		exit();
	}
	$row_num = mysql_num_rows($result);
	$field_num = mysql_num_fields($result);
	echo "<table>";
	echo "	<tr>
				<th colspan=\"8\" onClick=\"addclass()\">
					<img id=\"add\" src=\"img/add.png\" title=\"新增\">
				</th>
			</tr>
			<tr>
				<th>No</th>
				<th>ID</th>
				<th>班名</th>
				<th>學年度</th>
				<th>隸屬學校</th>
				<th>隸屬院所</th>
				<th>備註</th>
				<th>操作</th>
			</tr>
		";
	while($row = mysql_fetch_array($result))
	{
		echo "<tr id=\"$row[1]\" name=\"$cnt\" onClick=\"Select('studenttab',2,this.id)\">";
		echo "<td>$cnt</td>"; 
		$cnt=$cnt+1;
		for($x=1;$x<$field_num;$x=$x+1)
		{  
		//	$db_data[$y][$x]=$row[$x];
			echo "<td> $row[$x]  </td>";
		}
		echo "<td colspan=\"$field_num\">
				<img onClick=\"updataclass(this.name)\" name=\"$row[1]\" src=\"img/edit.png\" title=\"編輯\">
				<img onClick=\"showlist('studenttab',2,this.name)\" name=\"$row[1]\" src=\"img/student.png\" title=\"學生名單\">
				<img onClick=\"DeleteClass(this.name)\" name=\"$row[1]\" src=\"img/delete.png\" title=\"刪除\">
			  </td>";
		echo "</tr>";
	}
	echo "</table>";
}




if ($tabname=="coursetab")
{
//*****------新增資料-----*****************
	if($act=="add")
	{
		$d1 = $_GET["d1"]; 
		$d2 = $_GET["d2"]; 
		$d3 = $_GET["d3"]; 
		mysql_query("INSERT INTO coursetab (No, CourseID, CourseName, Note) VALUES (NULL, '$d1', '$d2', '$d3');");
	}	
//*****------修改資料-----*****************	
	if($act=="upda")
	{
		$qid = $_GET["qid"]; 
		$d1 = $_GET["d1"]; 
		$d2 = $_GET["d2"]; 
		$d3 = $_GET["d3"]; 
		mysql_query("UPDATE coursetab SET CourseID='$d1', CourseName='$d2', Note='$d3' WHERE CourseID='$qid'");		
	}
//*****------刪除資料-----*****************
	if($act=="del")
	{
		$qid = $_GET["qid"];		
		mysql_query("DELETE FROM coursetab WHERE CourseID='$qid'");			
	}
//*****------查詢產生TABLE-----*****************
	$result = mysqli_query("SELECT * FROM $tabname");
	if ($result==null)
	{
		echo "<li> 找不到資料 </li>";
		exit();
	}
	$row_num = mysql_num_rows($result);
	$field_num = mysql_num_fields($result);
	echo "<table>";
	echo "	<tr>
				<th colspan=\"8\" onClick=\"addcourse()\">
				<img id=\"add\" src=\"img/add.png\" title=\"新增\"></th>
			</tr>		
			<tr>
				<th>No</th>
				<th>ID</th>
				<th>課程名稱</th>
				<th>備註</th>
				<th>操作</th>
			</tr>";
	while($row = mysql_fetch_array($result))
	{
		echo "<tr id=\"$row[1]\" name=\"$cnt\" onClick=\"Select('sp',2,this.id)\">";
		echo "<td>$cnt</td>"; 
		$cnt=$cnt+1;
		for($x=1;$x<$field_num;$x=$x+1)
		{  
		//	$db_data[$y][$x]=$row[$x];
			echo "<td> $row[$x] </td>";
		}
		echo "	<td colspan=\"$field_num\">
					<img onClick=\"updatacourse(this.name)\" name=\"$row[1]\" src=\"img/edit.png\" title=\"編輯\">
					<img onClick=\"DeleteCourse(this.name)\" name=\"$row[1]\" src=\"img/delete.png\" title=\"刪除\">
				</td>";
		echo "</tr>";
	}
	echo "</table>";
}




if ($tabname=="studenttab")
{
//*****------新增資料-----*****************
	if($act=="add")
	{
		$d1 = $_GET["d1"]; 
		$d2 = $_GET["d2"]; 
		$d3 = $_GET["d3"]; 
		$d4 = $_GET["d4"]; 
		$d5 = $_GET["d5"]; 
		$d6 = $_GET["d6"];
		$d7 = $_GET["d7"];		
		mysql_query("INSERT INTO $tabname (No, StudnetID, StudentName, ClassID, TELE, Email, Addr, Note) VALUES (NULL, '$d1', '$d2', '$d3', '$d4', '$d5', '$d6', '$d7');");
	}	
//*****------修改資料-----*****************	
	if($act=="upda")
	{
		$qid = $_GET["qid"]; 
		$d1 = $_GET["d1"]; 
		$d2 = $_GET["d2"]; 
		$d3 = $_GET["d3"]; 
		$d4 = $_GET["d4"]; 
		$d5 = $_GET["d5"]; 
		$d6 = $_GET["d6"];
		$d7 = $_GET["d7"];
		mysql_query("UPDATE $tabname SET StudnetID='$d1', StudentName='$d2', ClassID='$d3', TELE='$d4', Email='$d5', Addr='$d6', Note='$d7' WHERE StudnetID='$qid'");		
	}
//*****------刪除資料-----*****************
	if($act=="del")
	{
		$qid = $_GET["qid"];		
		mysql_query("DELETE FROM $tabname WHERE StudnetID='$qid'");			
	}	
//*****------查詢產生TABLE-----*****************
	$result = mysql_query("SELECT * FROM $tabname");
	if ($result==null)
	{
		echo "<li> 找不到資料 </li>";
		exit();
	}
	$row_num = mysql_num_rows($result);
	$field_num = mysql_num_fields($result);	
	$status = $_GET["status"];
	echo "<table>";
	if($status==2)
	{
		$t = $_GET["t"];
		$result = mysql_query("SELECT * FROM $tabname WHERE ClassID='$t'");
		if ($result==null)
		{
			echo "<li> 找不到資料 </li>";
			exit();
		}
		$row_num = mysql_num_rows($result);
		$field_num = mysql_num_fields($result);
	}
	for($x=0;$x<$l;$x=$x+1)
	{  
		echo "<tr id=\"space\"> <th class=\"space\"></th> </tr>";
	}
	echo "	<tr>
				<th colspan=\"9\" onClick=\"addstudent()\">
				<img id=\"add\" src=\"img/add.png\" title=\"新增\"></th>
			</tr>	
			<tr>
				<th>No</th>
				<th>ID</th>
				<th>姓名</th>
				<th>班級</th>
				<th>手機</th>
				<th>Email</th>
				<th>戶籍</th>
				<th>備註</th>
				<th>操作</th>
			</tr>";
	while($row = mysql_fetch_array($result))
	{	
		if($status==2)
		{
			echo "<tr id=$row[1] name=\"$cnt\" onClick=\"Select('null',3,this.id)\">";
		}
		else
		{
			echo "<tr id=$row[1] name=\"$cnt\" onClick=\"Select('null',2,this.id)\">";
		}
		echo "<td>$cnt</td>"; $cnt=$cnt+1;
		for($x=1;$x<$field_num;$x=$x+1)
		{  
		//	$db_data[$y][$x]=$row[$x];
			echo "<td> $row[$x] </td>";
		}
		echo "<td colspan=\"$field_num\">
					<img onClick=\"updatastudent(this.name)\" name=\"$row[1]\" src=\"img/edit.png\" title=\"編輯\">
					<img onClick=\"DeleteStudent(this.name)\" name=\"$row[1]\" src=\"img/delete.png\" title=\"刪除\"> 
			  </td>";		
		echo "</tr>";
	}
	echo "</table>";
}





if ($tabname=="teachertab")
{
//*****------新增資料-----*****************
	if($act=="add")
	{
		$d1 = $_GET["d1"]; 
		$d2 = $_GET["d2"]; 
		$d3 = $_GET["d3"]; 
		$d4 = $_GET["d4"]; 
		$d5 = $_GET["d5"]; 	
		mysql_query("INSERT INTO $tabname (No, TeacherID, TeacherName, Email, TELE, Note) VALUES (NULL, '$d1', '$d2', '$d3', '$d4', '$d5');");
	}	
//*****------修改資料-----*****************	
	if($act=="upda")
	{
		$qid = $_GET["qid"]; 
		$d1 = $_GET["d1"]; 
		$d2 = $_GET["d2"]; 
		$d3 = $_GET["d3"]; 
		$d4 = $_GET["d4"]; 
		$d5 = $_GET["d5"]; 
		mysql_query("UPDATE $tabname SET TeacherID='$d1', TeacherName='$d2', Email='$d3', TELE='$d4', Note='$d5' WHERE TeacherID='$qid'");		
	}
//*****------刪除資料-----*****************
	if($act=="del")
	{
		$qid = $_GET["qid"];		
		mysql_query("DELETE FROM $tabname WHERE TeacherID='$qid'");			
	}		
//*****------查詢產生TABLE-----*****************
	$result = mysql_query("SELECT * FROM $tabname");
	if ($result==null)
	{
		echo "<li> 找不到資料 </li>";
		exit();
	}
	$row_num = mysql_num_rows($result);
	$field_num = mysql_num_fields($result);
	echo "<table>";
	echo "	<tr>
				<th colspan=\"9\" onClick=\"addteacher()\">
				<img id=\"add\" src=\"img/add.png\" title=\"新增\"></th>
			</tr>
			<tr>
				<th>No</th>
				<th>ID</th>
				<th>姓名</th>
				<th>Email</th>
				<th>手機</th>
				<th>備註</th>
				<th>操作</th>
			</tr>";
	while($row = mysql_fetch_array($result))
	{
		echo "<tr id=$row[1] name=\"$cnt\" onClick=\"Select('null',2,this.id)\">";
		echo "<td>$cnt</td>"; $cnt=$cnt+1;
		for($x=1;$x<$field_num;$x=$x+1)
		{  
		//	$db_data[$y][$x]=$row[$x];
			echo "<td> $row[$x]  </td>";
		}
		echo "<td colspan=\"$field_num\">
					<img onClick=\"updatateacher(this.name)\" name=\"$row[1]\" src=\"img/edit.png\" title=\"編輯\">
					<img onClick=\"DeleteTeacher(this.name)\" name=\"$row[1]\" src=\"img/delete.png\" title=\"刪除\">
			  </td>";		
		echo "</tr>";
	}
	echo "</table>";
}
  
mysql_close( $conn);
?>




