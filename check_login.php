<?php
session_start();
if(isset($_SESSION['teacher_id']))//i.e session is unset ,user has logged out
{
$teacher_id=$_SESSION['teacher_id'];
$teacher_name=strtoupper($_SESSION['teacher_name']);
$designation=strtoupper($_SESSION['designation']);
$image_path=$_SESSION['image_path'];
$user_type=strtoupper($_SESSION['user_type']);
}
else
{//go back login page
	session_destroy();
	header("location:login.php");
}

?>