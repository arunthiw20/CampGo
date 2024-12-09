<?php
session_start();
require_once('../php/dbcon.php');
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CampGo Camp_Tools</title>

  <!--Css link-->
  <link rel="stylesheet" href="../css/Camp_Tools.css">
  
  <!-- Font awesome icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
</head>

<body>

  <!--Navbar-->
  <header>
    <div id="menu-bar" class="fas fa-bars"></div>
    <a href="#" class="logo">CampGo</a>
    <nav class="header_h">
      <a href="../Home.php"><b>HOME</b></a>
      <a href="#Aboutus"><b>ABOUT US</b></a>
      <a href="./Destinations.php"><b>DESTINATIONS</b></a>
      <a href="Activity_Packages_Information_Display.php"><b>PACKAGES</b></a>
      <a href="#Blog"><b>BLOG</b></a>
      <a href="#Contactus"><b>CONTACT US</b></a>
    </nav>
    <div class="icons">
      <i class="fas fa-user" id="login-btn" ></i>
      <a href="shoppingCart.php"><i class="fas fa-shopping-bag" id="login-btn"></i></a>
      <i class="fas fa-search" id="search-btn"></i>
    </div>
  </header>
  <!--Navbar Ends-->


  <!--Destinations-->
  <div class="container">
    <div class="list-container">
      <div class="left-col">
        <p>100+ Options</p>
        <h1>Camp Tools On Our Website</h1>

        <?php
        $db = new dbcon();
        $db->dbConnection();

        $sql_select = "SELECT * FROM camping_tools";
        $stmt = $db->preQuery($sql_select);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($results) {
          foreach ($results as $row){ ?>
            <form action="" method="post">

              <div class="camp">
                <div class="camp-img"><?php echo '<img src="data:image;base64,' . base64_encode($row["tool_image"]) . '" alt="image">' ?></div>
                <div class="camp-info">

                  <h3><b><?php echo $row["tool_name"]; ?></b></h3>
                  <p><?php echo $row["tool_description"]; ?></p>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                  <div class="price">
                    <h4><?php echo $row["tool_price"]; ?><span>/ per set</span></h4>
                    <button class="btn btn-primary">Check Availability</button><br>
                    <button type="submit" name="btn-add-to-cart" class="btn btn-primary" value="<?php echo $row['tool_id']; ?>">Add to Cart</button>
                  </div>
                </div>
              </div>
            </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['btn-add-to-cart'])) {
              $productId = filter_input(INPUT_POST, 'btn-add-to-cart', FILTER_VALIDATE_INT);
              $productId = $_POST['btn-add-to-cart'];

              try {
              $db = new dbcon();
              $db->dbConnection();
              $sql_select = "SELECT * FROM camping_tools WHERE tool_id = :productId";
              $stmt = $db->preQuery($sql_select);
              $stmt->bindParam(':productId', $productId);
              $stmt->execute();
              $product = $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $ex) {
                die("Error while connecting to the server: ".$ex->getMessage());
            }
            
              

              if ($product) {
             
                if (!isset($_SESSION["cartTotal"])) {
                  $_SESSION["cartTotal"] = 0;
                }

                $_SESSION["cartTotal"] = $product['tool_price']+$_SESSION["cartTotal"]; 

                if (!isset($_SESSION["cart"])) {
                  $_SESSION["cart"] = [];
                }

                
                if (!isset($_SESSION["cart"][$productId])) {
                  $_SESSION["cart"][$productId] = [
                    'name' => $product["tool_name"],
                    'description' => $product["tool_description"],
                    'price' => $product["tool_price"],
                    'image' => base64_encode($product["tool_image"]),
                    'quantity' => 0, 
                  ];
                }

                $_SESSION["cart"][$productId]['quantity']++;
                header("Location:Camp_Tools.php");
                exit(); 
              }
            }
          }
        } ?>

    
        <?php require_once('../php/footer.php') ?>

        <!-- ionicon link-->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="../jS/Camp_Tools.js"></script>


        <!-- ionicon link-->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>