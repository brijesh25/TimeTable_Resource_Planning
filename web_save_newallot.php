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
<h1>NEW SUBJECT ALLOTMENT</h1>
<a href="web_suballot.php"><button type="button" class="button">BACK</button></a>

<?php
$semester=$_POST['semester'];
$section=$_POST['section'];
$tlist=$_POST['t'];


$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"timetable");
$sql="select subject_name,teacher_name from 
			subject_master natural join teacher_subject natural join teacher 
			where semester=".$semester." and section='".$section."' ;";
$exist_result=mysqli_query($con,$sql);
if(mysqli_num_rows($exist_result)==0)
{
	$sql_1="select subject_id from subject_master where semester=".$semester." order by subject_id asc";
	$result=mysqli_query($con,$sql_1);
	
	$sub_row=mysqli_fetch_array($result);
	$values_string="(".$sub_row['subject_id'].",".$tlist[0].",'".$section."')";
	
	for($i=1;$i<=mysqli_num_rows($result) && $i<count($tlist);$i++)
	{
		$sub_row=mysqli_fetch_array($result);
		//sql to insert new teacher_subject relation in teacher_subject table
		$values_string= $values_string .",(".$sub_row['subject_id'].",".$tlist[$i].",'".$section."')";
	}

	$sql_2="insert into teacher_subject(subject_id,teacher_id,section) values".$values_string.";";
	$insert_result=mysqli_query($con,$sql_2);
	if($insert_result)
	{
		echo "<h2>New Allotment Added Successfully</h2>";
	}
	else
	{
		echo "<h2>Failed To Add New Allotment</h2>";
	}

}
else
{
	echo "<br>Subject Allotment already exists
	<br><a href='web_edit_allot.php?semester=".$semester."&section=".$section."&submit=Get'>Edit Allotment for Semester = ".$semester." Section= ".$section."</a>";
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