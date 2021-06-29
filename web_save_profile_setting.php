<?php require_once "check_login.php"; ?>
<Html>
<head>
<title>PROFILE SETTINGS</title>
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
<h1>PROFILE SETTINGS</h1>
<a href="web_profile_setting.php"><button type="button" >BACK</button></a>
<?php
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"timetable");


if(isset($_POST['old_username']) && isset($_POST['new_username2']) )//block to update username
{
$old_username=$_POST['old_username'];	
$new_username=$_POST['new_username2'];
$tid=$teacher_id;//tid from session variable's values //$_POST['teacher_id'];//old way of hidden field
//echo $old_username."  ".$new_username;

$sql="select teacher_id ,teacher_name,designation,user_name from teacher where teacher_id=".$tid." ;";//geting details of logged in user
$result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result)==1)
	{
		$t_row=mysqli_fetch_array($result);
		//echo "<br>".$t_row['teacher_id']."<br>".$t_row['designation']."<br>".$t_row['teacher_name'];
		
		//to check old username match with logged in user's username
		if($t_row['user_name']==$old_username)
		{
			echo "<h3>".$t_row['designation']."  ".$t_row['teacher_name']."</h3>";
			//echo "<h3>Username matched ,go ahead </h3>";
			//to update username
			$sql_update_uname="update teacher set user_name='".$new_username."' where teacher_id=".$tid." ;";//updates username of logged in user
			$result_update_uname=mysqli_query($con,$sql_update_uname);
			
			if($result_update_uname)
			{
				echo "<h3>Username updated successfully</h3>";
				echo "<h3>New Username :".$new_username."</h3>";
				header('refresh: 2; url=logout.php');//now destroy its session and logout i.e redirect to login page in 2 ,for fresh login
				echo "<h3>logging out in 2 seconds</h3>";
			}
			else
			{
				echo "<h3>Failed to update Username!</h3>";
			}
		}
		else
		{
			echo "<h3>Entered old username is wrong !</h3>";
		}
	}
	else
	{
		echo "<h3>No user exists for given tid</h3>"; 
	}

	
}
else if(isset($_POST['old_password']) && isset($_POST['new_password2']))//block to update password
{
$old_password=$_POST['old_password'];
$new_password=$_POST['new_password2'];
$tid=$teacher_id;//tid from session variable's values //$_POST['teacher_id'];//old way of hidden field
//echo $old_password."  ".$new_password;

$sql="select teacher_id ,teacher_name,designation,user_name,password from teacher where teacher_id=".$tid." ;";//geting details of logged in user
$result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result)==1)
	{
		$t_row=mysqli_fetch_array($result);
		//echo "<br>".$t_row['teacher_id']."<br>".$t_row['designation']."<br>".$t_row['teacher_name'];
		
		//to check old password match with logged in user's password
		if($t_row['password']==$old_password)
		{
			echo "<h3>".$t_row['designation']."  ".$t_row['teacher_name']."</h3>";
			//echo "<h3>Password matched ,go ahead </h3>";
			//to update password
			$sql_update_pwd="update teacher set password='".$new_password."' where teacher_id=".$tid." ;";//updates password of logged in user
			$result_update_pwd=mysqli_query($con,$sql_update_pwd);
			
			if($result_update_pwd)
			{
				echo "<h3>Password updated successfully</h3>";
				echo "<h3>New Password :".$new_password."</h3>";//comment it at last
				header('refresh: 2; url=logout.php');//now destroy its session and logout i.e redirect to login page in 2 ,for fresh login
				echo "<h3>logging out in 2 seconds</h3>";
			}
			else
			{
				echo "<h3>Failed to update Password!</h3>";
			}
		}
		else
		{
			echo "<h3>Entered old password is wrong !</h3>";
		}
	}
	else
	{
		echo "<h3>No user exists for given tid</h3>"; 
	}
}
else
{
echo "<h3>No form values submitted</h3>";
}
mysqli_close($con);
?>

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