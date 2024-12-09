<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="new index.css">
    <title>new indwx</title>
</head>
<body>
    <div class="all"> 
        <nav>
            <h2 class = "CampGo">Camp Go</h2>
            <ul>
                <li><a href="#">Add Destination</a></li>
                <li><a href="#">Add Activity</a></li>
                <li><a href="insertEqupments.php">Add Eqvipments</a></li>
            </ul>
            <img src="img/defult.png" class="user-pic" onclick="toggleMenu()">

            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="img/146-1468281_profile-icon-png-transparent-profile-picture-icon-png.png" alt="">
                        <h2>Jone</h2>
                    </div>
                    <hr>

                    <a href="EditProfile.php" class="sub-menu-link">
                        <img img class="contactus" src="img/edit.png" alt="">
                        <P>  Edit Profile</P>
                        <span>></span>
                    </a>
                    
                    </a>
                    <a href="change_password.php" class="sub-menu-link">
                        <img  class="contactus" src="img/settings.png" alt="">
                        <P>Change Password</P>
                        <span>></span>
                    </a>
                    <a href="logout.php" class="sub-menu-link">
                        <img  class="contactus" src="img/exit_3456192.png" alt="">
                        <P>Log Out</P>
                        <span>></span>
                    </a>
                </div>
            </div>
        </nav>


        <div class="container">
            <div class="content">
             <div class="slides">
               <div class="bg-img">
                <img src="img/Madolsima.jpg" alt="ghvgv">
               </div>
                <div class="img_overlay">
                    
                    <h3 class="text">Camp Go - Your Ultimate Camping Adventure Destination</h3>
                </div>
            </div>
        </div>
        </div>

    </div>
    <script>
        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
        }
    </script>
</body>
</html>