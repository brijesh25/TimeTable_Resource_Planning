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
<?php
		if(isset($_POST['semester'])&&isset($_POST['section']))
		{
			$semester=$_POST['semester'];
			$section=$_POST['section'];
			echo "<h3>Semester = ".$semester." Section = ".$section."</h3>";
			$con=mysqli_connect("localhost","root","");
			mysqli_select_db($con,"timetable");
				
			if(!isset($_POST['subject']))
			{
?>
				<form action="web_p_engage_subject.php" method="POST">
				<table>
				<tr>
				<td>From :</td><td><input type='date' name='from_date' required></td>
				<td>To :</td><td><input type='date' name='to_date' required></td>
				</tr>
				</table>
				<br>
<?php		
			
				$con=mysqli_connect("localhost","root","");
				mysqli_select_db($con,"timetable");

				$sql="select subject_name,teacher_name from 
				subject_master natural join teacher_subject natural join teacher 
				where semester=".$semester." and section='".$section."' ;";
				$result=mysqli_query($con,$sql);
				
				echo "<input type='hidden' name='semester' value='".$semester."'>
				<input type='hidden' name='section' value='".$section."'>";
				
				echo "<table cellpadding=5 class='maintable'>
				<tr>
				<th>Subject Name</th>
				<th colspan=2> Teacher Name</th>
				</tr>";
				if(mysqli_num_rows($result)!=0)
				{
					for($i=0;$i<mysqli_num_rows($result);$i++)
					{
						$row=mysqli_fetch_array($result);
						echo "<tr>
						<td>".$row['subject_name']."</td>
						<td>".$row['teacher_name']."</td>
						<td><input type='radio' name='subject' value='".$row['subject_name']."' required></td>
						</tr>";
					}
					
				}
				else
				{
					echo "<tr><td colspan='2' align=center>No Allotment Found</td><tr>";
				}
				
				echo "</table>";
?>
				<br>
				<input type='submit' name='submit' value='Submit' class="button">
				&nbsp;
				<input type='reset' name='reset' value='Reset' class="button">
				</form>
<?php
			}
			else
			{
				$from_date=$_POST['from_date'];
				$to_date=$_POST['to_date'];
				$subject=$_POST['subject'];
				echo "".$from_date." ".$to_date." ".$subject."<br>";
				
				$fd=date_create($from_date);//create date type object from string
				$td=date_create($to_date);//create date type object from string
				$d=date_diff($fd,$td);//it return object of DateInterval type ,used to get diff in dates
				$num_days=$d->d ;//it returns no of days between given dates / use print_r($d) to see details of an object of any class in human readble form
				echo "<br>No. of days = ".$num_days;
				$found=0;//flag to check if any period exist between given dates
				
				if(!isset($_POST['engage']))
				{
					echo "<form action='web_p_engage_subject.php' method='POST' >";//start of form for selecting engagement
				}
				else
				{
					echo "<form action='web_add_p_engage.php' method='POST' >";//start of form for submiting selected engagement
				}
				echo "<input type='hidden' name='semester' value='".$semester."'>
						<input type='hidden' name='section' value='".$section."'>
						<input type='hidden' name='from_date' value='".$from_date."'>
						<input type='hidden' name='to_date' value='".$to_date."'>
						<input type='hidden' name='subject' value='".$subject."'>";
				
				//to view subject allot list for period engagement
						$sql_2="select tsrelation_id,subject_name,teacher_name from 
						subject_master natural join teacher_subject natural join teacher 
						where semester=".$semester." and section='".$section."' ;";
						$allot_result=mysqli_query($con,$sql_2);
				
				{//block of code for 'from date' from date only
					$d_string = date("d-m-y",date_timestamp_get($fd) );// for 'from date' checking if there is any period
					$day = date("l",date_timestamp_get($fd) );
					//echo "<br>".$day."  ".$d_string; for checking dates are correct
					if($day!="Sunday")
						{
							$sql_1="select period,ptime,".$day." from timetable where semester=".$semester." and section='".$section."' and ".$day."='".$subject."' ;";
							$result_1=mysqli_query($con,$sql_1);
							if(mysqli_num_rows($result_1)!=0)
							{
								
								
								while($row=mysqli_fetch_array($result_1))
								{
									$found=$found+1;//period found
									echo "<br>".$day."  ".$d_string;
									echo "<table cellpadding=5 class='maintable'><tr><td>";
									echo "<table border=5 cellpadding=5 class='maintable'>
										<tr><th colspan=3 >Regular Period Details</th></tr>
										<tr>
										<th>Period No.</th>
										<th>Time</th>
										<th>Subject</th>
										</tr>
										<tr>
										<td>".$row['period']."</td>
										<td>".$row['ptime']."</td>
										<td>".$row[$day]."</td></tr>
										</table>
										<br>";
									echo "</td><td>";
										allotlist_form($semester,$section,$row,$allot_result,$fd,$found,$con);//to add allot list form for selecting engagement
									echo "</td></tr></table>";
								}
							}
						}
				}

				{// block of code for dates after 'from date' 
					
						
					$n=date_interval_create_from_date_string("");
					$n->d=1;
					//making $n a DateInterval type obj with d i.e day=$i,value we want to increment date by, as 
					//to get incremented date ,used date_add(Date obj,DateInterval obj) that will return Date type object , and to get DateInterval type obj as argument,				
					for($i=1;$i<=$num_days;$i++)// for dates after 'from date' checking if there is any period
					{
						//print_r($n);
						//print_r(date_add($fd,$n));
						$d_string = date("d-m-y",date_timestamp_get( date_add($fd,$n) ) );
						$day=date("l",date_timestamp_get($fd) );
						//echo "<br>".$day."  ".$d_string; for checking dates are correct
						if($day!="Sunday")
						{
							$sql_1="select period,ptime,".$day." from timetable where semester=".$semester." and section='".$section."' and ".$day."='".$subject."' ;";
							$result_1=mysqli_query($con,$sql_1);
							if(mysqli_num_rows($result_1)!=0)
							{
								
								
								while($row=mysqli_fetch_array($result_1))
								{
									$found=$found+1;//period found
									echo "<br>".$day."  ".$d_string;
									echo "<table cellpadding=5 class='maintable'><tr><td>";
									echo "<table border=5 cellpadding=5 class='maintable'>
										<tr><th colspan=3 >Regular Period Details</th></tr>
										<tr>
										<th>Period No.</th>
										<th>Time</th>
										<th>Subject</th>
										</tr>
										<tr>
										<td>".$row['period']."</td>
										<td>".$row['ptime']."</td>
										<td>".$row[$day]."</td></tr>
										</table>
										<br>";
									echo "</td><td>";
										allotlist_form($semester,$section,$row,$allot_result,$fd,$found,$con);//to add allot list form for selecting engagement
									echo "</td></tr></table>";
								}
										
							}
						}
					}
					//date_add() changes the values $fd=$fd +1;
					//and then to get date in string form used date(formatString,int timestamp) and for geting timestamp used date_timestamp_get(Date obj).
				}
				
				if($found)
				{
					echo "<tr><td colspan=3><input type='submit' name='submit' value='Submit'></td></tr>";//submit of both types of form select engage and submit engage
				}
				else
				{
					echo "<br>No Periods Found <br>";
					echo "<a href='web_period_engage.php'><button type='button' >BACK</button></a>";
				}
				echo "</form>";//end of both types of form select engage and submit engage
				
			}
			
			
			mysqli_close($con);
		}
		//function to add allotlist form for selecting engagement	
			function allotlist_form($semester,$section,$row,$allot_result,$date,$pos,$con)
			{
				
				
				if(!isset($_POST['engage']))
				{
					//echo "<form action='web_p_engage_period.php' method='POST' > //do not remove the comment
					//echo "<form>";
					//echo "<input type='hidden' name='semester' value='".$semester."'>
					//<input type='hidden' name='section' value='".$section."'>";
					//<input type='hidden' name='period' value='".$row['period']."'>
					// "<input type='hidden' name='date' value='".date("Y-m-d",date_timestamp_get($date) )."'>
					echo "<table border=5 cellpadding=5 class='maintable'>
					<tr><th colspan=3>Select Engagement</th></tr>
					<tr>
					<th>Subject Name</th>
					<th colspan=2> Teacher Name</th>
					</tr>";
					if(mysqli_num_rows($allot_result)!=0)
					{
						mysqli_data_seek($allot_result,0);
						for($i=0;$i<mysqli_num_rows($allot_result);$i++)
						{
							$allot_row=mysqli_fetch_array($allot_result);
							echo "<tr>
							<td>".$allot_row['subject_name']."</td>
							<td>".$allot_row['teacher_name']."</td>
							<td><input type='radio' name='engage[".($pos-1)."]' value='".$allot_row['tsrelation_id']."' required></td>
							</tr>";
							//to make array of radio buttons give name=arrayname with index position i.e arrayname[i] 
							//it makes since radio buttons names will be different it will form different radio groups for each allot list form
							//when u submit it ,an array is submit with arrayname which we can easily access all the values 
							//,so we dont need to make diferent radio groups but putting different names entirely 
							//in that case we would have to access each by $_POST['whatever name']
						}
						//echo "<tr><td colspan=3><input type='submit' name='submit' value='Submit'></td></tr>"; //do not remove the comment
					}
					else
					{
						echo "<tr><td colspan='2' align=center>No Allotment Found</td><tr>";
					}
					
					echo "</table>";
					//echo "</form>"; //do not remove the comment
				}
				else
				{
					//print_r($_POST['engage']);
					$ts_id=$_POST['engage'][$pos-1];
					//to view selected subject allot  for period engagement
					$sql_3="select tsrelation_id,subject_name,teacher_name from 
					subject_master natural join teacher_subject natural join teacher 
					where tsrelation_id=".$ts_id."  ;";
					
					$engage_result=mysqli_query($con,$sql_3);
					$engage_row=mysqli_fetch_array($engage_result);
					//echo "<form action='web_add_p_engage.php' method='POST' >// do not remove the comment
					//echo "<form>";
					//echo "<input type='hidden' name='semester' value='".$semester."'>
					//	<input type='hidden' name='section' value='".$section."'>";
					echo "<input type='hidden' name='period[]' value='".$row['period']."'>
						<input type='hidden' name='date[]' value='".date("Y-m-d",date_timestamp_get($date) )."'>
						<input type='hidden' name='subject_name[]' value='".$engage_row['subject_name']."'>
						<input type='hidden' name='teacher_name[]' value='".$engage_row['teacher_name']."'>";
					echo "<table border=5 cellpadding=5 class='maintable'>
						<tr><th colspan=2>Selected Engagement</th></tr>
						<tr>
						<th>Subject Name</th>
						<th> Teacher Name</th>
						</tr>";
						
						echo "<tr>
						<td>".$engage_row['subject_name']."</td>
						<td>".$engage_row['teacher_name']."</td>
						</tr>";
						
						//echo "<tr><td colspan=3><input type='submit' name='submit' value='Submit'></td></tr>"; // do not remove the comment
						echo "</table>";
						//echo "</form>";//do not remove the comment
				}
			}
			//end of allotlist_form();
		
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
