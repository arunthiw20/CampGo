<?php
require_once('getID.php');

$cart = new getID();
$proID = $cart->getID(); 


if (!is_array($proID)) {
    $proID = array($proID);
}
?>
