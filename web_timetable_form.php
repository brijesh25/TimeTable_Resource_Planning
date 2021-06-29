<?php require_once "check_login.php"; ?>
<?php
$formtype=$_GET['formtype'];
switch($formtype)
{
	case "new" : $action="web_new_timetable.php";
	$heading="NEW";
	break;
	case "edit" : $action="web_edit_timetable_form.php";
	$heading="EDIT";
	break;
	case "view" : $action="web_view_timetable.php";
	$heading="VIEW";
}
?>

<html>
<head>
<title>TIMETABLE</title>
<style>


</style>
<script>
	function validate()
		{
			sem = document.getElementById("semester").value;
			sec = document.getElementById("section").value;
			if((sem < 3 || sem > 8) || sem == "")
			{
				alert("PLEASE ENTER A VALID SEMESTER(3-8)");
				return false;
			}
			if(sec!='a'&& sec!='b'&& sec!='A'&&sec!='B')
			{
				alert("PLEASE ENTER A VALID SECTION(A or B)");
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
<article>
<h1><?php echo $heading; ?> TIMETABLE</h1>
<table>
<!--get semesters and sections according to branch using php-->
<form name="timetable" action="<?php echo $action; ?>" method="POST" onsubmit = "return validate();">
<tr><td>Semester </td><td><!--<input type="number" name="semester" id = "semester" required>-->
<select name="semester" id = "semester" required >
<option value="">Select</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
</select>
</td></tr>
<tr><td>Section </td><td><!--<input type="text" name="section" id = "section" required>-->
<select name="section" id = "section" required >
<option value="">Select</option>
<option value="A">A</option>
<option value="B">B</option>
</select>
</td></tr>
<?php
if($formtype=="new")
{
	echo "<tr><td>No. Of Periods : </td><td><select name='num_periods' id='num_periods' required>
	<option value='5'>5</option>
	<option value='7' selected='selected' >7</option>
	</select></td></tr>";
}
?>
<tr><td><input type="submit" name="submit" value="Get" class="button"></td><td><input type="reset" name="reset" value="Reset" class="button"></td></tr>
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