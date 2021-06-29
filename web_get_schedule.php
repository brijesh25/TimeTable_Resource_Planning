<?php require_once "check_login.php"; ?>
<html>
<head>
<title>SCHEDULE</title>
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
<h1><?php 
if(!isset($_POST['day']))
{
	$day=strtoupper(date("l",time()));
}
else
{
	$day=$_POST['day'];
}
echo $day; 
?>'s SCHEDULE</h1>
</article>


<div align=center>
	
<!--to take day input to view any other day's schedule-->
	
	<form name="day" action="web_get_schedule.php" method="POST">
	<!--hidden field for tid-->
	GO TO Day : <!--<input type="text" name="day" value="<?php echo $day; ?>" list="daylist"> -->
	<select name="day" required>
	<option value="">Select</option>
	<option value="MONDAY">MONDAY</option>
	<option value="TUESDAY">TUESDAY</option>
	<option value="WEDNESDAY">WEDNESDAY</option>
	<option value="THURSDAY">THURSDAY</option>
	<option value="FRIDAY">FRIDAY</option>
	<option value="SATURDAY">SATURDAY</option>
	</select>
	
	<!-- <datalist id="daylist">
	<option value="MONDAY">		
	<option value="TUESDAY">	
	<option value="WEDNESDAY">	
	<option value="THURSDAY">	
	<option value="FRIDAY">		
	<option value="SATURDAY">	
	</datalist>	-->				
	
	<input type="submit" name="submit" value="Get" class="button"><br>
	</form><br>
	<?php
		if($day=="SUNDAY")
		{
			echo "<h3>No class on Sundays</h3>";
		}
		else
		{
			$con=mysqli_connect("localhost","root","");
			mysqli_select_db($con,"timetable");
			
			$tid=$teacher_id;//getting tid from variable which gets value from session varible //$_POST['teacher_id'];old when passing tid hidden field
			
			$subject_sql="select subject_name,section from subject_master natural join teacher_subject where teacher_id=".$tid;

			$sql="select period,ptime,".$day.",semester,section from timetable where (".$day.",section) in (".$subject_sql.");";//$day - column gives the subject on that day
			$result=mysqli_query($con,$sql);
			
			echo "<table cellpadding=5 class='maintable' cellspacing=5 width='50%' >
					<tr>
					<th>Period No.</th>
					<th>Timing</th>
					<th>Subject</th>
					<th>Semester</th>
					<th>Section</th>
					</tr>";
					
			if(mysqli_num_rows($result)!=0)
			{
				while($resultrow=mysqli_fetch_array($result))
				{	
					echo "<tr><td>".$resultrow['period']
					."</td><td>".$resultrow['ptime']
					."</td><td>".$resultrow[$day]
					."</td><td>".$resultrow['semester']
					."</td><td>".$resultrow['section']
					."</td></tr>";
				}
			}
			else
			{
				echo "<tr><td colspan=5 align=center><h2>No Periods Today</h2></td></tr>";	
			}
			
			echo "</table>";
			
			{//block to show period_engagements 
				$sql_tname="select teacher_id,teacher_name from teacher where teacher_id = ".$tid." ;";
				$result_tname=mysqli_query($con,$sql_tname);
				if(mysqli_num_rows($result_tname)!=0)
				{
					$tname=mysqli_fetch_array($result_tname)['teacher_name'];
					//echo $tname;
				}
				else
				{
					echo "<br>teacher name not found<br>";
				}
				
				$sql_pe="select * from period_engagement where " 
				." pe_date >= current_date() and pe_date <= date_add(curdate(), interval (7-dayofweek(curdate())) day) "
				." and teacher_name = '".$tname."' and pe_day = '".$day."' "
				." order by pe_date asc;";
				//date_add(curdate(), interval (7-dayofweek(curdate())) day) give date of saturday of this week so as to get period_engagements from current_date to saturday of this week
				$result_pe=mysqli_query($con,$sql_pe);
				if($result_pe)
				{
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
</div>

		<?php
		require_once "web_right_sidebar.php";
		?>
</div>

<div id="footer">     	   
	Copyright © BIT DURG || Website Design & Maintain by <span style="color: red">CSE Department</span>  
</div> 
</body>          
</html>