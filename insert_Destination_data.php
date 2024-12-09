<?php session_start()?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insert Destinations Packages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card border border-success" style="margin-top:40px;">
            <div class="card-header bg-success" style="text-align:center;">
              <h4 class="text-white">Insert Destinations</h4>
            </div>
            <div class="card-body">

            <?php
              if(isset($_SESSION['status']) && $_SESSION != ''){
                    ?>
                    <div class="alert alert-warning" role="alert"><?php echo $_SESSION['status']; ?></div>
                    <?php
                    unset($_SESSION['status']);
              }else{

              }
              ?>

            <form action="Des_CRUD.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="" >Destination Name</label>
                <input type="text" name="des_name" required class="form-control border border-success" placeholder="Enter Destination Name" >
              </div>
              <br>
              <div class="form-group" >
                <label for="">Destination Location</label>
                <input type="text" name="des_location" required class="form-control border border-success" placeholder="Enter Destination Location">
              </div>
              <br>
              <div class="form-group" >
                <label for="">Destination Description</label>
                <input type="text" name="des_description" required class="form-control border border-success" placeholder="Enter Destination Description" >
              </div>
              <br>
              <div class="form-group" >
                <label for="">Destination Price</label>
                <input type="text" name="des_price" required class="form-control border border-success" placeholder="Enter Destination Price" >
              </div>
              <br>
              <div class="form-group">
                <label for="">Destination Image</label>
                <input type="file" name="des_image" accept="image/*" required class="form-control border border-success">
              </div>
              <br>
              <br>
              <div>
                <button type="submit" name="save_des_image" class="btn btn-primary bg-success border border-success">SUBMIT</button>
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