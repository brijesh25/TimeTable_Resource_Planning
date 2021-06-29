<?php require_once "check_login.php"; ?>
<html>
<head>
<title>MANAGE FACULTY</title>
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
<h1>MANAGE FACULTY</h1>
<a href="managefaculty.php"><button type="button" class="button">BACK</button></a>

<?php

$faculty_name=$_POST['name'];
//$last_name=$_POST['last_name'];
$designation=$_POST['designation'];
//$usertype=$_POST['usertype'];
//$username=$_POST['username'];
//$password=$_POST['password1'];

$username=date("H:i:s",time());//temp username
$temp_uname=$username;
$fname="";

//print_r($faculty_name);
//echo "<br>".strlen($faculty_name);
$i=0;//to get fname i.e name upto first space
while( $i<strlen($faculty_name) &&  $faculty_name[$i]!=" ")
{
	$fname=$fname.$faculty_name[$i];
	$i++;
}
//echo "<br>".$fname;
//echo "<br>".$username;


$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"timetable");

$checksql="select * from teacher where user_name='".$username."';";
$exist_result=mysqli_query($con,$checksql);
	if(mysqli_num_rows($exist_result)==0)
	{
	
		//$sql="insert into teacher(teacher_name,user_type,user_name,password) values('".$faculty_name."','".$usertype."','".$username."','".$password."')";
		$sql="insert into teacher(teacher_name,designation,user_name) values( upper('".$faculty_name."') ,upper('".$designation."'),'".$username."')";
		$result=mysqli_query($con,$sql);
			if($result)
			{//to get teacher_id and update the username 
				$sql_tid="select teacher_id from teacher where (teacher_name,designation,user_name) = ('".$faculty_name."','".$designation."','".$username."') ;";
				$result_tid=mysqli_query($con,$sql_tid);
				if($result_tid)
				{
					$tid_row=mysqli_fetch_array($result_tid);
					//echo "<br>".$tid_row['teacher_id'];
					
					$username=$fname."2".$tid_row['teacher_id']."@bit";
					$sql_update="update teacher set user_name ='".$username."' where teacher_id = ".$tid_row['teacher_id']." ;";//update username
					$result_update=mysqli_query($con,$sql_update);
					
					if($result_update)
					{
						echo "<h2>Faculty Added Successfully</h2><br>Username : ".$username."<br>Password : bit123";
					}
					else
					{
						echo "<br> username not updated";
						echo "<h2>Faculty Added Successfully</h2><br>Username : ".$temp_uname."<br>Password : bit123";
					}
					
				}
				else
				{
					echo "<br> teacher_id not found";
					echo "<h2>Faculty Added Successfully</h2><br>Username : ".$temp_uname."<br>Password : bit123";
				}
				
			}
			else
			{
				echo "<h2>Failed To Add Faculty</h2>";
			}
	}
	else
	{
		echo "<h2>Failed To Add Faculty : username already taken</h2>";
	}
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