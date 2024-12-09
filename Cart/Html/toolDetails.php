<?php

require_once('../php/cart.php');
require_once('../php/getID.php');

function cardContainer($proDescription, $proImage, $proname, $proPrice) {
    $container = '
    <div class="card" style="width: 18rem;">
        <img src="' .$proImage . '" class="card-img-top" alt="' . $proname . '">
        <div class="card-body">
            <h5 class="card-title">' . $proname . '</h5>
            <p class="card-text">' . $proDescription . '</p>
            <p class="card-text">$' . $proPrice . '</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">An item</li>
            <li class="list-group-item">A second item</li>
            <li class="list-group-item">A third item</li>
        </ul>
        <div class="card-body">
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
        </div>
    </div>
    ';
    echo $container;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title></title>
    
</head>
<body>


    
<?php
session_start();

include_once('../php/cart.php');
include('../php/fetchid.php'); // Include the fetched product IDs

$cart = new cart($proID);



if (isset($_POST['selected_tools'])) {
    // Store selected tools in a session variable (you can use a database instead)
    $_SESSION['cart'] = $_POST['selected_tools'];
}

// Redirect to the shopping cart page
header('Location: shopping_cart.html');
?>

?>

 


<body>
<!DOCTYPE html>
<html>
<head>
    <title>Select Camping Tools</title>
</head>
<body>
    <h1>Select Camping Tools</h1>
    <form action="process_tools.php" method="post">
        <label for="tool1"><input type="checkbox" name="selected_tools[]" value="Tool 1">Tool 1</label><br>
        <label for="tool2"><input type="checkbox" name="selected_tools[]" value="Tool 2">Tool 2</label><br>
        <label for="tool3"><input type="checkbox" name="selected_tools[]" value="Tool 3">Tool 3</label><br>
        <input type="submit" value="Add to Cart">
    </form>
</body>
</html>
</body>
</html>
