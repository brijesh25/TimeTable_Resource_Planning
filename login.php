<?php
session_start();
if(isset($_SESSION['teacher_id']))//i.e session is unset ,user has logged out
{
$teacher_id=$_SESSION['teacher_id'];
$teacher_name=strtoupper($_SESSION['teacher_name']);
$designation=strtoupper($_SESSION['designation']);
$image_path=$_SESSION['image_path'];
$user_type=strtoupper($_SESSION['user_type']);

header("location:home.php");
}
else
{
		session_destroy();
}
?>

<!DOCTYPE html>

<html>
    <head>
        <title>TimeTable Management</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!--<link rel="stylesheet" type="text/css" href="header-footer.css">-->
        <link rel="stylesheet" type="text/css" href="SideBarNavigation.css">

        <style>
            
            .fullborder{
                background-repeat: no-repeat;
                width: 98.5%;
                /*height: 720px;*/
                margin: 0 auto;
                border: 1px solid black;
            }
            
            img{
                repeat: no-repeat;
                width: 100%;
                display: block;
                height: 100%;
            }
            body{
                background-color: #E1F5FE;
                font-family: Source Sans Pro,Helvetica Neue,Helvetica,Arial,sans-serif; 
                background-image: url("bg1.jpg");
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
                width: 98.2%;
                margin: 0 auto;
                background-color: #B3E5FC;
                border: 1px solid blue;
                padding: 2px;
            }

            #login{
                position: absolute;
                left: 52.5%;
                top: 60%;
                width: 10%;
                height: 7%;
                margin:0 auto;
                border: 1px solid blue;
                border-radius:10px;
                transform: translateX(-50%) translateY(-50%);
                background-color: #B3E5FC;
                font-size: 15px;

            }
            
            p{

                margin: 0 auto;
                font-family: sans-serif;
                text-align: center;
                padding-top: 10px;
                text-decoration: underline;
                font-weight: bold;
            }

            #uname1{
                margin: 0 auto;
            }


            input[type=text]:focus{
                background-color: lightblue;
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
                float: bottom;
                position: static;
                right: 0;
                bottom: 0;
                left: 0;
                width: 97%;
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
                text-align: center;
                font-size: 20px;
                color: yellow;
				left: 45%;
                top: 65%;
				position: fixed;
                text-shadow: 2px 2px 8px #FF0000;
            }   


            /*dummy */


/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 5px;
    text-align: center;
    border-radius: 3px;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #333;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    color: blue;
    opacity: 0.8;

}

button:hover {
    opacity: 1.0;
    color: black;
    font-weight: bolder;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */



/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: inherit; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 380px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 0 auto;
    border: 1px solid #888;
    width: 20%; /* Could be more or less, depending on screen size */
    border: 1px solid blue;
    border-radius:10px;
    background-color: #B3E5FC;
    background-image: url("bg4.jpg");

}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover{
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}


 @media only screen and (max-height: 720px){
            .fullborder{
                height: 435px;
            }
            img{
                height: 435px;
            }
            .login{
                height: 5%;
            }
          /*  button:hover{
                width: 90%;
                height: 10%;
            }*/
            .modal{
                padding-top: 280px;
            }
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
        
        <div class="fullborder">

        <img src="college_1.jpg">
        
          <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" id="login">Login</button>
			
			
            <div id="id01" class="modal">
            
              <form name="login" class="modal-content animate" action="authenticate_user.php" method="post">
                <p>
                    LOGIN               
                </p>
                <br>
            
                  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Login Form">&times;</span>
                

                 <div class="uname">
                 <input type="text" name="username" value="" placeholder="Username" required="required" /> 
                 </div>


                <div class="uname">
                <input type="password" name="password" value="" placeholder="Password" required="required" />
                </div>

                <div class="uname">
                <input type="submit" value="Login" name="login" style="background-color: #0288D1"/>
                </div>
			</form>
				
           </div>

          </div>  
       
				<div id="msg">
                    <?php
                    if(isset($_GET['msg']))
                    {
                    $msg=$_GET['msg'];
                    echo "<br><b>".$msg."</b><br>";
                    }
                    ?>
                </div>

        <div id="footer">
            Copyright © BIT DURG || Website Design & Maintain by <span style="color: red">CSE Department</span>
        </div>  



        <script>
            // Get the modal
            var modal = document.getElementById('id01');

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
    </body> 
</html>

