<?php
require_once('./classes/Destination.php');

class Destination{
    private $des_name;
    private $des_location;
    private $des_price; 
    private $des_image;
    private $des_description;

    public function __construct($des_name, $des_location, $des_price, $des_image, $des_description){
        
        $this->des_name = $des_name;
        $this->des_location = $des_location;
        $this->des_price = $des_price;
        $this->des_image = $des_image;
        $this->des_description = $des_description;
    }
    public function insertData(){
        try {
            $db = new dbConnection();
            $db->dbconnt();
    
            $sql_insert = "INSERT INTO `destinations`(`des_id`, `des_name`, `des_location`, `des_price`, `des_image`, `des_description`) VALUES (NULL,?,?,?,?,?)";
    
            $stmt = $db->preQuery($sql_insert);
            $stmt->bindValue(1, $this->des_name); 
            $stmt->bindValue(2, $this->des_location); 
            $stmt->bindValue(3, $this->des_price); 
            $stmt->bindValue(4, $this->des_image); 
            $stmt->bindValue(5, $this->des_description); 
    
            $stmt->execute();
    
            return ($stmt->rowCount() > 0);
        } catch (PDOException $e) {
            die("Error inserting data: " . $e->getMessage());
        }
    }
}
    
?>