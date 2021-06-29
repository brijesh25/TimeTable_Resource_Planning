
<?php require_once "check_login.php"; ?>
<html>
<head>
<title>MANAGE FACULTY</title>
<style>


</style>

<script type="text/javascript">
function validate()
{
	//to confirm user want to update timetable
	choice=confirm("Selected Faculties will be deleted ,Do you want to proceed ?");
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
<h1>DELETE FACULTY</h1>
<a href="managefaculty.php"><button type="button" class="button">Back</button></a><br><br>
</article>
<?php
	
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"timetable");
$sql="select teacher_name,teacher_id from teacher where user_type='faculty';";
$teacherlist=mysqli_query($con,$sql);
echo "<form name='selectfaculty' action='web_remove_faculty.php' method='POST' onsubmit='return validate()' ><table border=5 cellpadding=5 class='maintable' >";
for($j=0;$j<mysqli_num_rows($teacherlist);$j++)
		{
			$t_row=mysqli_fetch_array($teacherlist);
			echo "<tr><td>".$t_row['teacher_name']."</td>
			<td><input type='checkbox' name='t[]' value='".$t_row['teacher_id']."'></td></tr>";
			//using array name as checkbox name will submit an array of checked values on submition
		}
echo "<tr><td><input type='submit' name='submit' value='Submit' class='button'></td>
<td><input type='reset' name='reset' value='Reset' class='button'></td></tr>
</table></form>";		
mysqli_close($con);
	
?>
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