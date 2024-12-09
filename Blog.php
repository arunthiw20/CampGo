<?php 
include_once ('./classes/DbConnector.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CampGo Blogs</title>
  <!--Css link-->
  <link rel="stylesheet" href="./css/Blog.css">
   <!-- Font awesome icon -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
</head>
<body>
   <!--Navbar-->
 <header>
  <div id="menu-bar" class="fas fa-bars"></div>
  <a href="./Home.php" class="logo">CampGo</a>
  <nav class="header_h">
      <a href="./Home.php"><b>HOME</b></a>
      <a href="./Aboutus.php"><b>ABOUT US</b></a>
      <a href="./Destinations.php"><b>DESTINATIONS</b></a>
      <a href="./Activity_Packages_Information_Display.php"><b>PACKAGES</b></a>
      <a href="./Blog.php"><b>BLOG</b></a>
      <a href="#Contactus"><b>CONTACT US</b></a>
  </nav>
  <div class="icons">
      <i class="fas fa-user" id="login-btn"></i>
      <a href="./Camp_Tools.php"><i class="fas fa-shopping-bag" id="login-btn"></a></i>
  </div>
</header>
<!--Navbar Ends-->

<div class="container">
  <div class="list-container">
    <div class="left-col">
      <p>100+ Options</p>
      <h1>CampGo Blog</h1>
      <?php
        $db = new dbConnection();
        $db->dbconnt();
            $sql_select = "SELECT * FROM blog"; 
        $stmt = $db->preQuery($sql_select); 
        
        $stmt->execute(); 
        
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            foreach ($results as $row) {
        ?>
      <div class="camp">
        <div class="camp-img"><?php echo '<img src="data:image;base64,'.base64_encode($row["blog_image"]).'" alt="image">'?></div>
        <div class="camp-info">
          <h3><b><?php echo $row["blog_name"]; ?></b></h3>
          <p><?php echo $row["blog_description"]; ?></p>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i><br><br><br>
            <a href="./Bloginfo.php" class="btn btn-primary" style="align-items:center;margin-top:5px;">READ</a>
        
          </div>
        </div>
        
        <?php
            }
                }else{
    
                echo "<p>No results found</p>";
    
                }

        ?>
        </div>
        <div class="right-col" >
        <div class="sidebar">
          <h2><b>SELECT FILTERS</b></h2>
          <h3><b>PROVINCES</b></h3>
          <div class="filter">
            <input type="checkbox"><p><b>North Province</b></p> <span><b>(02)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>Central Province</b></p> <span><b>(20)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>Uva Province</b></p> <span><b>(10)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>Southern Province</b></p> <span><b>(05)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>Eastern Province</b></p> <span><b>(08)</b></span>
          </div>

          <h3><b>Budget</b></h3>
          <div class="filter">
            <input type="checkbox"><p><b>Rs.1000 - Rs.5000</b></p> <span><b>(25)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>Rs.5000 - Rs.7000</b></p> <span><b>(15)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>Rs.8000 - Rs.10000</b></p> <span><b>(15)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>Rs.10000 & Above</b></p> <span><b>(15)</b></span>
          </div>

          <h3><b>Availability</b></h3>
          <div class="filter">
            <input type="checkbox"><p><b>Available Tonight</b></p> <span><b>(02)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>Available This Week</b></p> <span><b>(20)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>Available Next Week</b></p> <span><b>(10)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>Available This Month</b></p> <span><b>(05)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>Available Next Month</b></p> <span><b>(08)</b></span>
          </div>

          <h3><b>No of Pax</b></h3>
          <div class="filter">
            <input type="checkbox"><p><b>10 Guests</b></p> <span><b>(25)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>15 Guests</b></p> <span><b>(15)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>20 Guests</b></p> <span><b>(15)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>50 Guests</b></p> <span><b>(15)</b></span>
          </div>

          <h3><b>Packages</b></h3>
          <div class="filter">
            <input type="checkbox"><p><b>Family Packages</b></p> <span><b>(02)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>Camping Packages</b></p> <span><b>(20)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>Water Activity Package</b></p> <span><b>(10)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>Silver Packages</b></p> <span><b>(05)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>Gold Packages</b></p> <span><b>(05)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>Platinum Packages</b></p> <span><b>(05)</b></span>
          </div>


          <h3><b>PLACE</b></h3>
          <div class="filter">
            <input type="checkbox"><p><b>Hill Country</b></p> <span><b>(25)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>Beach Side</b></p> <span><b>(15)</b></span>
          </div>

          <h3><b>Activities</b></h3>
          <div class="filter">
            <input type="checkbox"><p><b>Camping</b></p> <span><b>(02)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>Hiking</b></p> <span><b>(20)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>Safari</b></p> <span><b>(10)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>Water Rafing</b></p> <span><b>(05)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>Wind Surfing</b></p> <span><b>(08)</b></span>
          </div>

          <h3><b>Camping Gear</b></h3>
          <div class="filter">
            <input type="checkbox"><p><b>Camping</b></p> <span><b>(02)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>Hiking</b></p> <span><b>(20)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>Safari</b></p> <span><b>(10)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>Water Rafing</b></p> <span><b>(05)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>Wind Surfing</b></p> <span><b>(08)</b></span>
          </div>

          <div class="sidebar-link">
            <a href="#">View More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
        
     

  <!--Page Index-->
  <div class="pages">
    <img src="./images/leftarrow.png">
    <span class="current">1</span>
    <span>2</span>
    <span>3</span>
    <span>4</span>
    <span>5</span>
    <span>&middot; &middot; &middot; &middot</span>
    <span>20</span>
    <img src="./images/rightarrow.png">
  </div>




























































































   
<?php include_once('./footer.php')?> 
  <script src="../jS/Camp_Tools.js"></script>
  <!-- ionicon link-->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>
