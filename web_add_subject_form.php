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
$num=$_POST['num_subject'];
echo "<br><a href='web_get_subject.php?semester=".$semester."'><button class='button'>BACK</button></a>";
echo "<h3>Semester : ".$semester."</h3>";
echo "<form action='web_save_subject.php' method='POST'>
<input type='hidden' name='semester' value=".$semester.">";
echo "<table cellpadding=5 class='maintable' cellspacing=5 border=2><tr ><th colspan=4 style='text-align:center;'>ENTER SUBJECT NAMES</th></tr>"
		."<tr ><th>S.No.</th><th>Subject Code</th><th>Short Name</th><th>Full Name</th></tr>";
	for($j=1;$j<=$num;$j++)
		{
			
			echo "<tr><td>".$j."</td><td><input type='text' name='subject_code[]' required size='10'></td>"
			."<td><input type='text' name='subject_name[]' required size='10'></td>"
			."<td><input type='text' name='subject_fullname[]' required size='50'></td>"
			."</tr>";
			
		}
echo "<tr><td colspan=2><input type='submit' name='submit' value='SUBMIT' class='button'></td>
<td colspan=2><input type='reset' name='reset' value='RESET' class='button'></td></tr></table></form>";

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