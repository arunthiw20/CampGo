<?php
session_start();

 $merchant_id= "1224876";
 $order_id = uniqid();
 $amount= $_SESSION["price"];
 $merchant_secret="NDY5MTc5MTQ2ODU5NDA1NjE3MzY4MjE2MzIxMzM5MjEzMTYwOTc="; 
 $currency="LKR";

$hash = strtoupper(
    md5(
        $merchant_id . 
        $order_id . 
        number_format($amount, 2, '.', '') . 
        $currency .  
        strtoupper(md5($merchant_secret)) 
    ) 
);

$array=[]; 

$array["items"] = "bell wire";
$array["first_name"] = "samn";
$array["last_name"] = "kamal";
$array["phone"] = "0765869432";
$array["email"] = "rohananaharsha@gmail.com";
$array["address"] = "collll";
$array["city"] = "ginigahtens";
$array["amount"] = $amount;
$array["currency"] = $currency;
$array["order_id"] = $order_id;
$array["merchant_id"] = $merchant_id;
$array["hash"] = $hash;

$jsonData = json_encode($array);
 echo $jsonData;
?>