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
<h1>SUBJECT ALLOTMENT</h1>
<a href="web_suballot.php"><button type="button" class="button">Back</button></a><br>
<table>
<form name="suballot" action="web_view_allot.php" method="POST" onsubmit = "return validate();">
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
<div align="center">
	<?php
		if(isset($_POST['semester'])&&isset($_POST['section']))
		{
			$semester=$_POST['semester'];
			$section=$_POST['section'];
			echo "<h3>Semester = ".$semester." Section = ".$section."</h3>";
			
			$con=mysqli_connect("localhost","root","");
			mysqli_select_db($con,"timetable");

			$sql="select subject_name,teacher_name from 
			subject_master natural join teacher_subject natural join teacher 
			where semester=".$semester." and section='".$section."' ;";
			$result=mysqli_query($con,$sql);
			
				echo "<table cellpadding=5 class='maintable'>
				<tr>
				<th>Subject Name</th>
				<th> Teacher Name</th>
				</tr>";
				if(mysqli_num_rows($result)!=0)
				{
					for($i=0;$i<mysqli_num_rows($result);$i++)
					{
						$row=mysqli_fetch_array($result);
						echo "<tr>
						<td>".$row['subject_name']."</td>
						<td>".$row['teacher_name']."</td>
						</tr>";
					}
					echo "<tr>
					<td colspan=2 style='text-align:center;'><a href='web_edit_allot.php?semester=".$semester."&section=".$section."'><button type='button' class='button' style='padding-left: 20px;'>EDIT ALLOTMENT</button></a></td>
					</tr>";
				}
				else
				{
					echo "<tr><td colspan='2' align=center>No Allotment Found</td><tr>";
				}
				
				echo "</table>";
				mysqli_close($con);
			
		}
	?>
</div>
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