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
$semester=$_POST['semester'];
$section=strtoupper($_POST['section']);
$pno=$_POST['period'];
$date=$_POST['date'];
$subject_name=$_POST['subject_name'];
$teacher_name=$_POST['teacher_name'];

//print_r($date);
//print_r($pno);
//print_r($subject_name);
//print_r($teacher_name);

$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"timetable");


if(!is_array($pno))//count($pno)<=1 old condition //if only one period_engagement is there
{
	$d=date_timestamp_get(date_create($date));
	$day=date("l ",$d);
	
	$check_sql="select * from period_engagement where 
	(semester,section,period,pe_date,pe_day,subject_name,teacher_name) = (".$semester.",'".$section."',".$pno.",'".$date."','".$day."','".$subject_name."','".$teacher_name."');";
	$check_result=mysqli_query($con,$check_sql);
	if(mysqli_num_rows($check_result)!=0)
	{
		echo  "<br>Engagement already exists.</td></tr>";
	}
	else
	{
		
		$sql="insert into period_engagement(semester,section,period,pe_date,pe_day,subject_name,teacher_name) 
		values(".$semester.",'".$section."',".$pno.",'".$date."','".$day."','".$subject_name."','".$teacher_name."');";
		$result=mysqli_query($con,$sql);
		
		if($result)
		{
			echo " <br>Added Period Engagement ";
			echo "<table border=5 cellpadding=5 class='maintable'>
					<tr><th colspan=7 > Period Engagement details</th></tr>
					<tr>
					<th>Date</th>
					<th>Day</th>
					<th>Period No.</th>
					<th>Subject Name</th>
					<th>Teacher Name</th>
					<th>Semester</th>
					<th>Section</th>
					</tr>
					<tr>
					<td>".date("d-m-Y ",$d)."</td>
					<td>".$day."</td>
					<td>".$pno."</td>
					<td>".$subject_name."</td>
					<td>".$teacher_name."</td>
					<td>".$semester."</td>
					<td>".$section."</td>
					</tr>
					</table>";
			//to add notice on period engagement
			$notice_date=date("Y-m-d",time());//get current date
			$time=date("H:i:s",time());//get current time in hh:mm:ss 24hr format
			$subject="PERIOD ENGAGEMENT";
			$notice="On ".date("d-m-Y ",$d).",".$day." , Period no. ".$pno." of ".$semester." sem ,section ".$section." will be of ".$subject_name." ,taken by ".$teacher_name." .";
			$sql_notice="insert into notice(date,time,from_user,to_user,semester,section,subject,notice,attachment) 
			values('".$notice_date."','".$time."',".$teacher_id.",'students',".$semester.",'".$section."','".$subject."','".$notice."',0) ;";
			//values('".$date."','".$time."',$from_user,'$to_user',$semester,'".$section."','".$subject."','".$notice."',$attachment) ;";
			$result_notice=mysqli_query($con,$sql_notice);
			if($result_notice)
			{
				echo "Notice sent successfully";
			}
			else
			{
				echo "Failed to send notice";
			}
		}
		else
		{
			echo " Failed to add Period Engagement ";
		}
	}
}
else//if more than one period_engagement is there
{
	$notice="";
	for($i=0;$i<count($pno);$i++)
	{
		$d=date_timestamp_get(date_create($date[$i]));
		$day=date("l ",$d);
		
		$check_sql="select * from period_engagement where 
		(semester,section,period,pe_date,pe_day,subject_name,teacher_name)=
		(".$semester.",'".$section."',".$pno[$i].",'".$date[$i]."','".$day."','".$subject_name[$i]."','".$teacher_name[$i]."');";
		$check_result=mysqli_query($con,$check_sql);
		if(mysqli_num_rows($check_result)!=0)
		{
			echo  "<br>".($i+1) ." Engagement already exists.</td></tr>";
		}
		else
		{
			
			$sql="insert into period_engagement(semester,section,period,pe_date,pe_day,subject_name,teacher_name) 
			values(".$semester.",'".$section."',".$pno[$i].",'".$date[$i]."','".$day."','".$subject_name[$i]."','".$teacher_name[$i]."');";
			$result=mysqli_query($con,$sql);
			
			if($result)
			{
				echo " <br>".($i+1) ." Added Period Engagement ";
				echo "<table border=5 cellpadding=5 class='maintable'>
						<tr><th colspan=7 > Period Engagement details</th></tr>
						<tr>
						<th>Date</th>
						<th>Day</th>
						<th>Period No.</th>
						<th>Subject Name</th>
						<th>Teacher Name</th>
						<th>Semester</th>
						<th>Section</th>
						</tr>
						<tr>
						<td>".date("d-m-Y ",$d)."</td>
						<td>".$day."</td>
						<td>".$pno[$i]."</td>
						<td>".$subject_name[$i]."</td>
						<td>".$teacher_name[$i]."</td>
						<td>".$semester."</td>
						<td>".$section."</td>
						</tr>
						</table>";
						//notice for all engagements
						$notice=$notice."\n On ".date("d-m-Y ",$d).",".$day." , Period no. ".$pno[$i]." of ".$semester." sem ,section ".$section." will be of ".$subject_name[$i]." ,taken by ".$teacher_name[$i]." .\n";
						
			}
			else
			{
				echo " Failed to add Period Engagement ";
			}
		}
	}
	if($notice!="")
	{
		//to add notice on period engagement
		$notice_date=date("Y-m-d",time());//get current date
		$time=date("H:i:s",time());//get current time in hh:mm:ss 24hr format
		$subject="PERIOD ENGAGEMENT LIST";
		$sql_notice="insert into notice(date,time,from_user,to_user,semester,section,subject,notice,attachment) 
		values('".$notice_date."','".$time."',".$teacher_id.",'students',".$semester.",'".$section."','".$subject."','".$notice."',0) ;";
		//values('".$date."','".$time."',$from_user,'$to_user',$semester,'".$section."','".$subject."','".$notice."',$attachment) ;";
		$result_notice=mysqli_query($con,$sql_notice);
		if($result_notice)
		{
			echo "Notice sent successfully";
		}
		else
		{
			echo "Failed to send notice";
		}
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