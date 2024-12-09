<?php

require_once('./classes/DbConnector.php');

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_POST["username"]) && $_POST["password"]){
      function validate($data){
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
      }
    }
      $username = validate( $_POST["username"]);
      $password   = validate( $_POST["password"]);
      $f_name = $_POST['fname'];
      $l_name = $_POST['lname'];
      $contactnumber = $_POST['contactnumber'];
      $e_mail = $_POST['email'];
      $confirm_password = $_POST['confirm_password'];
      $img_path = $_POST['img_path'];

        $fname = filter_var($f_name, FILTER_SANITIZE_STRING);
        $lname = filter_var($l_name, FILTER_SANITIZE_STRING);
        $email = filter_var($e_mail, FILTER_SANITIZE_EMAIL);

      if(empty($username) || empty($password) || empty($fname) || empty($lname) || empty($contactnumber) || empty($email) || empty($confirm_password) || empty($img_path)){
        echo "<script>alert('Please Fill All Info');</script>";
        exit();
      }elseif($password != $confirm_password){
        echo "<script>alert('Please_Enter_Same_Passwords!');</script>";
        header("location:signup.php");
        exit();
      }elseif(!preg_match("/^[0-9]{10}$/", $contactnumber)){
        echo "<script>alert('Please enter a valid 10-digit contact number');</script>";
        header("location:signup.php");
        exit();
      }elseif (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $db = new dbConnection();
        $db->dbconnt();
        $sql = "INSERT INTO `customer`(`userId`, `fName`, `lName`, `username`, `password`, `contact`, `email`, `img_path`) VALUES ('$userid','$fname, $lname','$username','$password','$contactnumber','$email','$img_path')";
        $rs = $db->preQuery($sql);

      if( $rs->execute() === TRUE){
        echo "<script>alert('Sign In Succes!');</script>";
        header("location:login.php");
      }else{
        echo "<script>alert('Sign In Unsucces!');</script>";
        header("location:signup.php");
        exit();
      }
      }else{
        echo "<script>alert('Enter Valied Email!');</script>";
        header("location:signup.php");
      }
  }

?>



<html>
<head>
  <title>Sign Up Form</title>
  <link rel="stylesheet" type="text/css" href="./css/signup.css">
</head>
<body>

  <div class="container">
    <h1>Sign Up</h1>
    <form action="signup.php" method="post">

      <label for="fname">First name</label>
      <input class="txt" type="text" id="fname" name="fname" placeholder="Enter your fname">

      <label for="lname">Last name</label>
      <input class="txt" type="text" id="lname" name="lname" placeholder="Enter your lname">

      <label for="contactnumber">Contact number</label>
      <input class="txt" type="text" id="contactnumber" name="contactnumber" placeholder="Enter your contactnumber" maxlength="10">

      <label for="username">Email</label>
      <input class="txt" type="text" id="username" name="username" placeholder="Enter your Email">

      <label for="email"> Username</label>
      <input class="txt" type="email" id="email" name="email" placeholder="Enter your Username">

      <label for="password">Password</label>
      <input class="txt" type="password" id="password" name="password" placeholder="Enter your password">

      <label for="confirm-password">Confirm Password</label>
      <input class="txt" type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password">

      <button type="submit">Sign Up</button>
      
    </form>
  </div>

</body>

</html>