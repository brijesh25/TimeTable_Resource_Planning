<?php require_once "check_login.php"; ?>
<html>
<head>
<title>TIMETABLE</title>
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
<h1>NEW TIMETABLE</h1>

<?php
$semester=$_POST['semester'];
$section=$_POST['section'];

$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"timetable");
$sql="select * from timetable where semester=".$semester." and section='".$section."' ;" ;
$exist_result=mysqli_query($con,$sql);
if(mysqli_num_rows($exist_result)==0)
{
	$period=$_POST['p'];
	$ptime=$_POST['pt'];
	$monday=$_POST['m'];
	$tuesday=$_POST['t'];
	$wednesday=$_POST['w'];
	$thursday=$_POST['th'];
	$friday=$_POST['f'];
	$saturday=$_POST['s'];

	for($i=0;$i<count($period);$i++)
	{
		echo $period[$i]." | ".$ptime[$i]." | ".$monday[$i]." | ".$tuesday[$i]." | ".$wednesday[$i]." | ".$thursday[$i]." | ".$friday[$i]." | ".$saturday[$i]." <br>";
	}




	//initialising the values string with 1st row of timetable
	$values_string="(".$period[0].",
	'".$ptime[0]."',
	'".$monday[0]."',
	'".$tuesday[0]."',
	'".$wednesday[0]."',
	'".$thursday[0]."',
	'".$friday[0]."',
	'".$saturday[0]."',
	".$semester.",
	'".$section."')";

	for($i=1;$i<count($period);$i++)
	{
		//sql to insert new timetable in timetable table
		$values_string= $values_string .",(".$period[$i].",
		'".$ptime[$i]."',
		'".$monday[$i]."',
		'".$tuesday[$i]."',
		'".$wednesday[$i]."',
		'".$thursday[$i]."',
		'".$friday[$i]."',
		'".$saturday[$i]."',
		".$semester.",
		'".$section."')";
	}

	$sql_1="insert into timetable(period,ptime,monday,tuesday,wednesday,thursday,friday,saturday,semester,section) values".$values_string.";";
	$insert_timetable=mysqli_query($con,$sql_1);
	if($insert_timetable)
	{
		echo "<h2>New Timetable for semester=".$semester." section=".$section." Added Successfully</h2>";
	}
	else
	{
		echo "<h2>Failed To Add New Timetable for semester=".$semester." and section=".$section."</h2>";
	}
}
else
{
	echo "<h2>Timetable already exists for semester =".$semester." section=".$section."</h2>";
	echo "<a href='web_edit_timetable_form.php?semester=".$semester."&section=".$section."' >
	Edit Timetable for Semester = ".$semester." Section= ".$section."</a>";
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