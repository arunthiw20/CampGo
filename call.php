<?php
require_once('Destination_insert.php');
require_once('db.php');


session_start();
    if(isset($_POST['save_des_image'])){
        //$desid = $_POST['des_id'];
        $des_name = $_POST['des_name'];
        $des_location = $_POST['des_location'];
        $des_description = $_POST['des_description'];
        $des_price = $_POST['des_price'];
       
        $des_image_name = $_FILES['des_image']['name'];
        $des_imageimg_tempname = $_FILES['des_image']['tmp_name'];

        $folder = "uploads/".$des_image_name;



        
        $db = new dbConnection();
        $db->dbconnt();

        $destination = new getSetData($des_id,$des_name, $des_location, $des_description, $des_price,$folder);
        $destination->insertData();

        if($destination->insertData()){
            $_SESSION['status'] ="Data Saved Successfully";
            header('Location: insert_Destination_data.php');
            move_uploaded_file($des_imageimg_tempname,$folder);
        }else{
            $_SESSION['status'] ="Data not saved Successfully";
        }
        

        
        


       /* if($con->query($sql_insert) === TRUE){
            $_SESSION['status'] ="Data Saved Successfully";
            header('Location: insert_Destination_data.php');

        }else{
            die();
        }*/
    }

?>