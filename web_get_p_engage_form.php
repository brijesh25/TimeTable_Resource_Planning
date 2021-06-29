<?php require_once "check_login.php"; ?>
<html>
<head>
<title>PERIOD ENGAGEMENT</title>
<style>


</style>
<script>
	function validate()
	{
		//to confirm user want to remove period engagement 
		choice=confirm("DO YOU WANT TO REMOVE SELECTED PERIOD ENGAGEMENT ?");
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
<h1>PERIOD ENGAGEMENT</h1>
<a href="web_period_engage.php"><button type="button" class="button">BACK</button></a><br>

<?php
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"timetable");

$sql="select * from period_engagement order by pe_id desc;";
$result=mysqli_query($con,$sql);

echo "<br><form action='web_remove_p_engage.php' method='POST' onsubmit ='return validate();'><table cellpadding=5 class='maintable' cellspacing=5 width='70%'>";
echo "<tr><th width='100'>DATE</th>"
		."<th >DAY</th>"
		."<th>PERIOD No.</th>"
		."<th>SUBJECT NAME</th>"
		."<th>TEACHER NAME</th>"
		."<th>SEMESTER</th>"
		."<th colspan=2>SECTION</th></tr>";
		
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
		."<td >".$pe_row['section']."</td>"
		."<td><input type='checkbox' name='pe_id[]' value='".$pe_row['pe_id']."'></td>"
		."</tr>";
		
	}
	echo "<tr><td></td><td></td><td></td><td><input type='submit' name='submit' value='SUBMIT' class='button'></td><td><input type='reset' name='reset' value='RESET' class='button'></td><td></td><td></td><td></td></tr>";
	
}
else
{
	echo "<tr><td colspan=7>No Period Engagements ...</td></tr>";
}
echo "</table></form>";
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