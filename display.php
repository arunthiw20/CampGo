<?php
//require_once('Destination_insert.php');
require_once('./classes/DbConnector.php');

$db = new dbConnection();
$db->dbconnt();

$sql = "SELECT * FROM destinations";
$stmt = $db->preQuery($sql);
$stmt->execute();
$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Destination Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body class="bg-dark">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-warning">
                        <h4 class="text-black text-center">Edit & Delete Destinations</h4>
                    </div>
                    <div class="card-body bg-dark">
                        
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="bg-dark text-white">Destination ID</th>
                                    <th class="bg-dark text-white">Destination Name</th>
                                    <th class="bg-dark text-white">Destination Location</th>
                                    <th class="bg-dark text-white">Destination Description</th>
                                    <th class="bg-dark text-white">Destination Price</th>
                                    <th class="bg-dark text-white">Destination Image</th>
                                    <th class="bg-dark text-white">EDIT</th>
                                    <th class="bg-dark text-white">DELETE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($rs) {
                                    foreach ($rs as $destination) {
                                    ?>
                                    <tr>
                                        <td class="bg-dark text-white"><?php echo $destination['des_id']; ?></td>
                                        <td class="bg-dark text-white"><?php echo $destination['des_name']; ?></td>
                                        <td class="bg-dark text-white"><?php echo $destination["des_location"]; ?></td>
                                        <td class="bg-dark text-white"><?php echo $destination["des_description"]; ?></td>
                                        <td class="bg-dark text-white"><?php echo $destination["des_price"]; ?></td>
                                        <td class="bg-dark">
                                            <img src="<?php echo $destination["des_image"]; ?>" width="100px" alt="Image">
                                        </td>
                                       
                                    </tr>
                                    <?php
                                }}else {
                                    echo '<p>no results found</p>';
                                }
                                ?>
                            </tbody>
                        </table>
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