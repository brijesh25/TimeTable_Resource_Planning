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
<?php
$semester=$_POST['semester'];
$section=$_POST['section'];
$pno=$_POST['period'];
$date=date_create($_POST['date']);
$d=date_timestamp_get($date);


$day=date("l",$d);

if($day=="Sunday") 
{
	echo "<h3> ".date("l d-m-Y ",$d)." invalid date ,please enter correct date </h3>";
}
else
{
	echo "<h3>".date("l d-m-Y ",$d)."</h3>";
		$con=mysqli_connect("localhost","root","");
		mysqli_select_db($con,"timetable");

		$sql="select period,ptime,".$day." from timetable where semester=".$semester." and section='".$section."' and period=".$pno." ;";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($result);

		echo "<table cellpadding=5 class='maintable'>
				<tr><th colspan=3 >Regular Period Details</th></tr>
				<tr>
				<th>Period No.</th>
				<th>Time</th>
				<th>Subject</th>
				</tr>
				<tr>
				<td>".$row['period']."</td>
				<td>".$row['ptime']."</td>
				<td>".$row[$day]."</td></tr>
				</table>
				<br>";


		if(!isset($_POST['engage']))
		{
			//to view subject allot list for period engagement
			$sql_1="select tsrelation_id,subject_name,teacher_name from 
			subject_master natural join teacher_subject natural join teacher 
			where semester=".$semester." and section='".$section."' ;";
			$allot_result=mysqli_query($con,$sql_1);
			
				echo "<form action='web_p_engage_period.php' method='POST' >
				<input type='hidden' name='semester' value='".$semester."'>
				<input type='hidden' name='section' value='".$section."'>
				<input type='hidden' name='period' value='".$pno."'>
				<input type='hidden' name='date' value='".$_POST['date']."'>
				<table cellpadding=5 class='maintable'>
				<tr><th colspan=3>Select Engagement</th></tr>
				<tr>
				<th>Subject Name</th>
				<th colspan=2> Teacher Name</th>
				</tr>";
				if(mysqli_num_rows($allot_result)!=0)
				{
					for($i=0;$i<mysqli_num_rows($allot_result);$i++)
					{
						$allot_row=mysqli_fetch_array($allot_result);
						echo "<tr>
						<td>".$allot_row['subject_name']."</td>
						<td>".$allot_row['teacher_name']."</td>
						<td><input type='radio' name='engage' value='".$allot_row['tsrelation_id']."'></td>
						</tr>";
					}
					echo "<tr><td colspan=3><input type='submit' name='submit' value='Submit' class='button'></td></tr>";
				}
				else
				{
					echo "<tr><td colspan='2' align=center>No Allotment Found</td><tr>";
				}
				
				echo "</table></form>";
		}
		else
		{
			$ts_id=$_POST['engage'];
			//to view selected subject allot  for period engagement
			$sql_2="select tsrelation_id,subject_name,teacher_name from 
			subject_master natural join teacher_subject natural join teacher 
			where tsrelation_id=".$ts_id."  ;";
			
			$engage_result=mysqli_query($con,$sql_2);
			$engage_row=mysqli_fetch_array($engage_result);
			echo "<form action='web_add_p_engage.php' method='POST' >
				<input type='hidden' name='semester' value='".$semester."'>
				<input type='hidden' name='section' value='".$section."'>
				<input type='hidden' name='period' value='".$pno."'>
				<input type='hidden' name='date' value='".$_POST['date']."'>
				<input type='hidden' name='subject_name' value='".$engage_row['subject_name']."'>
				<input type='hidden' name='teacher_name' value='".$engage_row['teacher_name']."'>
				<table border=5 cellpadding=5 class='maintable'>
				<tr><th colspan=2>Selected Engagement</th></tr>
				<tr>
				<th>Subject Name</th>
				<th> Teacher Name</th>
				</tr>";
				
				echo "<tr>
				<td>".$engage_row['subject_name']."</td>
				<td>".$engage_row['teacher_name']."</td>
				</tr>";
				
				echo "<tr><td colspan=3><input type='submit' name='submit' value='Submit'></td></tr>
				</table></form>";
		}
		mysqli_close($con);
}
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