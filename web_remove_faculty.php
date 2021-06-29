<?php require_once "check_login.php"; ?>
<html>
<head>
<title>MANAGE FACULTY</title>
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
<h1>MANAGE FACULTY</h1>
<a href="managefaculty.php"><button type="button" class="button">Back</button></a>

<?php

$tlist=$_POST['t'];
$tid_string=$tlist[0];//first tid in string

for($i=1;$i<count($tlist);$i++)
{
	$tid_string = $tid_string .",". $tlist[$i];//comma seperated tid's string
}


$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"timetable");

$sql="delete from teacher where teacher_id IN (".$tid_string.") ;";
$result=mysqli_query($con,$sql);
if($result)
{
	echo "<h2> ".count($tlist)." Faculties Removed Successfully </h2>";
}
else
	echo "<h2>Failed to Remove Faculties</h2>"	;

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