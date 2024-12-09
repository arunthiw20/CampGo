<?php
session_start();
require_once 'EditProfileClasses.php';
require_once 'DbConnector.php';
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
            
                // Check if a file was uploaded
                if (isset($_FILES['update_image']) && $_FILES['update_image']['error'] === 0) {
                    $imageData = file_get_contents($_FILES['update_image']['tmp_name']);
                }else{

                }

      $contact = $_POST["contact"];
      $user_id =$_SESSION['userid'];
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
    <title>Document</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>

<div class="update-profile">
   <form action="" method="post" enctype="multipart/form-data">
      <?PHP
       $user_id =$_SESSION['userid'];
       $getdata = new getSetData('', '', '', '', '', $user_id);
       $Data = $getdata->getManagerData();

       if ($Data) {
         // Individual data can be accessed using array keys
         $dbFName = $Data['fName'];
         $dbLName = $Data['lName'];
         $email = $Data['email'];
         $contact = $Data['contact'];
         $photopath = $Data['img_path'];
     
         // Now you can use $fName, $lName, $email, $contact, $photopath as needed
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
         <div class="inputBox">
            <span> Contact :</span>
            <input type="text" name="contact" value="<?php echo $contact; ?>" class="box">
            <span> Email :</span>
            <input type="email" name="email" value="<?php echo $email; ?>" class="box">
           
         </div>
      </div>
      <input type="submit" value="update profile" name="update_profile" class="btn">
      <a href="new index.php" class="delete-btn">go back</a>
   </form>

</div>

</body>
</html>