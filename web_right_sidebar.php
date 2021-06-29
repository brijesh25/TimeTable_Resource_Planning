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
 
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "200px";
    document.getElementById("mySidenav").style.border = "1px solid #f1c40f";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("mySidenav").style.border = "0";
}
</script>