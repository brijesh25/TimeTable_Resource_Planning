<?php require_once "check_login.php"; ?>
<html>
<head>
<title>PERIOD ENGAGEMENT</title>
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
<h1>PERIOD ENGAGEMENT</h1>
<a href="web_period_engage.php"><button type="button" class="button">Back</button></a><br>

<?php
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"timetable");

$sql="select * from period_engagement order by pe_id desc;";
$result=mysqli_query($con,$sql);
echo "<br><table cellpadding=5 class='maintable' cellspacing=5 width='70%'>";
echo "<tr><th width='100'>DATE</th>"
		."<th>DAY</th>"
		."<th>PERIOD No.</th>"
		."<th>SUBJECT NAME</th>"
		."<th>TEACHER NAME</th>"
		."<th>SEMESTER</th>"
		."<th>SECTION</th></tr>";
		
if(mysqli_num_rows($result)!=0)
{
	for($i=0;$i<mysqli_num_rows($result);$i++)
	{
		$pe_row=mysqli_fetch_array($result);
		
		echo "<tr><td>".$pe_row['pe_date']."</td>"
		."<td>".$pe_row['pe_day']."</td>"
		."<td>".$pe_row['period']."</td>"
		."<td>".$pe_row['subject_name']."</td>"
		."<td>".$pe_row['teacher_name']."</td>"
		."<td>".$pe_row['semester']."</td>"
		."<td>".$pe_row['section']."</td></tr>";
	}
	
}
else
{
	echo "<tr><td colspan=7>No Period Engagements ...</td></tr>";
}
echo "</table>";

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