<?php require_once "check_login.php"; ?>
<html>
<head>
<title>VIEW TIMETABLE</title>

<link rel="stylesheet" type="text/css" href="SideBarNavigation.css"> 
<link rel="stylesheet" type="text/css" href="header-footer.css"> 
<link rel="stylesheet" type="text/css" href="Content_and_Button.css">

<style>


</style>
<script>
	function validate()
		{
			sem = document.getElementById("semester").value;
			sec = document.getElementById("section").value;
			if((sem < 3 || sem > 8) || sem == "")
			{
				alert("PLEASE ENTER A VALID SEMESTER(3-8)");
				return false;
			}
			if(sec!='a'&& sec!='b'&& sec!='A'&&sec!='B')
			{
				alert("PLEASE ENTER A VALID SECTION(A or B)");
				return false;
			}
		}
</script>

 </head>
<body>
 
<!--MENU-->

<?php
require_once "web_menu.php";
?>

<div>
<div id="content">
	<article>
	<h1>VIEW TIMETABLE</h1>
	<table>
	<form name="viewtt" action="web_view_timetable.php" METHOD="POST" onsubmit = "return validate();">
	<tr><td>Semester </td><td><!--<input type="number" name="semester" id = "semester" required>-->
<select name="semester" id = "semester" required >
<option value="">Select</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
</select>
</td></tr>
	<tr><td>Section </td><td><!--<input type="text" name="section" id = "section" required>-->
<select name="section" id = "section" required >
<option value="">Select</option>
<option value="A">A</option>
<option value="B">B</option>
</select>
</td></tr>
	<tr><td><input type="submit" name="submit" value="RETRIEVE TIME TABLE" class="button"></td><td><input type="reset" name="reset" value="RESET" class="button"></td></tr>
	</form>
	</table>
	<br>
	<div align="center">
	<?php
	if(isset($_POST['semester'])&&isset($_POST['section']))
	{

	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"timetable");

	$semester=$_POST['semester'];
	$section=$_POST['section'];
	echo "<h3>Semester = ".$semester." Section = ".$section."</h3>";

	$sql="select * from timetable where semester=".$semester." and section='".$section."' ;" ;
	$result=mysqli_query($con,$sql);
	echo "<table cellpadding=5 class='maintable' cellspacing=5 width='70%' border=2>
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
		for($i=1;$i<=mysqli_num_rows($result);$i++)
		{
		$row=mysqli_fetch_array($result);

		echo "<tr>
		<td>".$row['period']."</td>
		<td>".$row['ptime']."</td>
		<td>".$row['monday']."</td>
		<td>".$row['tuesday']."</td>
		<td>".$row['wednesday']."</td>
		<td>".$row['thursday']."</td>
		<td>".$row['friday']."</td>
		<td>".$row['saturday']."</td>
		</tr>";

		}
	}
	else
	{
		echo "<tr><td colspan='8' align=center>No Timetable Found</td><tr>";
	}

	echo "</table>";

		{//block to show period_engagements 
			$sql_pe="select * from period_engagement where " 
			." pe_date >= current_date() and pe_date <= date_add(curdate(), interval (7-dayofweek(curdate())) day) "
			." and semester = ".$semester." and section ='".$section."' order by pe_date asc;";
			//date_add(curdate(), interval (7-dayofweek(curdate())) day) give date of saturday of this week so as to get period_engagements from current_date to saturday of this week
			$result_pe=mysqli_query($con,$sql_pe);
					
			if(mysqli_num_rows($result_pe)!=0)
			{
				echo "<br><b>Period engagements of this week</b> <br>";
				echo "<br><table cellpadding=5 class='maintable' cellspacing=5 width='70%' border=2>";
				echo "<tr><th>DATE</th>"
					."<th>DAY</th>"
					."<th>PERIOD No.</th>"
					."<th>SUBJECT NAME</th>"
					."<th>TEACHER NAME</th>"
					."<th>SEMESTER</th>"
					."<th>SECTION</th></tr>";
				for($i=0;$i<mysqli_num_rows($result_pe);$i++)
				{
					$pe_row=mysqli_fetch_array($result_pe);
					
					echo "<tr><td>".$pe_row['pe_date']."</td>"
					."<td>".$pe_row['pe_day']."</td>"
					."<td>".$pe_row['period']."</td>"
					."<td>".$pe_row['subject_name']."</td>"
					."<td>".$pe_row['teacher_name']."</td>"
					."<td>".$pe_row['semester']."</td>"
					."<td>".$pe_row['section']."</td></tr>";
				}
				echo "</table>";
			}
			else
			{
				echo "<br><h3>No Period Engagements ...</h3>";
			}
			
		}
		
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