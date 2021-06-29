<?php require_once "check_login.php"; ?>
<html>
<head>
<title>MANAGE FACULTY</title>
<style>

</style>

<script type="text/javascript">
function validate()
{
	name = document.getElementById("facultyname").value;
	if(name.match(/[^A-Za-z]/) || name == "")
	{
		alert("PLEASE ENTER NAMES IN ALPHABETS ONLY");
		return false;
	}
	else
	{
		//to confirm user want to update timetable
		choice=confirm("Add Faculty ?");
		//alert(choice);
		return choice;
	}
}
</script>

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
</article>

<form id="newfaculty_form" name="newfaculty_form" action="web_add_faculty.php" method="POST" onsubmit="return validate()" >

	<table>
	<tr><td>Name</td><td><input type="text" name="name" value="" id = "facultyname" required = "required"></td></tr>

	<tr><td>Designation</td><td><select name="designation" required >
			<option value="">Select</option>
			<option value="Professor" >Professor</option>
			<option value="Assistant Professor">Assistant Professor</option>
			<option value="H.O.D">Head Of Department</option>
			</select></td></tr>
			
	<!-- <tr><td>Username</td><td><input type="text" name="username" value=""></td></tr> -->
	<!-- <tr><td>Password</td><td><input type="text" name="password1" value=""></td></tr> -->
	<!-- <tr><td>Confirm Password</td><td><input type="text" name="password2" value=""></td></tr> -->
	<!-- <tr><td>Profile Picture : </td><td><input type="file" name="profile_pic" ></td></tr> -->
	<tr><td><input type="submit" name="submit" value="submit" class="button"></td>
	<td><input type="reset" name="reset" value="reset" class="button"></td></tr>
	</table>
	</form>

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