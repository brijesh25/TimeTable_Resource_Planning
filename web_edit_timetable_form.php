<?php require_once "check_login.php"; ?>
<html>
<head>
<title>TIME TABLE</title>
<style>


</style>
<script type="text/javascript">
function validate()
{
	//to confirm user want to update timetable
	choice=confirm("Timetable will be updated,Do you want to proceed ?");
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
<h1>Update Timetable</h1>
<a href="web_timetable.php"><button type="button" class="button">BACK</button></a>
<div align="center">
<?php
if(isset($_REQUEST['semester'])&&isset($_REQUEST['section']))
{

$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"timetable");

$semester=$_REQUEST['semester'];
$section=$_REQUEST['section'];
echo "<h3>Semester = ".$semester." Section = ".$section."</h3>";

$sql="select * from timetable where semester=".$semester." and section='".$section."' order by id asc ;" ;
$result=mysqli_query($con,$sql);

$get_subject_sql="select * from subject_master where semester=".$semester.";";
$subject_result=mysqli_query($con,$get_subject_sql);
$subject_list="<option value=''>Select</option>\n<option value='RECESS'>RECESS</option>\n";
if(!$subject_result)
{
	$subject_list=$subject_list."<option value=''>subjects not found</option>";
}
else
{
	for($k=0;$k<mysqli_num_rows($subject_result);$k++)
	{
		if($subject_row=mysqli_fetch_array($subject_result))
		{
		$subject_list=$subject_list."<option value='".$subject_row['subject_name']."'>"
									.$subject_row['subject_name']
									." - ".$subject_row['subject_fullname']."</option>\n";
		}
	}
}



echo "<table cellpadding=5 class='maintable'>
<tr>
<th>Period No.</th>
<th>Period_Time</th>
<th>Monday</th>
<th>Tuesday</th>
<th>Wednesday</th>
<th>Thursday</th>
<th>Friday</th>
<th>Saturday</th>
</tr>";
if(mysqli_num_rows($result)!=0)
{
	echo "<form action='web_update_timetable.php' method='POST' onsubmit='return validate()'>
	<input type='hidden' name='semester' value='".$semester."'>
	<input type='hidden' name='section' value='".$section."'>
	";
	for($i=1;$i<=mysqli_num_rows($result);$i++)
	{
		$row=mysqli_fetch_array($result);

		echo "<tr>
		<td><input type='text' name='p[]' required value='".$row['period']."'    size='2' ></td>
		<td><input type='text' name='pt[]' required value='".$row['ptime']."'     size='10' ></td>";
		echo "\n<td><select  name='m[]' required >\n".$subject_list."\n<option value='".$row['monday']."' selected >".$row['monday']."</option></td>"
				."\n<td><select  name='t[]' required>\n".$subject_list."\n<option value='".$row['monday']."' selected >".$row['tuesday']."</option></td>"
				."\n<td><select  name='w[]' required>\n".$subject_list."\n<option value='".$row['monday']."' selected >".$row['wednesday']."</option></td>"
				."\n<td><select  name='th[]' required>\n".$subject_list."\n<option value='".$row['monday']."' selected >".$row['thursday']."</option></td>"
				."\n<td><select  name='f[]' required>\n".$subject_list."\n<option value='".$row['monday']."' selected >".$row['friday']."</option></td>"
				."\n<td><select  name='s[]' required>\n".$subject_list."\n<option value='".$row['monday']."' selected >".$row['saturday']."</option></td>"
				."</tr>";
		/*"<td><input type='text' name='m[]'  value='".$row['monday']."'    size='10' ></td>
		<td><input type='text' name='t[]'  value='".$row['tuesday']."'   size='10' ></td>
		<td><input type='text' name='w[]'  value='".$row['wednesday']."' size='10' ></td>
		<td><input type='text' name='th[]' value='".$row['thursday']."'  size='10' ></td>
		<td><input type='text' name='f[]'  value='".$row['friday']."'    size='10' ></td>
		<td><input type='text' name='s[]'  value='".$row['saturday']."'  size='10' ></td>
		</tr>";*/

	}
	echo "<tr><td></td><td></td><td></td><td align=center colspan='8' >
	<input type='submit' name='submit' value='update' style='font-size:20px;width:50%; align='center'' class='button'>
	</td></tr>
	</form>";
}
else
{
	echo "<tr><td colspan='8' align=center>No Timetable Found</td><tr>";
}
echo "</table>";
mysqli_close($con);
}

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