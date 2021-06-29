<?php
if($user_type == "ADMIN")
{
?>
	<div id="main">            
        <img id="logo1" src="bitdlogo.png" alt="bitdlogo"/>            
        <img id="logo2" src="bitdlogo.png" alt="bitdlogo"/> 
        <img id="name" src="bitdname1.png" alt="bitdname"/>         
    </div>
	
    
	 <div id="men" class="menu">
            <ul type="">
                <a href="home.php"><li>HOME</li></a>
		        <li>TIMETABLE
                    <ul>
						<a href="web_timetable_form.php?formtype=view"><li>View Timetable</li></a>
						<a href="web_timetable_form.php?formtype=new"><li>Add Timetable</li></a>
						<a href="web_timetable_form.php?formtype=edit"><li>Edit Timetable</li></a>
                    </ul>	
				</li>
				<a href="web_get_schedule.php"><li>SCHEDULE</li></a>
				<a href="notice.php"><li>NOTICE</li></a>
				<li>MANAGE FACULTIES
					<ul>
						<a href="web_addfaculty_form.php"><li>Add Faculty</li></a>
						<a href="web_get_teachers.php"><li>Remove Faculty</li></a>
					</ul>
				</li>
                    <li>SUBJECT ALLOTMENT
                    <ul>
                        <a href="web_suballot_form.php?formtype=view"><li>View Allotment</li></a>
                        <a href="web_suballot_form.php?formtype=new"><li>Add Allotment</li></a>
                        <a href="web_suballot_form.php?formtype=edit"><li>Edit Allotment</li></a>
                    </ul>
                </li>
				<li>PERIOD ENGAGEMENT
				    <ul>
                        <a href="web_view_p_engage.php"><li>View Engagement</li></a>
                        <a href="web_add_period_engage.php"><li>Add Engagement</li></a>
                        <a href="web_get_p_engage_form.php"><li>Remove Engagement</li></a>
                    </ul>
				</li>	
                    <a href="web_new_subject.php"><li>ADD SUBJECT</li></a>
                </ul>    
                    <div class="adminfutuse">

                    </div>   
            
        </div>
    
<?php
}
else
{
?>
	<div id="main">            
        <img id="logo1" src="bitdlogo.png" alt="bitdlogo"/>            
        <img id="logo2" src="bitdlogo.png" alt="bitdlogo"/> 
        <img id="name" src="bitdname1.png" alt="bitdname"/>         
    </div>
	
    
	<div id="men" class="menu">
            <ul type="">
                <a href="home.php"><li>HOME</li></a>
				<a href="web_view_timetable.php"><li>TIMETABLE</li></a>
				<a href="web_get_schedule.php"><li>SCHEDULE</li></a>
				<a href="notice.php"><li>NOTICE</li></a>
			</ul>
			<div class="futuse">
				
            </div>
        </div>
       
<?php
}
?>