<?php 
    session_start()
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insert Manager Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card border border-success" style="margin-top:40px;">
            <div class="card-header bg-success" style="text-align:center;">
              <h4 class="text-white">Insert Manager Data</h4>
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
                <label for="">Manager First Name</label>
                <input type="text" name="fname" required class="form-control border border-success" placeholder="First nme">
              </div>
              <br>
              <div class="form-group" >
                <label for="">Manager Last Name</label>
                <input type="text" name="lname" required class="form-control border border-success" placeholder="Last name">
              </div>
              <br>
              <div class="form-group" >
                <label for="">Contact Number</label>
                <input type="text" name="contact" required class="form-control border border-success" placeholder="Contact no:">
              </div>
              <br>
              <div class="form-group" >
                <label for="">NIC</label>
                <input type="text" name="nic" required class="form-control border border-success" placeholder="NIC">
              </div>
              <br>
              <div class="form-group" >
                <label for="">Email</label>
                <input type="email" name="email" required class="form-control border border-success" placeholder="Email">
              </div>
              <br>
              <div class="form-group" >
                <label for="">Username</label>
                <input type="text" name="username" required class="form-control border border-success" placeholder="Username">
              </div>
              <br>
              <div class="form-group" >
                <label for="">Password</label>
                <input type="password" name="password" required class="form-control border border-success" placeholder="Password">
              </div>
              <br>
              <div class="form-group" >
                <label for="">branchId</label>
                <input type="text" name="branchId" required class="form-control border border-success" placeholder="branchId">
              </div>branchId
              <br>
              <div class="form-group">
                <label for="">Image of the Tool</label>
                <input type="file" name="mpimage" accept="image/*" required class="form-control border border-success">
              </div>
              <br>
              <br>
              <div>
                <button type="submit" name="save_manager_data" class="btn btn-primary bg-success border border-success">SUBMIT</button>
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