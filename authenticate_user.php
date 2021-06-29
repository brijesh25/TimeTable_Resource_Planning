<?php
$username=$_POST['username'];
$password=$_POST['password'];

$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"timetable");

$sql="select * from teacher where user_name='".$username."' ;";
$result=mysqli_query($con,$sql);

if(mysqli_num_rows($result)==0)
{
	//echo "<h1>Invalid Username !!!</h1>";
	header("location:login.php?msg=Invalid Username !!!");//go back to login page
}
else
{
	$t_row=mysqli_fetch_array($result);
	if($t_row['password']!=$password)
	{
		//echo "<h1>Incorrect Password !!!</h1>";
		header("location:login.php?msg=Incorrect Password !!!");//go back to login page
	}
	else
	{//goto to homepage i.e login successful
		session_start();
		$_SESSION['teacher_id']=$t_row['teacher_id'];
		$_SESSION['teacher_name']=$t_row['teacher_name'];
		$_SESSION['designation']=$t_row['designation'];
		$_SESSION['image_path']=$t_row['image_path'];
		$_SESSION['user_type']=$t_row['user_type'];
		
		header("location:home.php");
		
	}
	
}
mysqli_close($con);
?>