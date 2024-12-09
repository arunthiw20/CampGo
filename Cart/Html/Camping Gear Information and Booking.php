
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!--boostrap-->



    <!--stylesheet-->
    <link rel="stylesheet" href="../css/Camping Gear Information and Booking.css">
    <!--stylesheet-->



    <title>Document</title>
</head>

<!--header--> 
<header>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Navbar</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled">Disabled</a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
</header>

<!--header-->


<body>
    



     <form action="cart.php">

     <table>
        <tr>
          <td>
            <img class="productimg" id="productimg" src="../Resources/4-e1637237268727-compress.jpg" alt="">
          </td>
          <td>
            <ul class="descriptio no-dot" id="description">
              <li><h1>The North Face</h1></li>
              <!--<li>
                <div class="rate">
                  <input type="radio" id="star5" name="rate" value="5" />
                  <label for="star5" title="text">5 stars</label>
                  <input type="radio" id="star4" name="rate" value="4" />
                  <label for="star4" title="text">4 stars</label>
                  <input type="radio" id="star3" name="rate" value="3" />
                  <label for="star3" title="text">3 stars</label>
                  <input type="radio" id="star2" name="rate" value="2" />
                  <label for="star2" title="text">2 stars</label>
                  <input type="radio" id="star1" name="rate" value="1" />
                  <label for="star1" title="text">1 star</label>
                </div>
              </li>-->
              <li>price</li>
              <li name='description'></li>
              <?php
                foreach ($variable as $key => $value) {
                  
                }
              ?>
              

              <li>
                  <a href="">
                      <img class="colr" src="../Resources/download.png" alt="">
                  </a>
                  <a href="">
                      <img class="colr" src="../Resources/download.png" alt="">
                  </a>
              </li>

              <li class="size">
                  <button class="btn">S</button>
                  <button class="btn">M</button>
                  <button class="btn">L</button>
              </li>

              <li>
                 <label for="">Quantity: <input type="text" name="" id="" value="1"></label>
              </li>
          </ul>
          </td>
        </tr>
      </table>

     </form>
    
</body>
  <!--footer-->
  <footer>
    <p>&copy; 2023 MyWebsite.com. All rights reserved.</p>
  </footer>
  <!--footer-->
</html>