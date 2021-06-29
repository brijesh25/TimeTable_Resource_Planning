<?php require_once "check_login.php"; ?>
<html>
<head>
<title>MANAGE FACULTY</title>
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
<h1>MANAGE FACULTY</h1>
<a href="web_addfaculty_form.php"><button type="button" class="button">ADD FACULTY</button></a>
<a href="web_get_teachers.php"><button type="button" class="button">DELETE FACULTY</button></a>
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