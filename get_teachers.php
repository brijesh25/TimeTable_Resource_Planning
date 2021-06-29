<?php
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"timetable");
$sql="select teacher_name from teacher where user_type='faculty';";
$teacherlist=mysqli_query($con,$sql);
for($j=0;$j<mysqli_num_rows($teacherlist);$j++)
		{
			$t_row=mysqli_fetch_array($teacherlist);
			echo $t_row['teacher_name']."<br>";
		}
		
mysqli_close($con);
?>