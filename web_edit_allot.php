<?php require_once "check_login.php"; ?>
<html>
<head>
<title>SUBJECT ALLOTMENT</title>
<style>

table{
	border-collapse: collapse;
	
}

th,td{
	text-align: left;
}
th{
	background-color: #0288D1;
	color: white;
}

tr:nth-child(even){
	background-color: #81d4fa;
}

</style>

<script type="text/javascript">
function validate()
{
	//to confirm user want to update timetable
	choice=confirm("Update Allotment ?");
	//alert(choice);
	return choice;
}
</script>

<link rel="stylesheet" type="text/css" href="SideBarNavigation.css"> 
<link rel="stylesheet" type="text/css" href="header-footer.css"> 
<link rel="stylesheet" type="text/css" href="Content_and_Button.css"> 
</head>
<body>
 
<!--MENU-->
<?php
require_once "web_menu.php";
?>

<div>
<div id="content">
<article>
<h1>EDIT SUBJECT ALLOTMENT</h1>
<a href="web_suballot.php"><button type="button" class="button">BACK</button></a>
<div align=center>
<?php
$semester=$_GET['semester'];
$section=$_GET['section'];
echo "<h3>Semester = ".$semester." Section = ".$section."</h3>";
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"timetable");

$sql="select subject_name,teacher_name from 
			subject_master natural join teacher_subject natural join teacher 
			where semester=".$semester." and section='".$section."' ;";
$exist_result=mysqli_query($con,$sql);

echo "<table class='maintable' cellpadding=5 class='maintable'>
		<tr>
		<th>Subject Name</th>
		<th>Teacher Name</th>
		</tr>";
	if(mysqli_num_rows($exist_result)!=0)
	{
		$sql_1="select subject_id,subject_name from subject_master where semester=".$semester." order by subject_id asc";
		$result=mysqli_query($con,$sql_1);

		$sql_2="select teacher_id,teacher_name from teacher where user_type='faculty';";
		$teacherlist=mysqli_query($con,$sql_2);
		if(mysqli_num_rows($result)!=0)
		{
			echo "<form name='edit_allot_form' action='web_update_allot.php' method='POST' onsubmit='return validate()'>
			<input type='hidden' name='semester' value=".$semester.">
			<input type='hidden' name='section' value=".$section.">";
			
			for($i=0;$i<mysqli_num_rows($result);$i++)
			{
				$row=mysqli_fetch_array($result);
				echo "<tr>
				<td>".$row['subject_name']."</td>
				<td>
				<select name='t[]' required><option value=''>Select</option>";
				mysqli_data_seek($teacherlist,0);
				for($j=0;$j<mysqli_num_rows($teacherlist);$j++)
				{
					$t_row=mysqli_fetch_array($teacherlist);
					echo "<option value='".$t_row['teacher_id']."'>".$t_row['teacher_name']."</option>";
				}
				echo "</select>
				</td>
				</tr>";
			}
			
			echo "<tr><td></td><td colspan=2><input type='submit' name='submit' value='Save' class='button' align='center'></td></tr></form>";
			
		}
	}
	else
	{
		echo "<tr><td colspan='2' align=center>No Allotment Found</td><tr>";
	}
echo "</table>";
mysqli_close($con);
?>
</div>
</article>
</div>

		<?php
		require_once "web_right_sidebar.php";
		?>
</div>

<div id="footer">     	   	
Copyright © BIT DURG || Website Design & Maintain by <span style="color: red">CSE Department</span>  
</div> 
</body>          
</Html>