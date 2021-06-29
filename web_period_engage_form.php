<?php require_once "check_login.php"; ?>
<?php
$formtype=$_GET['formtype'];
switch($formtype)
{
	case "period" : $action="web_p_engage_period.php";
	$heading="PERIOD BASED";
	break;
	case "subject" : $action="web_p_engage_subject.php";
	$heading="SUBJECT BASED";
	
}
?>

<html>
<head>
<title>PERIOD ENGAGEMENT</title>
<style>

</style>
<link rel="stylesheet" type="text/css" href="SideBarNavigation.css"> 
<link rel="stylesheet" type="text/css" href="header-footer.css"> 
<link rel="stylesheet" type="text/css" href="Content_and_Button.css"> 
<script>
	function period_based_validate()
	{
		sem = document.getElementById("semester").value;
		period = document.getElementById("period").value;
		pdate = document.getElementById("pdate");
		sec = document.getElementById("section").value;
		if(sem.match(/[^3-8]/)||sem == "")
		{
			alert("PLEASE ENTER A VALID SEMESTER(3-8)");
			return false;
		}
		if(sec!='a'&&sec!='b'&&sec!='A'&&sec!='B')
		{
			alert("PLEASE ENTER A VALID SECTION(A or B)");
			return false;
		}
		if(period < 1 || period > 7)
		{
			alert("INVALID PERIOD NUMBER");
			return false;
		}
		var d = new Date();
		if(pdate < d)//NOT WORKING 
		{
			alert("INVALID DATE SELECTED");
			return false;
		}
	}
	function subject_based_validate()
	{
		sem = document.getElementById("semester").value;
		sec = document.getElementById("section").value;
		if(sem.match(/[^3-8]/)||sem == "")
		{
			alert("PLEASE ENTER A VALID SEMESTER(3-8)");
			return false;
		}
		if(sec!='a'&&sec!='b'&&sec!='A'&&sec!='B')
		{
			alert("PLEASE ENTER A VALID SECTION(A or B)");
			return false;
		}
	}
</script>
</head>
<body>
 
<!--MENU-->
<?php
require_once "web_menu.php";
?>

<div>
<div id="content">
<article>
<h1><?php echo $heading; ?> PERIOD ENGAGEMENT</h1>


<?php
	if($formtype=="period")
	{
?>
	<table>
	<form name="timetable" action="<?php echo $action; ?>" method="POST" onsubmit = "return period_based_validate();">
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
	<tr><td>Period No. </td><td><!--<input type="text" name="period" id ="period" required ="required">-->
	<select name="period" id="period" required>
	<option value="">Select</option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option>
	<option value="7">7</option>
	</select>
	</td></tr>
	<tr><td>Date </td><td><input type="date" name="date" id ="pdate" required ="required"></td></tr>
	<tr><td><input type="submit" name="submit" value="Get" class="button"></td><td><input type="reset" name="reset" value="Reset" class="button"></td></tr>
	</form>
	</table>
<?php
	}
	else
	{
?>
	<table>
	<form name="timetable" action="<?php echo $action; ?>" method="POST" onsubmit = "return subject_based_validate();">
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
	<tr><td><input type="submit" name="submit" value="Get" class="button"></td><td><input type="reset" name="reset" value="Reset" class="button"></td></tr>
	</form>
	</table>
<?php
	}
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