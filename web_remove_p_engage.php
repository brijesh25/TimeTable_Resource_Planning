<?php require_once "check_login.php"; ?>
<html>
<head>
<title>PERIOD ENGAGEMENT</title>
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
<h1>PERIOD ENGAGEMENT</h1>
<a href="web_period_engage.php"><button type="button" class="button">BACK</button></a><br>

<?php
if(isset($_POST['pe_id']) && count($_POST['pe_id'])>0 )
{
		
	$peid_list=$_POST['pe_id'];
	$peid_string=$peid_list[0];//first tid in string

	for($i=1;$i<count($peid_list);$i++)
	{
		$peid_string = $peid_string .",". $peid_list[$i];//comma seperated tid's string
	}

	//echo $peid_string;
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"timetable");

	$sql="delete from period_engagement where pe_id IN (".$peid_string.") ;";
	$result=mysqli_query($con,$sql);
	if($result)
	{
		echo "<h2> ".count($peid_list)." Engagements Removed Successfully </h2>";
	}
	else
		echo "<h2>Failed to Remove Engagements</h2>"	;

	mysqli_close($con);
}
else
{
	echo "<h2>No Period Engagements selected !!!</h2>"	;
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