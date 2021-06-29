<?php require_once "check_login.php"; ?>
<Html>
<head>
<title>HOME PAGE</title>
<style>

				#bodycontent{
                    float: left;
                    margin: 0 auto;                
                    padding-left: 20px;   
                    width: 75%; 
                    height: 4%;
                }    
                
                
                #bodyContent h3{
                    
                    font-family: "Trebuchet MS", Times, serif;

                }
                #adminphoto{
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
				
				/*sep{
					height: 190px;
					border-left: 1px solid blue;
				}*/

                /* CSS of Right Side Navigation Bar */

                .sidenav {
                    height: 17%;
                    width: 0;
                    position: fixed;
                    z-index: 1;
                    top: 22.5%;
                    right: 0.7%;
                    overflow: hidden;
                    background-color: #0288D1;
                    overflow-x: hidden;
                    transition: 0.5s;
                    padding-top: 20px;
                    position: absolute;
                }

                .sidenav a {
                    /*padding: 2px 2px 2px 2px;*/
                    text-decoration: none;
                    font-size: 20px;
                    color: white;
                    display: block;
                    transition: 0.3s;

                }

                .sidenav a:hover {
                    color: #01579B;
                }

                .sidenav .closebtn {
                    position: absolute;
                    top: 0;
                    right: 10px;
                    font-size: 30px;
                    margin-left: 20px;
                }

                .sidenav ul{
                    list-style: none;
                    padding-left: 1px;
                    left: 0;
                    overflow: hidden;
                }

                .sidenav a li{
                    padding: 4px;
                    background-color: #0288D1;          
                    border-top: 0.5px solid black; 
/*                  border-bottom: 0.5px solid black;
*/                  text-decoration: none;
                    color: white;
                    padding-left: 15px;
                }

                .sidenav a li:hover{
                    background-color: #81D4FA;
                    display: block;
                    color: #01579B;
                    font-weight: bold;
                    font-family: red serifs;
                    text-decoration: none;
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
        <br>
        <h2>
            WELCOME !   
        </h2>        

        </div>  
		
        <div id="adminphoto">
			<p>				
				<?php
				if(isset($teacher_name))
				{
					echo "<br><img src='".$image_path."'>";
				}
				?>				
				<?php
				if(isset($teacher_name))
				{
					echo "<t>".$user_type." : ".$designation." ".$teacher_name."";
					echo "<br> <br> CSE Department <br> <br> BIT, Durg </t>";
				}
				?>			  
             </p>                 
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