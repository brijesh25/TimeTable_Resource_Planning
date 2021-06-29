<?php
session_start();
if(isset($_SESSION['teacher_id']))//i.e if session is set ,user has logged in
{
$teacher_id=$_SESSION['teacher_id'];
$teacher_name=strtoupper($_SESSION['teacher_name']);
$designation=strtoupper($_SESSION['designation']);
$image_path=$_SESSION['image_path'];
$user_type=strtoupper($_SESSION['user_type']);

	header("location:home.php");//go to home page
}
else
{
	session_destroy();
	header("location:login.php");//go to login page 
}
?>