<?php
require_once('DbConnector.php');
require_once('change_password_class.php');

if (isset($_POST["username"], $_POST["pw"], $_POST["new_pw"], $_POST["confirm_pass"])) {
    if (empty($_POST["username"]) || empty($_POST["pw"]) || empty($_POST["new_pw"]) || empty($_POST["confirm_pass"])) {
        echo "There are empty values";
    } else {
        $userEnteredName = trim($_POST["username"]);
        $old_pw = trim($_POST["pw"]);
        $new_pw = trim($_POST["new_pw"]);
        $confirm_pass = trim($_POST["confirm_pass"]);

        $user_id = 2;
        $getData = new Setpassword('', '', $user_id);
        $Data = $getData->getData();

        $username = $Data['username'];
        $dbpassword = $Data['password'];
       // $hashedOldPassword = password_hash($old_pw, PASSWORD_BCRYPT);

        // Check if the entered old password matches the stored hashed password
       // if (password_verify($old_pw, $dbpassword)) {
        if ($old_pw==$dbpassword) {
            // Check if the new password matches the confirm password
            if ($new_pw === $confirm_pass) {
                // Hash the new password and update it in the database
                $hashedPassword = password_hash($new_pw, PASSWORD_BCRYPT);

                $setpassword = new setPassword($username, $hashedPassword, $user_id);
                $setpassword->setPassword();

                if ($setpassword) {
                    echo "Password updated successfully.";
                } else {
                    echo "Password update failed.";
                }
            } else {
                echo "New password and confirm password do not match.";
            }
        } else {
            echo "Incorrect old password.";
        }
        echo "Entered Old Password: $old_pw<br>";
echo "Stored (Hashed) Password: $dbpassword<br>";
    }
}


?>

<!-- Your HTML form remains the same as in your previous code -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<div class="update-profile">
   <form action="" method="post">
      <div class="flex">
         <div class="inputBox">
            <span>Username :</span>
            <input type="text" name="username" placeholder="enter username" class="box">
            <span>Old Password :</span>
            <input type="password" name="pw" placeholder="enter previous password" class="box">
            <span>New Password :</span>
            <input type="password" name="new_pw" placeholder="enter new password" class="box">
            <span>Confirm Password :</span>
            <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
         </div>
         <div class="inputBox">
            
          
            
         </div>
      </div>
      <input type="submit" value="Update Password" name="update_profile" class="btn">
      <a href="new index.php" class="delete-btn">Go Back</a>
   </form>

</div>
</body>
</html>