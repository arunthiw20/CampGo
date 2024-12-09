<?php
//require_once('Destination_insert.php');
require_once('./classes/DbConnector.php');

$db = new dbConnection();
$db->dbconnt();

$sql = "SELECT * FROM camping_tools";
$stmt = $db->preQuery($sql);
$stmt->execute();
$rs = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Camping Gear Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success">
                        <h4 class="text-white text-center bg-success">Manage Marketplace Data</h4>
                    </div>
                    <div class="card-body ">
                        
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-dark">Equipment ID</th>
                                    <th class="text-dark">Equipment Name</th>
                                    <th class="text-dark">Equipment Description</th>
                                    <th class="text-dark">Equipment Price</th>
                                    <th class="text-dark">Equipment Image</th>
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
                                        <td class="text-dark"><?php echo $tool['tool_id']; ?></td>
                                        <td class="text-dark"><?php echo $tool['tool_name']; ?></td>
                                        <td class="text-dark"><?php echo $tool['tool_description']; ?></td>
                                        <td class="text-dark"><?php echo $tool['tool_price']; ?></td>
                                        <td >
                                        <?php echo '<img src="data:image;base64,'.base64_encode($tool["tool_image"]).'" width="100px"    alt="Image">'?>
                                        </td>
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
                        <a href="./insert_tools_data.php" class="btn btn-success">ADD NEW ACTIVITY</a>
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