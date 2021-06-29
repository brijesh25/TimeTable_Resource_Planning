<?php require_once "check_login.php"; ?>
<html>
<head>
<title>NOTICE</title>
<style>

.option1{
	width:100%;
}

.table1{
	padding: 3px;

}

</style>
<script type="text/javascript">
function show_sem_sec()//to show semester section input only when student is selected
{
	//alert("just to check function call");
	to_user=document.getElementById("to_user").value;
	sem_row=document.getElementById("semesterrow");
	sec_row=document.getElementById("sectionrow");
	
	if(to_user=="students")
	{
		sem_row.style.visibility="visible";
		sec_row.style.visibility="visible";
		
		
	}
	else
	{
		sem_row.style.visibility="collapse";
		sec_row.style.visibility="collapse";
	}
}
function validate()
{
	subject = document.getElementById("subject").value;
	to_user=document.getElementById("to_user").value;
	notice=document.getElementById("notice").value;
	if(to_user == "students")
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
	if(subject.length > 80)
	{
		alert("SUBJECT SHOULD NOT BE MORE THAN 80 CHARACTER");
		return false;
	}
	if(notice.length > 20000)
	{
		alert("BODY SHOULD NOT BE MORE THAN 20,000 CHARACTER");
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
<h1>SEND NOTICE</h1>
</article>
<div align="center">
<form name="notice_form" action="web_add_notice.php" method="Post" enctype="multipart/form-data" onsubmit= "return validate();">
<table frame="border" class="table1">
<!-- <tr><td>Date (DD-MM-YYYY)</td><td><input type="date" name="date" value=""></td></tr>
<tr><td>Time (HH:MM:AM/PM)</td><td><input type="time" name="time" value=""></td></tr> -->
<tr><td>To : </td><td><select name="to_user" id="to_user" onchange="show_sem_sec()" class="option1" required>
	<option value="">Select</option>
	<option value="teachers">Teacher</option>
	<option value="students">Students</option>
	<option value="all">All</option>
	</select></td></tr>
<tr id="semesterrow" style="visibility:collapse" ><td>Semester </td><td><!--<input type="numeric" name="semester" id="semester" value="" >-->
<select name="semester" id = "semester"  >
<option value="">Select</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
</select>
</td></tr>
<tr id="sectionrow" style="visibility:collapse" ><td>Section </td><td><!--<input type="text" name="section" id="section" value="" >-->
<select name="section" id = "section"  >
<option value="">Select</option>
<option value="A">A</option>
<option value="B">B</option>
</select>
</td></tr>
<tr><td>Subject : </td><td><input type="text" name="subject" value="" id="subject" class="option1" required = "required"></td></tr>
<tr><td>Notice : </td><td><textarea name="notice" value="" rows="10" cols="75" id="notice" class="option1" required></textarea></td></tr>

<tr><td>Attachments : </td><td><input type="file" name="attachment[]" multiple="" class="option1"></td></tr>
<tr><td><br></td></tr>
<tr><td><input type="submit" name="submit" value="Send" class="button"></td><td><input type="reset" name="reset" value="Reset" class="button" text-align="center"></td></tr>
</table>
</form>
</div>
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