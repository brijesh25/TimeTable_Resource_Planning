<?php require_once "check_login.php"; ?>
<html>
<head>
<title>SUBJECT ALLOTMENT</title>
<style>


</style>
<script>
	function validate()
	{
		nsub = document.getElementById("num_subject").value;
		if(nsub < 1 || nsub > 10)
		{
			alert("YOU CAN NOT ADD MORE THAN 10 SUBJECT OR LABS AT A TIME");
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
<div style='float:left'>
<br><a href="web_new_subject.php"><button class="button">BACK</button></a>
<?php
$semester=$_REQUEST['semester'];

echo "<h3>Semester : ".$semester."</h3>";
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"timetable");

$sql="select * from subject_master where semester=".$semester.";";//all sections have same subject
$subjectlist=mysqli_query($con,$sql);
if(mysqli_num_rows($subjectlist)!=0)
{
	echo "<table cellpadding=5 class='maintable' cellspacing=5 ><tr><th>S.No.</th><th>SUBJECT CODE</th><th>SUBJECT NAMES</th><th>SUBJECT FULLNAMES</th></tr>";
	for($j=0;$j<mysqli_num_rows($subjectlist);$j++)
		{
			$subject_row=mysqli_fetch_array($subjectlist);
			echo "<tr><td>".($j+1)."</td><td>".$subject_row['subject_code']."</td>"
			."<td>".$subject_row['subject_name']."</td>"
			."<td>".$subject_row['subject_fullname']."</td>"
			."</tr>";
			
		}
	echo "</table></div>";

}
else
{
	echo "No Subjects Found";
}	


echo "<br><form action='web_add_subject_form.php' method='POST' onsubmit = 'return validate();'>
<input type='hidden' name='semester' value=".$semester.">
<div>
<table>
<tr><td>Enter no. of subject you want to add : </td><td><input type='number' name='num_subject' value='' id = 'num_subject' required></td></tr>
<tr><td><input type='submit' name='submit' value='SUBMIT' class='button'></td><td><input type='reset' name='reset' value='RESET' class='button'></td></tr>
</table></form>
</div>";
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
</html>