<?php require_once "check_login.php"; ?>
<html>
<head>
<title>NOTICE</title>

<link rel="stylesheet" type="text/css" href="SideBarNavigation.css"> 
<link rel="stylesheet" type="text/css" href="header-footer.css"> 
<link rel="stylesheet" type="text/css" href="Content_and_Button.css">

<style>


</style>

</head>
<body>
 
<!--MENU-->
<?php
require_once "web_menu.php";
?>

<div>
	<div id="bodycontent">
		<article>
		<h1>NOTICE</h1>
		<a href="web_notice_form.php"><button type="button" class="button">SEND NOTICE</button></a>
		<a href="web_get_notice.php"><button type="button" class="button">VIEW NOTICES</button></a>
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