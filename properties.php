<?php 
include('./classes/DbConnector.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daffodil Zone - proprties</title>
  <!--Css link-->
  <link rel="stylesheet" href="./css/properties.css">
   <!-- Font awesome icon -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
</head>
<body>
   <!--Navbar
 <header>
  <div id="menu-bar" class="fas fa-bars"></div>
  <a href="#" class="logo">Daffodil Zone </a>
  <nav class="header_h">
      <a href="./Home.php"><b>HOME</b></a>
      <a href="./Aboutus.php"><b>ABOUT US</b></a>
      <a href="#"><b>VEHICALS</b></a>
      <a href="./Blog.php"><b>BLOG</b></a>
      <a href="./Contactus"><b>CONTACT US</b></a>
  </nav>
  <div class="icons">
      <i class="fas fa-user" id="login-btn"></i>
  </div>
</header>
Navbar Ends-->


<!--properties-->
<div class="container">
  <div class="list-container">
    <div class="left-col">
      <p>100+ Options</p>
      <h1>Choose Your Dream Home</h1>

      <?php
        $db = new dbConnection();
        $db->dbconnt();
        
        $sql_select = "SELECT * FROM destinations"; 
        
        $stmt = $db->preQuery($sql_select); 
        
        $stmt->execute(); 
        
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            foreach ($results as $row) {    
        ?>

      <div class="camp">
        <div class="camp-img"><?php echo '<img src="data:image;base64,'.base64_encode($row["des_image"]).'" alt="image">'?></div>
        <div class="camp-info">
        <p><i class="fas fa-phone-alt"></i> <b><?php echo $row["des_location"]; ?></b></p>
          <h3><b><?php echo $row["des_name"]; ?></b></h3>
          <p><?php echo $row["des_description"]; ?></p>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
          <div class="price">
            <h4><?php echo $row["des_price"]; ?></h4>
            <button class="btn btn-primary"><a href="./propertyinfo.php"><< View More >></a></button>
          </div>
        </div>
      </div>
        
        <?php
        }
        }else{
          echo "<p>No results found</p>";
        }
        ?>
        </div>
        
      <div class="right-col">
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
            <input type="checkbox"><p><b>Rs.5M - Rs.10M</b></p> <span><b>(25)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>Rs.10M - Rs.20M</b></p> <span><b>(15)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>Rs.20M - Rs.30M</b></p> <span><b>(15)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>Rs.30M & Above</b></p> <span><b>(15)</b></span>
          </div>

          <h3><b>No of Rooms</b></h3>
          <div class="filter">
            <input type="checkbox"><p><b>2 Rooms</b></p> <span><b>(25)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>3 Rooms</b></p> <span><b>(15)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>4 Rooms</b></p> <span><b>(15)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>5 Rooms</b></p> <span><b>(13)</b></span>
          </div>

          <h3><b>Pool</b></h3>
          <div class="filter">
            <input type="checkbox"><p><b>with pool</b></p> <span><b>(02)</b></span>
          </div>
          <div class="filter">
            <input type="checkbox"><p><b>without pool</b></p> <span><b>(20)</b></span>
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

   
  <?//php include('./footer.php')?> 
  <!-- ionicon link-->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    







  <script src="../jS/Destinations.js"></script>
  <!-- ionicon link-->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>