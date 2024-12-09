<?php
  session_start();
  require_once('./classes/DbConnector.php');

?>

<!DOCTYPE html>
<html>
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fasthand&display=swap" rel="stylesheet">
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="./css/login.css">

  <script>
        function limitCheckboxSelection(checkbox) {
            var checkboxes = document.getElementsByName('table[]');
            checkboxes.forEach(function(currentCheckbox) {
                if (currentCheckbox !== checkbox) {
                    currentCheckbox.checked = false;
                }
            });
        }
    </script>


</head>
<body>
    <h3 class="log-topic" >Log In Here. .For a Great OutDoor Experience!</h3>
    <div class="container custom">
      <h1>Login</h1>

      <form action="login.php" method="POST">

        <label for="username">Username</label>
        <input class="txt" type="text" id="username" name="username" placeholder="Enter your username">

        <label for="password">Password</label>
        <input class="txt" type="password" id="password" name="password" placeholder="Enter your password">

        <div class="checkbox-container">
          <input type="checkbox" id="remember-me" name="remember-me">
          <label for="remember-me" >Remember Me</label>
          <label for="customer">
          <input type="checkbox" name="table[]" id="customer" value="customer" onclick="limitCheckboxSelection(this)" checked> Customer
          </label>
          <label for="manager">
          <input type="checkbox" name="table[]" id="manager" value="manager" onclick="limitCheckboxSelection(this)"> Manager
          </label>
          <label for="admin">
          <input type="checkbox" name="table[]" id="admin" value="admin" onclick="limitCheckboxSelection(this)"> Admin
          </label>
        </div>

        <button type="submit">Login</button>
        <a href="signup.php" class="signup-link">Sign Up</a>
        
      </form>
    </div>

</body>
</html>


<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_POST["username"]) && $_POST["password"]){
      function validate($data){
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
      }

      $username = validate( $_POST["username"]);
      $password   = validate( $_POST["password"]);

      if(empty($username)){
          header("location:login.php?empty_username");
          exit();
      }elseif(empty($password)){
          header("location:login.php?empty_password");
          exit();
      }else{


          if (isset($_POST["table"])) {
              
              echo "Selected table: ";
              foreach ($_POST["table"] as $table) {

                  $db = new dbConnection();
                  $db->dbconnt();
                  $sql = "SELECT * from $table WHERE username = :username AND password = :password";
                  $rs = $db->preQuery($sql);
                  $rs->bindParam(':username', $username, PDO::PARAM_STR);
                  $rs->bindParam(':password', $password, PDO::PARAM_STR);
                  $rs->execute();
                  $row = $rs->fetch(PDO::FETCH_ASSOC);

                  if($row != NULL){

                      if($row['username']===$username && $row['password']===$password){

                          $_SESSION['userid'] = $row['userId'];

                          if($table == "customer"){
                            header("location:Home.php");
                            exit();
                          }elseif($table == "manager"){
                            header("location:http://localhost:3000/Project01-correct-one/manager/Home.php");
                            exit();
                          }elseif($table == "admin"){
                            header("location:Dashboard.php");
                            exit();
                          }
                          
                          
                      }else{
                          header("location:login.php?error_username_or_password");
                          echo "error";
                          exit();
                      }
                  }else{
                      header("location:login.php?uname pwd error");
                      exit();
                  }
              }
          } else {
              echo "No roles selected.";
          }

      }
  }
}
?>