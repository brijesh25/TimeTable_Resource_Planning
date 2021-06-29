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

<?php
$semester=$_POST['semester'];
$subject_code=$_POST['subject_code'];
$subject_name=$_POST['subject_name'];
$subject_fullname=$_POST['subject_fullname'];


$num=count($subject_name);
//echo "<br>".$num; //no. of subjects
echo "<br><a href='web_get_subject.php?semester=".$semester."'><button>BACK</button></a>";
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"timetable");
echo "<h3>Semester : ".$semester."</h3>";
echo "<table cellpadding=5 class='maintable' cellspacing=5 border=2><tr><th colspan=2>SUBJECT NAMES</th></tr>";

for($i=0;$i<$num;$i++)
{
	//echo "<br>".$subject_name[$i];

	$check_sql="select * from subject_master where semester= ".$semester." and subject_code= '".$subject_code[$i]."' ;";
	$check_result=mysqli_query($con,$check_sql);
	if(mysqli_num_rows($check_result)!=0)
	{
		echo  "<tr><td>".$subject_name[$i]." : </td><td> Subject already exists.</td></tr>";
	}
	else
	{
		//$sql="insert into subject_master(subject_name,semester,section) values('".$subject_name."',$semester,'A'),('".$subject_name."',$semester,'B');"; old and incorrect
		$sql="insert into subject_master(subject_code,subject_name,subject_fullname,semester) values(".$subject_code[$i].",upper('".$subject_name[$i]
												."'),upper('".$subject_fullname[$i]."'),".$semester.");";
		//insert subject in capitals only

		$result=mysqli_query($con,$sql);
		echo "<tr><td>". $subject_name[$i]."  </td><td>";
		if($result)
		{
			echo " Subject Added </td></tr>";
		}
		else
		{
			echo " Subject Not Added </td></tr>";//not added into db; 
		}
	}
}
echo "</table>";
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