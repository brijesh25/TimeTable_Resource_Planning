<?php
$semester=$_GET['sem'];
$section=$_GET['sec'];
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"timetable");

$sql="select subject_name,teacher_name from 
subject_master natural join teacher_subject natural join teacher 
where semester=".$semester." and section='".$section."' ;";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)!=0)
{
	echo "<table border=10>
	<tr>
	<th>subject name</th>
	<th> Teacher name</th>
	</tr>";
	for($i=0;$i<=mysqli_num_rows($result);$i++)
	{
		$row=mysqli_fetch_array($result);
		echo "<tr>
		<td>".$row['subject_name']."</td>
		<td>".$row['teacher_name']."</td>
		</tr>";
	}
	
	echo "</table>";
	
}
mysqli_close($con);
?>
