<?php require_once "check_login.php"; ?>
<html>
<head>
<title>TIME-TABLE</title>
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
<h1>Update Timetable</h1>
<table>
<form name="viewtt" action="web_edit_timetable_form.php">
<tr><td>Semester </td><td><input type="text" name="semester"></td></tr>
<tr><td>Section </td><td><input type="text" name="section"></td></tr>
<tr><td><input type="submit" name="submit" value="RETRIEVE TIME TABLE" class="button"></td><td><input type="reset" name="reset" value="RESET" class="button"></td></tr>
</form>
</table>

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