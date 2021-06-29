<?php require_once "check_login.php"; ?>
<html>
<head>
<title>SUBJECT ALLOTMENT</title>
<style>

</style>
<script>
	function validate()
	{
		sem = document.getElementById("semester").value;
		if(sem < 3 || sem > 8)
		{
			alert("PLEASE ENTER A VALID SEMESTER(3-8)");
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
<h1>ADD NEW SUBJECT </h1>
<table>
<form action="web_get_subject.php" method="POST" onsubmit = "return validate();">
<tr><td>Semester</td><td><!--<input type="number" name="semester" id = "semester" required>-->
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
<!-- <tr><td>Subject Name</td><td><input type="text" name="subject_name" value=""></td></tr> -->
<tr><td><input type="submit" name="submit" value="GET SUBJECTS" class="button"></td><td><input type="reset" name="reset" value="RESET" class="button"></td></tr>
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
</html>