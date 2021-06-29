<?php require_once "check_login.php"; ?>
<html>
<head>
<title>VIEW NOTICE</title>
<link rel="stylesheet" type="text/css" href="SideBarNavigation.css"> 
<link rel="stylesheet" type="text/css" href="header-footer.css"> 
<link rel="stylesheet" type="text/css" href="Content_and_Button.css">

<style>
#noticebody
{
	white-space: pre-wrap;
}

</style>
 </head>
<body>
 
<!--MENU-->
<?php
require_once "web_menu.php";
?>

<div>
<div id="content">
	<article>
	<h1>NOTICE</h1>
	<a href="notice.php"><button type="button" class="button">BACK</button></a><br><br>

	<?php
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"timetable");

	$sql= "SELECT notice.*,teacher_name FROM notice join teacher on from_user=teacher_id order by nid desc;"; //"select * from notice order by nid desc;";
	$result=mysqli_query($con,$sql);
	if($result)
	{
		if(mysqli_num_rows($result)!=0)
		{
			for($i=0;$i<mysqli_num_rows($result);$i++)
			{
				$notice_row=mysqli_fetch_array($result);
				echo "<table cellpadding=5 class='maintable' cellspacing=5 width='70%' border=2>";
				echo "<tr><td width='25%' >Date : </td><td width='25%' >".$notice_row['date']."</td>"
				."<td width='25%' >Time : </td><td width='25%'>".$notice_row['time']."</td></tr>"
				."<tr><td>From : </td><td>".strtoupper($notice_row['teacher_name'])."</td>"
				."<td>To : </td><td>".$notice_row['to_user']."</td></tr>"       //".$notice_row['from_user']."<br>"
				."<tr><td>Semester : </td><td>".$notice_row['semester']."</td>"
				."<td>Section : </td><td>".$notice_row['section']."</td></tr>"
				."<tr><td>Subject : </td><td colspan='3'>".$notice_row['subject']."</td></tr>"
				."<tr><td>Notice : </td><td colspan='3' id='noticebody'>".$notice_row['notice']."</td></tr>"
				."<tr><td >Attachment : </td><td colspan='3'>";
				
				if($notice_row['attachment']==0)
				{
					//echo $notice_row['attachment'];
					echo "No Attachments";
				}
				else
				{
					//echo "Attachments are as follows :<br>";
					$sql_1="select * from attachment where nid = ".$notice_row['nid']." order by aid asc";
					$result_1=mysqli_query($con,$sql_1);
					if($result_1)
					{
						echo "<table cellpadding=5 class='maintable' cellspacing=5 width='100%' >";
						for($j=1;$j<=mysqli_num_rows($result_1);$j++)
						{
							$attach_row=mysqli_fetch_array($result_1);
							if($j%3==1)
							{
								echo "<tr>";
							}
							echo "<td><a href='".$attach_row['path']."'>".$attach_row['file_name']."</a></td>";
							if($j%3==0)
							{
								echo "</tr>";
							}
						}
						echo "</table>";
					}
				}
				echo "</td></tr>"
				."</table><br><hr><br>";
			}
		}
		else
		{
			echo "No Notices Found";
		}
		
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