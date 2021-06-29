<?php require_once "check_login.php"; ?>
<html>
<head>
<title>NOTICE</title>
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
<h1>SEND NOTICE</h1>
<a href="notice.php"><button type="button" class="button">BACK</button></a><br>
<?php
//$date=$_POST['date'];
//$time=$_POST['time'];
$from_user=$teacher_id;//tid from session variable's value //$_POST['from_user'];old method
$to_user=$_POST['to_user'];
$semester=$_POST['semester'];
$section=strtoupper($_POST['section']);
$subject=$_POST['subject'];
$notice=$_POST['notice'];

//print_r($_FILES);
if( count($_FILES['attachment']['name'])==1 && $_FILES['attachment']['error'][0]==4 )//if no files selected ,error=4 given and count is 1
{
	$attachment=0;
}
else
{
	$attachment=count($_FILES['attachment']['name']);
}
$date=date("Y-m-d",time());//get current date
$time=date("H:i:s",time());//get current time in hh:mm:ss 24hr format
echo "<table cellpadding=5 class='maintable' cellspacing=5 width='70%' border=2>
<tr><td width='25%' >Date : </td><td width='25%' >".$date."</td>"
."<td width='25%' >Time : </td><td width='25%' >".$time."</td></tr>"
."<tr><td>From : </td><td>".$teacher_name."</td>"
."<td>To : </td><td>".$to_user."</td></tr>"
."<tr><td>Semester : </td><td>". $semester."</td>"
."<td>Section : </td><td>". $section."</td></tr>"
."<tr><td>Subject : </td><td colspan='3' >". $subject."</td></tr>"
."<tr><td>Notice : </td><td colspan='3'>". $notice."</td></tr>"
."<tr><td>Attachment : </td><td colspan='3'>". $attachment."</td></tr></table>";

$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"timetable");
if($to_user=="students")
{
$sql="insert into notice(date,time,from_user,to_user,semester,section,subject,notice,attachment) 
values('".$date."','".$time."',".$from_user.",'".$to_user."',".$semester.",'".$section."','".$subject."','".$notice."',".$attachment.") ;";
//values('".$date."','".$time."',$from_user,'$to_user',$semester,'".$section."','".$subject."','".$notice."',$attachment) ;";
}
else
{
	$sql="insert into notice(date,time,from_user,to_user,subject,notice,attachment) 
values('".$date."','".$time."',".$from_user.",'".$to_user."','".$subject."','".$notice."',".$attachment.") ;";
}
$result=mysqli_query($con,$sql);

if($result)
{
	if($attachment!=0)
	{
		//get the nid of inserted notice
			if($to_user=="students")//then only notice will have semester section value
			{
				$sql_1="select nid from notice where (date,time,from_user,to_user,semester,section,subject,notice,attachment) = 
				('".$date."','".$time."',".$from_user.",'".$to_user."',".$semester.",'".$section."','".$subject."','".$notice."',".$attachment.") ;";
			}
			else
			{
				$sql_1="select nid from notice where (date,time,from_user,to_user,subject,notice,attachment) = 
				('".$date."','".$time."',".$from_user.",'".$to_user."','".$subject."','".$notice."',".$attachment.") ;";
			}
		
		$nid_result=mysqli_query($con,$sql_1);
		if(mysqli_num_rows($nid_result)!=0)
		{
			$nid=mysqli_fetch_array($nid_result)['nid'];//storing nid
			//echo "<br>".$nid;
			//to save attachments permanently in attach_files folder and concatenate nifd with files name
			echo "<table cellpadding=5 class='maintable' cellspacing=5 width='100%' >";
			
			for($i=0;$i<count($_FILES['attachment']['name']);$i++ )
			{
				if(($i+1)%3==1)
					{
						echo "<tr>";
					}
					
				$name=$_FILES['attachment']['name'][$i];
				$target_path="attach_files/".$nid."_".$name;
				
				if(!file_exists($target_path))
				{
					
					move_uploaded_file($_FILES['attachment']['tmp_name'][$i],$target_path);
					
					$sql_attach="insert into attachment(file_name,path,nid) values('".$name."','".$target_path."',".$nid.")";
					$result_attach=mysqli_query($con,$sql_attach);
					if(!$result_attach)
					{
						echo "<td>insert in db failed</td>";
					}
					else
					{
						echo "<td>Uploaded file <a href='attach_files/".$nid."_".$name."'>".$name."</a></td>";
					}
				}
				else
				{
					echo "<td>file already exists</td>";
				}
				if(($i+1)%3==0)
					{
						echo "</tr>";
					}
				
			}
			echo "</table>";
			
		}
		else
		{
			echo "<br>nid not found";
		}
	}
	echo "<h2>Sent Succesfully</h2>";
}
else
{
	echo "<h2>Failed To Send</h2>";
}
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
</Html>