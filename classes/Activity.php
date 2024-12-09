<?php
require_once('./classes/DbConnector.php');

class Activity{
    private $Activityname;
    private $Activitylocation;
    private $Activityprice; 
    private $Activitydescription;
    private $Activity_image_name;

    public function __construct($Activityname, $Activitylocation, $Activitydescription, $Activityprice,$Activity_image_name){
        
        $this->Activityname = $Activityname;
        $this->Activitylocation = $Activitylocation;
        $this->Activitydescription = $Activitydescription;
        $this->Activityprice = $Activityprice;
        $this->Activity_image_name = $Activity_image_name;
    }
    public function insertData(){
        try {
            $db = new dbConnection();
            $db->dbconnt();
    
            $sql_insert = "INSERT INTO `activitypackages`(`id`,`name`, `location`, `price`, `activity_img`, `description`) VALUES (null,?,?,?,?,?)";
    
            $stmt = $db->preQuery($sql_insert);
            
            $stmt->bindValue(1, $this->Activityname); 
            $stmt->bindValue(2, $this->Activitylocation); 
            $stmt->bindValue(3, $this->Activitydescription); 
            $stmt->bindValue(4, $this->Activityprice); 
            $stmt->bindValue(5, $this->Activity_image_name); 
    
            $stmt->execute();
    
            return ($stmt->rowCount() > 0);
        } catch (PDOException $e) {
            die("Error inserting data: " . $e->getMessage());
        }
    }
}
    
?>