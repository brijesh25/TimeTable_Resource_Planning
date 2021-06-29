<?php require_once "check_login.php"; ?>
<Html>
<head>
<title>HOME PAGE</title>
<style>

				#bodycontent{
                    float: left;
                    margin: 0 auto;                
                    padding-left: 20px;  
                    width: 77%;
                }    
                 
                #bodyContent h3{                  
                    font-family: "Trebuchet MS", Times, serif;

                }
         /*       #adminphoto{
                    float: right;
                    width: 55%;
                    margin-top: 7%;
                    border-radius: 10px;
					
                }
                #adminphoto img{    
                    float: left;
                    margin-right: 20px;
                    width: 150px;
                    height: 150px;
					border: 1px solid blue;
                    border-radius: 50%;
                    text-align: center;
                }
                #adminphoto p{
                    float: left;
                    border-radius: 0 15px 0 15px;				
                    border: 1px solid blue;
                    background: transparent;
					background-color: #B3E5FC;
                    padding: 10px;
                    margin-right: 20px;
                    width: 400px;
                    height: 190px; 
                    text-align: center;
                    font-family: "Trebuchet MS", Times, serif;
                }
				
				t{
					padding: 10px;
					margin-top: 10px;
					border-left: 1px solid blue;
					height: 190px;
				}
				
				sep{
					height: 190px;
					border-left: 1px solid blue;
				}*/

                p{
                    font-family: "Trebuchet MS", Times, serif;
                    font-size: 16px;
                    text-align: justify;
                }
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
        <div id="bodycontent">
            <h1> <u>About</u> <h1> 

				<div style="float:right">
					<br><img src="app_icon.png" height=200 width=200 title="Android App Icon">
				</div>
				
				<div style="float:top">
                <p> "<b>SCHEDULER</b>" is a <u>Timetable Management and Information System</u>.
					It provides user with facility of managing the timetable efficiently.
					It provides information like - the latest timetable ,faculty's daily schedule and period engagements.
					It also provide facility of sending notice with attachments.It can also be accessed from our android app <u><b>'MyTimetable'</b></u>.
				</p>	
				</div>	
					
				<div style="font-size:16px">
					<u>Special Thanks</u><br>
						<ul>	
							<li>Dr. Sanjay Guha (Head of MBA Department) </li>
							<li>Mr. N. Chiranjeeva Rao (Asst. Professor) </li>
							<li>Mr. Sudip Bhattacharya (Professor, CSE Department) </li>
						</ul>	
				</div>		
                             
        </div> 

            <div id="mySidenav" class="sidenav">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
              <ul>
                  <a href="web_about.php"><li>About</li></a>
                  <a href="web_profile_setting.php"><li>Profile Settings</li></a>
                  <a href="logout.php"><li>Logout</li></a>
              </ul>    
            </div>
            
            <div>
                <span style="font-size:25px;cursor:pointer" onclick="openNav()">&#9776; </span>
            </div>
        </div>

		
<div id="footer">     	 
  	Copyright © BIT DURG || Website Design & Maintain by <span style="color: red">CSE Department</span>  
</div> 

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "200px";
    document.getElementById("mySidenav").style.border = "2px solid #f1c40f";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("mySidenav").style.border = "0";
}
</script>
</body>          
</Html>