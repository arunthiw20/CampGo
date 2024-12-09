<?php 
include('./classes/DbConnector.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CampGo - Admin Panel</title>
    <link rel="stylesheet" href="./css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="Home.php">
                        <span class="title" style="font-family: 'Kaushan Script'; font-size:40px">Camp Go </span>
                    </a>
                </li>

                <li>
                    <a href="Home.php">
                        <span class="icon">
                        <ion-icon></ion-icon>
                        </span>
                        <span class="title">Home</span>
                    </a>
                </li>

                <li>
                    <a href="./insert_Destination_data.php">
                        <span class="icon">
                        <ion-icon name="download-outline" style="font-size:25px;"></ion-icon>
                        </span>
                        <span class="title">Insert Destination</span>
                    </a>
                </li>

                <li>
                    <a href="./Display_destination.php">
                        <span class="icon">
                        <ion-icon name="construct-outline" style="font-size:25px;"></ion-icon>
                        </span>
                        <span class="title">Manage Destinations</span>
                    </a>
                </li>

                <li>
                    <a href="./insert_Activity_data.php">
                        <span class="icon">
                        <ion-icon name="download-outline" style="font-size:25px;"></ion-icon>
                        </span>
                        <span class="title">Insert Packages</span>
                    </a>
                </li>

                <li>
                    <a href="./Display_activity.php">
                        <span class="icon">
                        <ion-icon name="construct-outline" style="font-size:25px;"></ion-icon>
                        </span>
                        <span class="title">Manage Packages</span>
                    </a>
                </li>

                <li>
                    <a href="./insert_Blog.php">
                        <span class="icon">
                        <ion-icon name="download-outline" style="font-size:25px;"></ion-icon>
                        </span>
                        <span class="title">Insert Blog</span>
                    </a>
                </li>

                <li>
                    <a href="./Display_Blog.php">
                        <span class="icon">
                        <ion-icon name="construct-outline" style="font-size:25px;"></ion-icon>
                        </span>
                        <span class="title">Manage Blog</span>
                    </a>
                </li>

                <li>
                    <a href="./insert_tools_data.php">
                        <span class="icon">
                        <ion-icon name="download-outline" style="font-size:25px;"></ion-icon>
                        </span>
                        <span class="title">Insert CampGear</span>
                    </a>
                </li>

                <li>
                    <a href="./Display_tools.php">
                        <span class="icon">
                        <ion-icon name="construct-outline" style="font-size:25px;"></ion-icon>
                        </span>
                        <span class="title">Manage Marketplace</span>
                    </a>
                </li>
                <li>
                    <a href="./manage_managers.php">
                        <span class="icon">
                        <ion-icon name="construct-outline" style="font-size:25px;"></ion-icon>
                        </span>
                        <span class="title">Manage managers</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="log-out-outline" style="font-size:25px;"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

   
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="./images/admin.jpg" alt=""> 
                </div>
            </div>
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">1,504</div>
                        <div class="cardName">Daily Views</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">80</div>
                        <div class="cardName">Marketplace Transactions</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">284</div>
                        <div class="cardName">Comments</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">Rs.50 000</div>
                        <div class="cardName">Total Revenue</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Bookings</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Destination</td>
                                <td>No.of Pax</td>
                                <td>Arrival</td>
                                <td>Departure</td>
                                <td>Status</td>
                            </tr>
                        </thead>

                        <tbody>
        <?php
        $db = new dbConnection();
        $db->dbconnt();
        
        $sql_select = "SELECT * FROM booking"; 
        
        $stmt = $db->preQuery($sql_select); 
        
        $stmt->execute(); 
        
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            foreach ($results as $row) {    
        ?>
                            <tr>
                                <td><?php echo $row["destination"]; ?></td>
                                <td><?php echo $row["no_pax"]; ?></td>
                                <td><?php echo $row["arrival"]; ?></td>
                                <td><?php echo $row["departure"]; ?></td>
                                <td><span class="status delivered"><?php echo $row["status"]; ?></span></td>
                            </tr>
        <?php
        }
        }else{
          echo "<p>No results found</p>";
        }
        ?>
                        </tbody>
                    </table>
                </div>

        
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Most Viewed</h2>
                    </div>

                    <table>
                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="./images/Destination02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Hulangala <br> <span>Kurunegala</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="./images/Destination01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Hortan Plains<br> <span>Nuwara Eliya</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="./images/package-3.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Water Rafting Package <br> <span>Kithulgala</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="./images/Destination03.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Narangala<br> <span>Badulla</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="./images/Destination04.JPG" alt=""></div>
                            </td>
                            <td>
                                <h4>Baththalangunduwa Beach Camping <br> <span>Kalpitiya</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="./images/activity3.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Water Sport - Wind Surfing Package<br> <span>Kalpitiya</span></h4>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

  
    <script src="./js/Dashboard.js"></script>


    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>