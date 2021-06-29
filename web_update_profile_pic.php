<?php require_once "check_login.php"; ?>
<Html>
<head>
<title>PROFILE SETTINGS</title>
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
<h1>PROFILE SETTINGS</h1>
<a href="web_profile_setting.php"><button type="button" >BACK</button></a>
<?php 
$tid=$teacher_id;//tid from session variable's values //$_POST['teacher_id'];old when by passing hidden field

if ($_FILES['new_pic']['error']==4)//no file selected
{
	echo "<h3>No picture selected</h3>";

}
else if($_FILES['new_pic']['error']==0)//file is selected
{
	//echo " <h3>Picture selected</h3>";
	
	$img_type=$_FILES['new_pic']['type'];//getting file type
	//echo "<br>".$img_type;
	
	$allowed_type=array("image/jpg","image/jpeg","image/png");//only jpg,jpeg,png files are allowed
	
	if(in_array($img_type,$allowed_type))//returns true if $img_type is in array
	{
		//echo "<h3>File is of allowed image type, Uploading...</h3>";
		$img_extension=pathinfo($_FILES['new_pic']['name'],PATHINFO_EXTENSION);//for concatenating extension while uploading with name 'tid.extension'
		//echo "<br>".$img_extension;
		
		$new_filename=$tid.".".$img_extension;
		//echo "<h3>".$new_filename."</h3>";
		
		$image_path="profile_pics/".$new_filename;
		
		//connect to database
		$con=mysqli_connect("localhost","root","");
		mysqli_select_db($con,"timetable");
		
		$sql="update teacher set image_path='".$image_path."' where teacher_id=".$tid." ;";//updating image path for logged in user
		$result=mysqli_query($con,$sql);
		if($result)
		{
			move_uploaded_file($_FILES['new_pic']['tmp_name'],$image_path);//uploading file 
			echo "<h3>Updated Successfully</h3>";
			echo "<img src='".$image_path."' height=200 width=200 border=3>";
			$_SESSION['image_path']=$image_path;
		}
		else
		{
			echo "<h3>Failed to update profile picture</h3>";
		}
		
		mysqli_close($con);//close database connection
	}
	else
	{
		echo "<h3>only jpg,jpeg,png files are allowed</h3>";
	}
	
}
?>

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