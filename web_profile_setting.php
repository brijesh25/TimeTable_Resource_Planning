<?php require_once "check_login.php"; ?>
<Html>
<head>
<title>PROFILE SETTINGS</title>
<style>

.tabu{
	margin-top: 10px;
	border: 1px solid blue;
	padding: 2px;
	width: 100%;
}
</style>

<script type="text/javascript">
/*function show_uname_form()
{
	uname_form=document.getElementById("uname_form");
	pwd_form=document.getElementById("pwd_form");
	pic_form=document.getElementById("picture_form");
	
	pwd_form.style.visibility="collapse";
	pic_form.style.visibility="collapse";
	uname_form.style.visibility="visible";
}*/
function show_pwd_form()
{
	//uname_form=document.getElementById("uname_form");
	pwd_form=document.getElementById("pwd_form");
	pic_form=document.getElementById("picture_form");
	
	//uname_form.style.visibility="collapse";
	pic_form.style.visibility="collapse";
	pwd_form.style.visibility="visible";
}
function show_pic_form()
{
	//uname_form=document.getElementById("uname_form");
	pwd_form=document.getElementById("pwd_form");
	pic_form=document.getElementById("picture_form");

	pwd_form.style.visibility="collapse";
	//uname_form.style.visibility="collapse";
	pic_form.style.visibility="visible";
}
/*function validate_username()
{
	new_uname1 = document.getElementById("new_username1").value;
	new_uname2 = document.getElementById("new_username2").value;
	if(new_uname1 != new_uname2)
	{
		alert("NEW USERNAMES DOES NOT MATCH!!!");
		return false;
	}
}*/
function validate_password()
{
	new_pwd1 = document.getElementById("new_password1").value;
	new_pwd2 = document.getElementById("new_password2").value;
	if(new_pwd1 != new_pwd2)
	{
		alert("NEW PASSWORDS DOES NOT MATCH!!!");
		return false;
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

<h1>PROFILE SETTINGS</h1>

<div style="padding-left: 100px; padding-top: 20px;">
	<?php
	 echo "<img src='".$image_path."' height=200 width=200 border=3>";
	?>
<!--change profile pic from-->
<div style="float: right; padding-right: 140px;">
	<br>
	<br>
	<button onclick="show_pic_form()" class="button" style="width: 100%;">Change Profile Picture </button>

	<form name="change_picture" id="picture_form" action="web_update_profile_pic.php" method="POST" enctype="multipart/form-data" style="visibility:collapse" >
	<table class="tabu">
	<tr><td>Select a picture : </td><td> <input type="file"  name="new_pic" required></td></tr>
	<tr><td><input type="submit" name="submit" value="Submit" class="button">
	</td><td> <input type="reset" name="reset" value="Reset" class="button"></td></tr>
	</table>
	</form>

<!--change username from-->
<!--
	<button onclick="show_uname_form()" class="button" style="width: 100%;">Change Username</button>

	<form name="change_username" id="uname_form" action="web_save_profile_setting.php" method="POST" style="visibility:collapse" onsubmit = "return validate_username();">
	<table class="tabu">
	<tr><td>Old Username : </td><td> <input type="text" name="old_username" id  = "old_username" required="required"></td></tr>
	<tr><td>New Username : </td><td> <input type="text" name="new_username1" id  = "new_username1" required="required"></td></tr>
	<tr><td>Reenter Username : </td><td> <input type="text" name="new_username2" id  = "new_username2" required="required"></td></tr>
	<tr><td><input type="submit" name="submit" value="Submit" class="button">
	</td><td> <input type="reset" name="reset" value="Reset" class="button"></td></tr>
	</table>
	</form>
-->
<!--change password from-->
	<button onclick="show_pwd_form()" class="button" style="width: 100%;">Change Password</button>

	<form name="change_password" id="pwd_form" action="web_save_profile_setting.php" method="POST" style="visibility:collapse" onsubmit = "return validate_password();">
	<table class="tabu">
	<tr><td>Old Password : </td><td> <input type="text" name="old_password" id = "old_password" required="required"></td></tr>
	<tr><td>New Password : </td><td> <input type="password" name="new_password1" id = "new_password1" required="required"></td></tr>
	<tr><td>Reenter Password : </td><td> <input type="password" name="new_password2" id = "new_password2" required="required"></td></tr>
	<tr><td><input type="submit" name="submit" value="Submit" class="button">
	</td><td> <input type="reset" name="reset" value="Reset" class="button"></td></tr>
	</table>
	</form>
</div>
</div>
</div>

		<?php
		require_once "web_right_sidebar.php";
		?>
</div>

<div id="footer">     	   	Copyright © BIT DURG || Website Design & Maintain by <span style="color: red">CSE Department</span>  </div> </body>          
</html>