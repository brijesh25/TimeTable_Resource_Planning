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
<a href="web_add_period_engage.php"><button type="button" class="button" style="width:30%">Add Period Engagement</button></a><br><br>
<a href="web_view_p_engage.php"><button type="button" class="button" style="width:30%">View Period Engagement</button></a><br><br>
<a href="web_get_p_engage_form.php"><button type="button" class="button" style="width:30%">Remove Period Engagement</button></a>
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