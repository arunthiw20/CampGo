<?php
session_start();

// Check if the shopping cart exists in the session
if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shopping Cart</title>
    <link href="../css/shoppingCart.css" rel="stylesheet">
    <script src="script.js"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
</head>
<body>
    <h1>Shopping Cart</h1>

    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $totalPrice = 0;

            // Loop through each item in the cart
            foreach ($_SESSION["cart"] as $productId => $product) {
                $productName = $product['name'];
                $productDescription = $product['description'];
                $productPrice = $product['price'];
                $productQuantity = $product['quantity'];
                $subtotal = $productPrice * $productQuantity;

                // Calculate the total price
                $totalPrice += $subtotal;
            ?>
            <tr>
                <td><?php echo $productName; ?></td>
                <td><?php echo $productDescription; ?></td>
                <td><?php echo $productPrice; ?></td>
                <td><?php echo $productQuantity; ?></td>
                <td><?php echo $subtotal; ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">Total:</td>
                <td><?php echo $totalPrice; ?></td>
            </tr>
        </tfoot>
    </table>
    <button onclick="paymentProcess()">Pay</button>

</body>
</html>

<?php
$_SESSION["price"] = $totalPrice;
} else {
    ?><h2 class="empty">Your shopping cart is empty.</h2><?php
}
?>
