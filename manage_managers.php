<?php
require_once('./classes/DbConnector.php');

$db = new dbConnection();
$db->dbconnt();

$sql = "SELECT * FROM manager";
$stmt = $db->preQuery($sql);
$stmt->execute();
$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Managers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success">
                        <h4 class="text-white text-center bg-success">Manage Managers</h4>
                    </div>
                    <div class="card-body ">
                        
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-dark">Manager ID</th>
                                    <th class="text-dark">Manager Name</th>
                                    <th class="text-dark">Contact no:</th>
                                    <th class="text-dark">Email</th>
                                    <th class="text-dark">Branch Id</th>
                                    <th class="text-dark">EDIT</th>
                                    <th class="text-dark">DELETE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($rs) {
                                    foreach ($rs as $tool) {
                                    ?>
                                    <tr>
                                        <td class="text-dark"><?php echo $tool['userId']; ?></td>
                                        <td class="text-dark"><?php echo $tool['fName'].$tool['lName']; ?></td>
                                        <td class="text-dark"><?php echo $tool['contact']; ?></td>
                                        <td class="text-dark"><?php echo $tool['email']; ?></td>
                                        <td ><?php echo $tool['branchId']; ?></td>
                                        <td><a href="" class="btn btn-success">EDIT</a></td>
                                        <td><a href="" class="btn btn-danger">DELETE</a></td>
                                       
                                    </tr>
                                    <?php
                                }}else {
                                    echo '<p>no results found</p>';
                                }
                                ?>
                            </tbody>
                        </table>
                        <a href="./insert_manager_data.php" class="btn btn-success">ADD NEW MANAGER</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
<?php

?>