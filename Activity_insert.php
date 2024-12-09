<?php
include('DbConnector.php');
session_start();
    if(isset($_POST['save_des_image'])){
        
        $Activityname = $_POST['name'];
        $Activitylocation = $_POST['location'];
        $Activityprice = $_POST['price'];
        $Activitydescription = $_POST['description'];

        $Activity_image_name = $_FILES['image']['name'];
        $Activity_img_tempname = $_FILES['image']['tmp_name'];

        $folder = "uploads/".$Activity_image_name;

        $_SESSION['status'] ="Data Saved Successfully";
        header('Location: insertdata.php');
        move_uploaded_file($Activity_img_tempname,$folder);

        $sql_insert = "INSERT INTO `activitypackages`(`ActivityID`, `name`, `location`, `price`, `image`, `description`) VALUES ('NULL','$Activityname','$Activitylocation','$Activityprice','$folder','$Activitydescription')";

        if($con->query($sql_insert) === TRUE){
            $_SESSION['status'] ="Data Saved Successfully";
            header('Location: insert_Activity_data.php');

        }else{
            die();
        }
    }

?>