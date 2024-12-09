<?php
session_start();

require_once 'EditProfileClasses.php';
require_once 'DbConnector.php';


if(isset($_POST["fName"], $_POST["lName"], $_POST["email"], $_POST["contact"])) {
   if(empty($_POST["fName"]) || empty($_POST["lName"]) || empty($_POST["email"]) || empty($_POST["contact"])) {
      echo "There are empty values";
   } else {
      $fName = $_POST["fName"];
      $lName = $_POST["lName"];
      $email = $_POST["email"];
      
      $file = $_FILES['update_image'];
      $imageData = ''; // Initializing imageData variable
      

       if (isset($file) && $file['error'] === 0) {
            $imageData = file_get_contents($file['tmp_name']);
        }
        
        // Check if $imageData is still empty, and if so, assign the default image
        if (empty($imageData)) {
            // Set the default image path
            $defaultImagePath = 'images/default.jpg'; // Replace with your default image path
            $imageData = file_get_contents($defaultImagePath);
        }
            
                // Check if a file was uploaded
                if (isset($_FILES['update_image']) && $_FILES['update_image']['error'] === 0) {
                    $imageData = file_get_contents($_FILES['update_image']['tmp_name']);
                }else{

                }

      $contact = $_POST["contact"];
                $user_id = $_SESSION['userid'];
      $setData = new getSetData($fName, $lName, $email, $contact, $imageData,$user_id);
      $result = $setData->setManagerData();

      if ($result) {
         echo "Data updated successfully.";
      } else {
         echo "Data update failed.";
      }
   }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>



<div class="update-profile">
   <form action="" method="post" enctype="multipart/form-data" id="info">
      <?PHP
       $user_id = $_SESSION['userid'];
       $setData = new getSetData('', '', '', '', '', $user_id);
       $Data = $setData->getManagerData();

       if ($Data) {
         // Individual data can be accessed using array keys
         $dbFName = $Data['fName'];
         $dbLName = $Data['lName'];
         $email = $Data['email'];
         $contact = $Data['contact'];
         $photopath = $Data['img_path'];
     
         
     }
      ?>

   <?php
       
         echo '<img src="data:image;base64,'.base64_encode($photopath).'" alt="image">';
    
      ?>
      <div class="flex">
         <div class="inputBox">
            <span>First Name :</span>
            <input type="text" name="fName" value="<?php echo $dbFName; ?>" class="box">
            <span> Last Name :</span>
            <input type="text" name="lName" value="<?php echo $dbLName; ?>" class="box">
            <span>update your pic :</span>
            <input type="file" name="update_image" accept="" class="box">
         </div>
         <div class="inputBox" id="">
            <span> Contact :</span>
            <input type="text"name="contact" id="tp" value="<?php echo $contact; ?>" class="box">
            <span> Email :</span>
            <input type="email" name="email" value="<?php echo $email; ?>" class="box">
           
         </div>
      </div>
      <input type="submit" value="update profile" name="update_profile" class="btn">
      <a href="Home.php" class="delete-btn">go back</a>
   </form>

</div>
<script>
   document.getElementById("info").addEventListener("submit", function (event) {
    var telephoneInput = document.getElementById("tp");
    var telephoneValue = telephoneInput.value;

    if (telephoneValue.length !== 10 || !/^\d+$/.test(telephoneValue)) {
        alert("Invalid telephone number. Please enter 10 digits with no non-numeric characters.");
        telephoneInput.focus();
        event.preventDefault(); // Prevent the form from submitting if the input is invalid.
    }
});
</script>


</body>
</html>