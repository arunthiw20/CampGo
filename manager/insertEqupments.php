
<?php 

require_once('DbConnector.php');
require_once('cartFunction.php');

if(isset($_POST['save_des'])){

        if(isset($_POST['save_des'])){
            if(isset($_POST['name']) && !empty($_POST['name'])){
                $name = $_POST['name'];
            } else {
                echo "Name is missing or empty!";
                exit();
            }
        
            if(isset($_POST['description']) && !empty($_POST['description'])){
                $description = $_POST['description'];
            } else {
                echo "Description is missing or empty!";
                exit();
            }
        
            if(isset($_POST['price']) && is_numeric($_POST['price'])){
                $price = $_POST['price'];
            } else {
                echo "Price is missing or invalid!";
                exit();
            }
        
            // Check if the 'image' key is set before accessing it
            
            // Handle image upload
            
                $file = $_FILES['image'];
            
                // Check if a file was uploaded
                if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                    $imageData = file_get_contents($_FILES['image']['tmp_name']);
                }else{

                }
            
            

        $db = new DbConnector();
        $db->connect();
     
     
         $insert = new insertCamptools($description, $name, $imageData, $price);
         $insert->insertData();
}else{
    echo "no any data";
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insert Camp Tools</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card" style="margin-top:40px;">
            <div class="card-header" style="text-align:center; background-color: #ffc107;">
              <h4>Insert Camping Eqvipments</h4>
            </div>
            <div class="card-body">
            
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="">Tool Name</label>
                <input type="text" name="name" required class="form-control" placeholder="Enter Name">
              </div>
              <div class="form-group" >
                <label for="">Tool Descriptio</label>
                <input type="text" name="description" required class="form-control" placeholder="Enter Location">
              </div>
              <div class="form-group" >
                <label for="">Tool Price</label>
                <input type="text" name="price" required class="form-control" placeholder="Enter Price">
              </div>
              <div class="form-group">
                <label for="">Tool Image</label>
                <input type="file" name="image" accept="image/*" required class="form-control">
              </div>
              <br>
              <div>
                <button type="submit" name="save_des" class="btn btn-primary bg-warning">SUBMIT</button>
              </div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    
  
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>


