<?php

require_once('DbConnector.php');
class cart {
   private $proId;
   public function __construct($proId) {
      $this->proId = $proId;
  }
}


class insertCamptools{
  private $tool_description;
  private $tool_name;
  private $imageData;
  private $tool_price;
 
    public function __construct($description, $name, $imageData, $price) {
      $this->tool_description = $description;
      $this->tool_name = $name;
      $this->imageData = $imageData;
      $this->tool_price = $price;
  }

  public function insertData(){
    try {
        $db = new DbConnector();
        $db->connect();
        
  
        $sql_insert = "INSERT INTO camping_tools(tool_description,tool_name,tool_image,tool_price) VALUES (?,?,?,?)";
  
        $stmt = $db->preQury($sql_insert);
        $stmt->bindValue(1, $this->tool_description); 
        $stmt->bindValue(2, $this->tool_name); 
        $stmt->bindValue(3, $this->imageData,PDO::PARAM_LOB); 
        $stmt->bindValue(4, $this->tool_price); 

        
         
  
        $stmt->execute();
  
        return ($stmt->rowCount() > 0);
    } catch (PDOException $e) {
        die("Error inserting data: " . $e->getMessage());
    }
  }
}
    


?>