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
<h1>UPDATE TIMETABLE</h1>
<a href="web_timetable.php"><button type="button" >BACK</button></a><br>

<?php
$semester=$_POST['semester'];
$section=$_POST['section'];

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

$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"timetable");

$sql="select * from timetable where semester=".$semester." and section='".$section."' order by id asc ;" ;
$result=mysqli_query($con,$sql);
$fail=0;
for($i=0;$i<mysqli_num_rows($result) && $i<count($period);$i++)
{
	$row=mysqli_fetch_array($result);
	$rowid=$row['id'];
	
	$sql_1="update timetable set period=".$period[$i]
	." , ptime='".$ptime[$i]
	."' , monday='".$monday[$i]
	."' , tuesday='".$tuesday[$i]
	."' , wednesday='".$wednesday[$i]
	."' , thursday='".$thursday[$i]
	."' , friday='".$friday[$i]
	."' , saturday='".$saturday[$i]
	."' where id=".$rowid." ;";
	
	$update_result=mysqli_query($con,$sql_1);
	if($update_result)
	{
		$fail=0;
	}
	else
	{
		$fail=$i+1;
	}
}

if(!$fail)
	{
		echo " <h2>".$i." Rows Updated Successfully</h2>";
	}
	else
	{
		echo "<h2>Failed To Update row ".$fail."</h2>";
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