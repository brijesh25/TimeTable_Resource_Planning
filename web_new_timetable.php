
<?php require_once "check_login.php"; ?>
<html>
<head>
<title>TIMETABLE</title>
<style>


</style>
<script type="text/javascript">
function validate()
{
	//to confirm user want to insert timetable
	choice=confirm("New Timetable will be Added ,Do you want to proceed ?");
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
<h1>NEW TIMETABLE</h1>

<?php
if(isset($_POST['semester'])&&isset($_POST['section']))
{

$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"timetable");

$semester=$_POST['semester'];
$section=$_POST['section'];
echo "<h3>Semester = ".$semester." Section = ".$section."</h3>";

$num_periods=$_POST['num_periods'];

$sql="select period from timetable where semester=".$semester." and section='".$section."' ;" ;
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{
	echo "Timetable already exists for semester =".$semester." section=".$section;
	echo "<br><br><a href='web_edit_timetable_form.php?semester=".$semester."&section=".$section."' >
	Edit Timetable for Semester = ".$semester." Section= ".$section."</a>";
}
else
{
?>


<table border=5 cellpadding=5 class='maintable'  align=center >
<form id="newtimetable" name="newtimetable" action="web_save_timetable.php" method="POST" onsubmit="return validate()">

<?php
echo "<input type='hidden' name='semester' value='".$semester."'>
<input type='hidden' name='section' value='".$section."'>";
?>

<tr>
<th>S.No.</th>
<th>Period No.</th>
<th>Period_Time</th>
<th>Monday</th>
<th>Tuesday</th>
<th>Wednesday</th>
<th>Thursday</th>
<th>Friday</th>
<th>Saturday</th>
</tr>

<?php
$j=1;//for period no.
$get_subject_sql="select * from subject_master where semester=".$semester.";";
$subject_result=mysqli_query($con,$get_subject_sql);
$subject_list="<option value=''>Select</option>\n<option value='RECESS'>--RECESS--</option>\n";
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
//for prefilled time
$ptime=date('10:00:00');
for($i=1;$i<=($num_periods + 1);$i++)
{
echo "<tr><td>".$i."</td>";
if($i==5)
{
	echo "<td><input type='text' name='p[]'   value='0' size='8' ></td>";
	
}
else
{
	echo "<td><input type='text' name='p[]'   value='".$j++."' size='8' ></td>";
}
echo"<td><input type='text' name='pt[]'  value=".$ptime." size='10' ></td>";
$ptime_new=strtotime('+50 minute',strtotime($ptime));
	$ptime_new = date ( 'h:i:s' , $ptime_new );
	$ptime=$ptime_new;
echo "\n<td><select  name='m[]' required>\n".$subject_list."</td>"
	."\n<td><select  name='t[]' required>\n".$subject_list."</td>"
	."\n<td><select  name='w[]' required>\n".$subject_list."</td>"
	."\n<td><select  name='th[]' required>\n".$subject_list."</td>"
	."\n<td><select  name='f[]' required>\n".$subject_list."</td>"
	."\n<td><select  name='s[]' required>\n".$subject_list."</td>"
	."</tr>";
/*<td><input type='text' name='m[]'    size='10' ></td>
<td><input type='text' name='t[]'    size='10' value='""'></td>
<td><input type='text' name='w[]'    size='10' ></td>
<td><input type='text' name='th[]'   size='10' ></td>
<td><input type='text' name='f[]'    size='10' ></td>
<td><input type='text' name='s[]'    size='10' ></td>
</tr>";*/
}
echo "<tr><td colspan='9' style='text-align:center;'>
<input type='submit' name='submit' value='SAVE' style='font-size:20px;width:50%;' class='button'>
</td></tr>";
?>

</form>
</table>
<?php
}//end of inner else

}//end of outer if

?>

</article>
</div>

		<?php
		require_once "web_right_sidebar.php";
		mysqli_close($con);
		?>
</div>

<div id="footer">     	   	
Copyright © BIT DURG || Website Design & Maintain by <span style="color: red">CSE Department</span>  
</div> 
</body>          
</Html>
