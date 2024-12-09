<?php
session_start();
require_once './classes/DbConnector.php';
require_once './manager/EditProfileClasses.php';

$user_id = $_SESSION['userid'];
$setData = new getSetData('', '', '', '', '', $user_id);
$Data = $setData->getUserName();
$dbFName = $Data["fName"];

if (isset($_POST['submit'])) {

  $check_in = $_POST['checkin'];
  $check_out = $_POST['checkout'];
  $nopeople = $_POST['people'];
  $destination = $_POST['destination'];

  $db = new dbConnection();
  $db->dbconnt();

  $sql = "SELECT * FROM booking";
  $stmt = $db->preQuery($sql);
  $stmt->execute();
  $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
  if ($rs) {
    foreach ($rs as $booked_pax) {
      $nobooked = $booked_pax['no_pax'];
    }
  }

  $available_rooms = 20;
  // Calculate available rooms based on the total room limit
  $rooms = 20 - $nobooked - $nopeople;

  if ($rooms > 0) {
    // There are available rooms within the limit for the selected destination and dates
    echo '<script type="text/javascript">';
    echo 'alert("' . $rooms . ' Rooms are available for booking!");';
    echo 'window.location.href = "Home.php";'; // Redirect to a home page
    echo '</script>';
  } else {
    // No available rooms within the limit for the selected destination and dates
    echo '<script type="text/javascript">';
    echo 'alert("Sorry, rooms are not available for the selected dates!");';
    echo 'window.location.href = "Home.php";'; // Redirect to a home page
    echo '</script>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CampGo</title>
  <!--Css link-->
  <link rel="stylesheet" href="./css/Home.css">
  <!--Google font link-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Lilita+One&family=Luckiest+Guy&family=Poppins&family=Rancho&family=Sedgwick+Ave+Display&display=swap" rel="stylesheet">

 <!-- Start of Async Drift Code -->
<script>
"use strict";

!function() {
  var t = window.driftt = window.drift = window.driftt || [];
  if (!t.init) {
    if (t.invoked) return void (window.console && console.error && console.error("Drift snippet included twice."));
    t.invoked = !0, t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ], 
    t.factory = function(e) {
      return function() {
        var n = Array.prototype.slice.call(arguments);
        return n.unshift(e), t.push(n), t;
      };
    }, t.methods.forEach(function(e) {
      t[e] = t.factory(e);
    }), t.load = function(t) {
      var e = 3e5, n = Math.ceil(new Date() / e) * e, o = document.createElement("script");
      o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
      var i = document.getElementsByTagName("script")[0];
      i.parentNode.insertBefore(o, i);
    };
  }
}();
drift.SNIPPET_VERSION = '0.3.1';
drift.load('dygfzrv65auc');
</script>
<!-- End of Async Drift Code -->
</head>

<body id="top">
  <!-- - #HEADER-->
  <header class="header" data-header>
    <div class="overlay" data-overlay></div>
    <div class="header-top">
      <div class="container">
        <a href="tel:+01123456790" class="helpline-box">
          <div class="icon-box">
            <ion-icon name="call-outline"></ion-icon>
          </div>
          <div class="wrapper">
            <p class="helpline-title">For Further Inquires :</p>
            <p class="helpline-number">+94 011 2248257</p>
          </div>
        </a>
        <a href="#" class="logo">
          <h1 style=" font-family:Kaushan Script;  font-size:40px; color:rgb(208, 237, 178)">CampGO</h1>
        </a>
        <div class="header-btn-group">
          <button class="search-btn" aria-label="Search" onclick="toggleMenu()">
            <ion-icon name="person-outline" style="color:aliceblue;"></ion-icon>
          </button>

          <div class="sub-menu-wrap" id="subMenu">
            <div class="sub-menu">
              <div class="user-info">
                <!--menu-->
                <img src="img/146-1468281_profile-icon-png-transparent-profile-picture-icon-png.png" alt="">
                <h2 style="color: black;"><?php echo $dbFName; ?></h2>
              </div>
              <hr>

              <a href="./EditProfile.php" class="sub-menu-link">
                <img img class="contactus" src="img/settings.png" alt="" width="10" height="30">
                <P> Edit Profile</P>
                <span>></span>
              </a>

              </a>
             

              <a href="./Cart/Html/shoppingCart.php" class="sub-menu-link">
                <img class="contactus" src="./images/shopping-cart.png" alt="" width="10" height="30">
                <P>My Cart</P>
                <span></span>
              </a>

            </div>
          </div>
          <!--end menu-->
          <button class="search-btn" aria-label="Search"><a href="./Cart/Html/Camp_Tools.php">
              <ion-icon name="bag-handle" style="color:aliceblue;"></ion-icon></a>
          </button>
          <button class="search-btn" aria-label="Search">
            <ion-icon name="search"></ion-icon>
          </button>
          <button class="nav-open-btn" aria-label="Open Menu" data-nav-open-btn>
            <ion-icon name="menu-outline"></ion-icon>
          </button>
        </div>
      </div>
    </div>
    <div class="header-bottom">
      <div class="container">
        <ul class="social-list">
          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>
          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>
          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-youtube"></ion-icon>
            </a>
          </li>
        </ul>

        <nav class="navbar" data-navbar>
          <div class="navbar-top">
            <button class="nav-close-btn" aria-label="Close Menu" data-nav-close-btn>
              <ion-icon name="close-outline"></ion-icon>
            </button>
          </div>
          <ul class="navbar-list">
            <li>
              <a href="./Home.php" class="navbar-link" data-nav-link><b>home</b></a>
            </li>
            <li>
              <a href="./Aboutus.php" class="navbar-link" data-nav-link><b>About us</b></a>
            </li>
            <li>
              <a href="./Destinations.php" class="navbar-link" data-nav-link><b>destinations</b></a>
            </li>
            <li>
              <a href="./Activity_Packages_Information_Display.php" class="navbar-link" data-nav-link><b>packages</b></a>
            </li>
            <li>
              <a href="./Blog.php" class="navbar-link" data-nav-link><b>Blog</b></a>
            </li>
            <li>
              <a href="#" class="navbar-link" data-nav-link><b>Contact Us</b></a>
            </li>
          </ul>
        </nav>
        <?php
        if (isset($_SESSION['userid'])) {
          // User is logged in, show logout button
        ?>
          <button id="logoutButton" class="btn btn-primary" onclick="window.location.href='./logout.php'">Log out</button><?php
              } else {
          // User is not logged in, show login button
              ?>
          <button id="logoutButton" class="btn btn-primary" onclick="window.location.href='./Login.php'">Log In</button><?php
                                                                                                                        }
                                                                                                                        ?>
      </div>
    </div>
  </header>

  <main>
    <article>
      <!--Hero Text-->
      <section class="hero" id="home">
        <div class="container">
          <h2 class="h1 hero-title">Explore Adventure</h2>
          <p class="hero-text">I`s not just a camp, it`s an escape to paradise!<br>Live Love Laugh Camp because Life is
            better in the woods.</p>
          <div class="btn-group">
            <a class="btn btn-primary" href="./Aboutus.php">Learn more</a>
            <!--<button class="btn btn-primary" href="./Aboutus.php">Learn more</button>-->
            <button class="btn btn-secondary">Book now</button>
          </div>
        </div>
      </section>

      <!-- Availability Checking-->
      <section class="tour-search">
        <div class="container">

          <form action="Home.php" method="POST" class="tour-search-form">
            <div class="input-wrapper">
              <label for="destination" class="input-label">Search Destination*</label>
              <select type="text" name="destination" id="destination" required placeholder="Enter Destination" class="input-field">
                <option value="Hortain Plains">Horton Plains</option>
                <option value="Hulangala">Hulangala</option>
                <option value="Bambaragala">Bambaragala</option>
                <option value="Kithulgala">Kithulgala</option>
              </select>
            </div>

            <div class="input-wrapper">
              <label for="people" class="input-label">Pax Number*</label>
              <input type="number" name="people" id="people" required placeholder="No.of People" class="input-field">
            </div>

            <div class="input-wrapper">
              <label for="checkin" class="input-label">Date Of Arrival*</label>
              <input type="date" name="checkin" id="checkin" required class="input-field">
            </div>

            <div class="input-wrapper">
              <label for="checkout" class="input-label">Date Of Departure*</label>
              <input type="date" name="checkout" id="checkout" required class="input-field">
            </div>
            <button type="submit" class="btn btn-secondary" name="submit"><b>Check Now</b></button>
          </form>
        </div>
      </section>

      <!--Popular Destinations-->
      <section class="popular" id="destination">
        <div class="container">
          <p class="section-subtitle">Discover Unexplored Places</p>
          <h2 class="h2 section-title">Popular destinations</h2>
          <p class="section-text">Enjoy the great outdoors at a campground sleeping under the stars in a cabin or a tent.
          </p>
          <!--<iframe width="100%" height="500" src="../map/index.php"></iframe>-->
          <ul class="popular-list">

            <li>
              <div class="popular-card">
                <figure class="card-img">
                  <img src="./images/popular-1.jpg" alt="Hortain Plains" loading="lazy">
                </figure>
                <div class="card-content">
                  <div class="card-rating">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                  </div>
                  <p class="card-subtitle"><a href="#">Ohiya</a></p>
                  <h3 class="h3 card-title" style="text-align: center;"><a href="#">Hortain Plains</a></h3>
                  <button class="btn btn-primary" style="padding-top: 1px;padding-bottom: 1px;margin-top: 8px;align-items: center;"><a href="./DestinationInfo.php">Read More</a></button>
                </div>
              </div>
            </li>

            <li>
              <div class="popular-card">
                <figure class="card-img">
                  <img src="./images/popular-2.jpg" alt="Narangala" loading="lazy">
                </figure>
                <div class="card-content">
                  <div class="card-rating">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                  </div>
                  <p class="card-subtitle"><a href="#">Badulla</a></p>
                  <h3 class="h3 card-title"><a href="#" style="text-align: center;">Narangala Camping</a></h3>
                  <button class="btn btn-primary" style="padding-top: 1px;padding-bottom: 1px;margin-top: 8px;align-items: center;">Read More</button>
                </div>
              </div>
            </li>

            <li>
              <div class="popular-card">
                <figure class="card-img">
                  <img src="./images/popular-3.jpg" alt="Haritha Kanda" loading="lazy">
                </figure>
                <div class="card-content">
                  <div class="card-rating">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                  </div>
                  <p class="card-subtitle"><a href="#">Bogawanthalawa</a></p>
                  <h3 class="h3 card-title"><a href="#" style="text-align: center;">Haritha Kanda</a></h3>
                  <button class="btn btn-primary" style="padding-top: 1px;padding-bottom: 1px;margin-top: 8px;align-items: center;">Read More</button>
                </div>
              </div>
        </div>
        </li>
        </ul>
        <button onclick="redirectToDestintions()" class="btn btn-primary">More Destintions</button>
        </div>
      </section>

      <!-- - Packages-->
      <section class="package" id="package">
        <div class="container">
          <p class="section-subtitle">Popular Packages</p>
          <h2 class="h2 section-title">Checkout CampGo Packages</h2>
          <p class="section-text">Enjoy the exciting outdoor activity pacakages according to your preference for a reasonable budget. <br>Customize yours today !!</p>
          <ul class="package-list">
            <li>
              <div class="package-card">
                <figure class="card-banner">
                  <img src="./images/Hulangala.JPG" alt="Hulangala" loading="lazy">
                </figure>
                <div class="card-content">
                  <h3 class="h3 card-title">Hulangala Camping Site</h3>
                  <p class="card-text">Enjoy an exciting camp stay at Mini World's end Under the stars....<br><br>Visit To Hulangala Ella | Camp Site |<br>Hiking Experience | Bonfire</p>
                  <ul class="card-meta-list">
                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="time"></ion-icon>
                        <p class="text">2D/1N</p>
                      </div>
                    </li>
                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="people"></ion-icon>
                        <p class="text">pax: 10</p>
                      </div>
                    </li>
                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="location"></ion-icon>
                        <p class="text">Kurunegala</p>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="card-price">
                  <div class="wrapper">
                    <p class="reviews">(25 reviews)</p>
                    <div class="card-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                    </div>
                  </div>
                  <p class="price">Rs.2500<span>/ per person</span></p>
                  <button class="btn btn-secondary">Book Now</button>
                </div>
              </div>
            </li>
            <li>

              <div class="package-card">
                <figure class="card-banner">
                  <img src="./images/packege-2.jpg" alt="Baththalngunduwa Camping Site" loading="lazy">
                </figure>
                <div class="card-content">
                  <h3 class="h3 card-title">Baththalngunduwa Camping Site</h3>
                  <p class="card-text">Enjoy days by beach.... <br><br> Lagoon Boat Ride | Beach Camping Experience | Diving Experience | Bonfire</p>
                  <ul class="card-meta-list">
                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="time"></ion-icon>
                        <p class="text">3D/2N</p>
                      </div>
                    </li>
                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="people"></ion-icon>
                        <p class="text">pax: 10</p>
                      </div>
                    </li>
                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="location"></ion-icon>
                        <p class="text">Kalpitiya</p>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="card-price">
                  <div class="wrapper">
                    <p class="reviews">(20 reviews)</p>
                    <div class="card-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                    </div>
                  </div>
                  <p class="price">Rs 3000<span>/ per person</span></p>
                  <button class="btn btn-secondary">Book Now</button>
                </div>
              </div>
            </li>

            <li>
              <div class="package-card">
                <figure class="card-banner">
                  <img src="./images/package-3.jpg" alt="Kithulgala White Water Rafting" loading="lazy">
                </figure>
                <div class="card-content">
                  <h3 class="h3 card-title">Kithulgala White Water RAfting</h3>
                  <p class="card-text">Ideal for adventure enthuziasts ...<br> <br> White water Rafting| Bungi Jumping|<br> Camping | Bonfire
                  </p>
                  <ul class="card-meta-list">
                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="time"></ion-icon>
                        <p class="text">2D/1N</p>
                      </div>
                    </li>
                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="people"></ion-icon>
                        <p class="text">pax: 10</p>
                      </div>
                    </li>
                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="location"></ion-icon>
                        <p class="text">Kithulgala</p>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="card-price">
                  <div class="wrapper">
                    <p class="reviews">(40 reviews)</p>
                    <div class="card-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                    </div>
                  </div>
                  <p class="price">Rs 3500<span>/ per person</span></p>
                  <button class="btn btn-secondary">Book Now</button>
                </div>
              </div>
            </li>
          </ul>
          <button onclick="redirectToActivity_Packages()" class="btn btn-primary">View All Packages</button>
        </div>
      </section>

      <!--GALLERY-->

      <section class="gallery" id="gallery">
        <div class="container">
          <p class="section-subtitle">Photo Gallery</p>
          <h2 class="h2 section-title">Customer Memories</h2>
          <p class="section-text"></p>
          <ul class="gallery-list">
            <li class="gallery-item">
              <figure class="gallery-image">
                <img src="./images/gallery-1.jpg" alt="Gallery image">
              </figure>
            </li>

            <li class="gallery-item">
              <figure class="gallery-image">
                <img src="./images/gallery-2.jpg" alt="Gallery image">
              </figure>
            </li>

            <li class="gallery-item">
              <figure class="gallery-image">
                <img src="./images/gallery-3.jpg" alt="Gallery image">
              </figure>
            </li>

            <li class="gallery-item">
              <figure class="gallery-image">
                <img src="./images/gallery-4.jpg" alt="Gallery image">
              </figure>
            </li>

            <li class="gallery-item">
              <figure class="gallery-image">
                <img src="./images/gallery-5.jpg" alt="Gallery image">
              </figure>
            </li>
          </ul>
        </div>
      </section>

      <!-- Contact Us-->
      <section class="cta" id="contact">
        <div class="container">
          <div class="cta-content">
            <p class="section-subtitle">Planning Your Vaccation?</p>
            <h2 class="h2 section-title">For an unforgatable vaccation...<br> Join Us!</h2>
            <p class="section-text"><b>For a well planned, safe vaccation with exciting offers. <br>Sign Up now and join the CampGo Fam..!</p>
          </div>
          <a class="btn btn-secondary" href="./signup.php">Sign Up</a>
        </div>
      </section>
    </article>
  </main>

  <!--Footer-->
  <footer class="footer">
    <div class="footer-top">
      <div class="container">
        <div class="footer-brand">
          <a href="#" class="logo">
            <h1 style=" font-family:Kaushan Script;  font-size:40px; color:rgb(208, 237, 178)">CampGO</h1>
          </a>
          <p class="footer-text">For a safe and exciting nights under the stars according to your preference for a reasonable budget.</p>
        </div>
        <div class="footer-contact">
          <h4 class="contact-title">Contact Us</h4>
          <p class="contact-text">Feel free to contact and reach us !!</p>
          <ul>
            <li class="contact-item">
              <ion-icon name="call-outline"></ion-icon>
              <a href="tel:+01123456790" class="contact-link">+94 011 2248257</a>
            </li>
            <li class="contact-item">
              <ion-icon name="mail-outline"></ion-icon>
              <a href="mailto:info.tourly.com" class="contact-link">campgo@gmail.com</a>
            </li>
            <li class="contact-item">
              <ion-icon name="location-outline"></ion-icon>
              <address>No.31,Borella,Colombo 05</address>
            </li>
          </ul>
        </div>
        <div class="footer-form">
          <p class="form-text">Subscribe our newsletter for more update & news !!</p>
          <form action="" class="form-wrapper">
            <input type="email" name="email" class="input-field" placeholder="Enter Your Email" required>
            <button type="submit" class="btn btn-secondary">Subscribe</button>
          </form>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <p class="copyright">&copy; 2023 <a href="">Group 06</a>. All rights reserved</p>
        <ul class="footer-bottom-list">
          <li>
            <a href="#" class="footer-bottom-link">Privacy Policy</a>
          </li>
          <li>
            <a href="#" class="footer-bottom-link">Term & Condition</a>
          </li>
          <li>
            <a href="#" class="footer-bottom-link">FAQ</a>
          </li>
        </ul>
      </div>
    </div>
  </footer>

  <!-- GO TO TOP-->
  <a href="#top" class="go-top" data-go-top>
    <ion-icon name="chevron-up-outline"></ion-icon>
  </a>


  <!-- Js link-->
  <script src="./js/script.js"></script>
  <!-- ionicon link-->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <script>
    let subMenu = document.getElementById("subMenu");

    function toggleMenu() {
      subMenu.classList.toggle("open-menu");
    }
  </script>
</body>

</html>