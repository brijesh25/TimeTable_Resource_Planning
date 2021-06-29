<?php require_once "check_login.php"; ?>
<html>
<head>
<title>SUBJECT ALLOTMENT</title>
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
<h1>ADD NEW SUBJECT </h1>
<table>
<form action="web_new_subject.php" method="POST">
<tr><td>Semester</td><td><input type="number" name="semester" value=""></td></tr>
<tr><td>Subject Name</td><td><input type="text" name="subject_name" value=""></td></tr>
<tr><td><input type="submit" name="submit" value="ADD" class="button"></td><td><input type="reset" name="reset" value="RESET" class="button"></td></tr>
</form>
</table>


<?php
if(isset($_POST['subject_name']) && isset($_POST['semester']) )
{
$subject_name=$_POST['subject_name'];
$semester=$_POST['semester'];

$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"timetable");

//$sql="insert into subject_master(subject_name,semester,section) values('".$subject_name."',$semester,'A'),('".$subject_name."',$semester,'B');";
$sql="insert into subject_master(subject_name,semester,section) values(upper('".$subject_name."'),".$semester.",'A'),(upper('".$subject_name."'),".$semester.",'B');";
//insert subject in capitals only

$result=mysqli_query($con,$sql);
echo "<h2>".$_POST['semester']." ". $_POST['subject_name']." ";
if($result!=null)
echo "Subject Added</h2>";
else
echo "Subject Not Added</h2>";

mysqli_close($con);
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
</html>