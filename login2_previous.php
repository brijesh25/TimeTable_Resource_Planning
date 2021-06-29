<!DOCTYPE html>

<html>
    <head>
        <title>TimeTable Management</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
		<!--<link rel="stylesheet" type="text/css" href="header-footer.css">-->
		<link rel="stylesheet" type="text/css" href="SideBarNavigation.css">

		<style>
            
			#fullborder{
				background-repeat: no-repeat;
				width: 97.5%;
				margin: 0 auto;
				height: 444px;
			}
			
			img{
				repeat: no-repeat;
				width: 100%;
				display: block;
				height: 444px;
				
			}

			/*img:hover{
				opacity: 1.0;
			}*/
			body{
                background-color: #E1F5FE;
                font-family: Source Sans Pro,Helvetica Neue,Helvetica,Arial,sans-serif;	
            }
			
            #logo1{
                float: left;
                margin-top: auto;
                margin-right: auto;
                height: 10%;
                width: 9%;
            }
            
            #logo2{
                float: right;
                margin-top: auto;
                margin-right: auto;
                height: 10%;
                width: 9%;
            }
            #name{
                text-align: center;
                margin-left: auto;
                margin-right: auto;
                display: block;
                padding:5px;
                width: 40%;
                height: 10%;
            }
            #main{
                width: 97%;
                margin: 0 auto;
                background-color: #B3E5FC;
                border: 1px solid blue;
                padding: 2px;
            }

            #login{
                position: absolute;
                left: 50%;
                top: 60%;
                width: 22%;
                height: 29%;
                margin:0 auto;
                border: 2px solid blue;
                border-radius:10px;
                transform: translateX(-50%) translateY(-50%);
                background-color: #B3E5FC;
				opacity: 0.5;
            }
            
            #login:hover{
            	opacity: 1.0;
            }
            #login > p{
                margin: 0 auto;
                font-family: sans-serif;
                text-align: center;
                padding-top: 10px;
            }
            #uname1{
                margin: 0 auto;
            }
            input[type=text]{                
                text-align: center;
                border-radius: 3px;
                box-sizing: border-box;
                padding: 5px;                                        
            }
            input[type=text]:focus{
                background-color: lightblue;
            }
            input[type=password]{
                text-align: center;
                border-radius: 3px;
                padding: 5px;
                box-sizing: border-box;
            }
            input[type=password]:focus{
                background-color: lightblue;
            }   
            
            .uname{
                text-align: center;
                width: 64%;
                height: 50%;
                position: sticky;
                box-sizing: border-box;
                margin: 2px auto;
                padding: 6px;
                border-radius: 6px;
            }
            input[type=submit]{
                border-radius: 6px;  
                font-size: 15px;
            }
            
		    #footer {
                position: absolute;
                right: 0;
                bottom: 0;
                left: 0;
                width: 94.7%;
                background-color: #B3E5FC;
                margin: 0 auto;
                text-align: center;
                padding: 10px;
                color: black;
                font-family: fantasy;
                border: 1px solid blue;
                margin-bottom: 5px;
            }
			
			#msg{
				padding-top: 10px;
				text-align: center;
				color: red;
			}	
        </style>
	
	<link rel="stylesheet" type="text/css" href="Content_and_Button.css"> 
	</head>
    <body>
	
	
        <div id="main">             
            <img id="logo1" src="bitdlogo.png" alt="bitdlogo"/>            
            <img id="logo2" src="bitdlogo.png" alt="bitdlogo"/> 
            <img id="name" src="bitdname1.png" alt="bitdname"/>
        </div>        
        
		<div id="fullborder">
		<img src="sli1.jpg">
			<div id="login">
				<p>
					LOGIN               
				</p>
				<br>
				<form name="login" action="authenticate_user.php" method="POST">
					<div class="uname">
						<input type="text" name="username" value="" placeholder="Username" required="required" />                   
					</div>
					<div class="uname">    
						<input type="password" name="password" value="" placeholder="Password" required="required" />
					</div>
					<div class="uname">
						<input type="submit" value="Login" name="login" />
					</div>    
				</form>
				
				<div id="msg">
					<?php
					if(isset($_GET['msg']))
					{
					$msg=$_GET['msg'];
					echo "<br><b>".$msg."</b><br>";
					}
					?>
				</div>
			</div>
		</div>	
		
        <div id="footer">
            Copyright © BIT DURG || Website Design & Maintain by <span style="color: red">CSE Department</span>
        </div>	
	</body>	
</html>