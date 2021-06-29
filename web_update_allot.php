<?php require_once "check_login.php"; ?>
<html>
<head>
<title>SUBJECT ALLOTMENT</title>
<style>

</style>
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
<h1>UPDATE SUBJECT ALLOTMENT</h1>
<a href="web_suballot.php"><button type="button" class="button">BACK</button></a>

<?php
$semester=$_POST['semester'];
$section=$_POST['section'];
$tlist=$_POST['t'];


$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"timetable");

//$sql="select tsrelation_id,subject_id,teacher_id,subject_name,teacher_name from 
//			subject_master natural join teacher_subject natural join teacher 
//			where semester=".$semester." and section='".$section."' order by tsrelation_id asc"; //dont use
$sql="select subject_id,subject_name from subject_master where semester=".$semester." order by subject_id asc";
$result=mysqli_query($con,$sql);
$num_rows_fail=0;

for($i=0;$i<=mysqli_num_rows($result) && $i<count($tlist);$i++)
{
	$sub_row=mysqli_fetch_array($result);
	//sql to update new teacher_subject relation in teacher_subject table
	$sql_1="update teacher_subject set teacher_id=".$tlist[$i]." where subject_id=".$sub_row['subject_id']." ;"; //tsrelation_id=".$sub_row['tsrelation_id']." ;"; <- will not give correct o/p
	$update_result=mysqli_query($con,$sql_1);
	if(!$update_result)
	{
		$num_rows_fail++;
		
	}
}
if($num_rows_fail==0)
{
	echo " <h2>Allotment Updated Successfully</h2><br>";
}
else
{
	echo "<h2>Failed To Update Allotment ( ".$num_rows_fail." rows)</h2><br>";
}

mysqli_close($con);
?>

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