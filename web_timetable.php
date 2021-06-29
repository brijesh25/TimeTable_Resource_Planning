<?php require_once "check_login.php"; ?>
<html>
<head>
<title>HOME PAGE</title>
<style>
nav
{
 float : left;
 max-width : 260px;
 margin : 0;
 padding : 3em;
 border : 3px solid black; 
 text-align : left;
}

</style>


<link rel="stylesheet" type="text/css" href="SideBarNavigation.css"> <link rel="stylesheet" type="text/css" href="header-footer.css"> <link rel="stylesheet" type="text/css" href="Content_and_Button.css"> </head>
<body>
 
<!--MENU-->
<?php
require_once "web_menu.php";
?>

<div>
<div id="content">
<article>
<h1>TIMETABLE</h1>
<a href="web_timetable_form.php?formtype=new"><button type="button" class="button">ADD NEW TIMETABLE</button></a>
<a href="web_timetable_form.php?formtype=view"><button type="button" class="button">VIEW TIMETABLE</button></a>
<a href="web_timetable_form.php?formtype=edit"><button type="button" class="button">EDIT TIMETABLE</button></a>
</article>
</div>

		<?php
		require_once "web_right_sidebar.php";
		?>
</div>


<div id="footer">     	   	Copyright © BIT DURG || Website Design & Maintain by <span style="color: red">CSE Department</span>  </div> </body>          
</Html>