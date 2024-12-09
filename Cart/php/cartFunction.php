<?php

require_once('../php/dbcon.php');
class cart{
   private $proId;
 
 
   public function __construct($proId) {
      $this->proId = $proId;
  }
  
  public function getDbData(){
    try {
       $db = new dbcon();
       $db->dbConnection();
       $query = "SELECT * from product WHERE proID = :proId";
       $stmt= $db->preQuery($query);
       $stmt->bindParam(':proId', $this->proId, PDO::PARAM_INT);
  
       $stmt->execute();
  
       $resultSet = $stmt->fetch(PDO::FETCH_ASSOC);
  
      
     return $resultSet; 
  
    } catch (PDOException $ex) {
       die("couldn't connect to database".$ex->getMessage());
    }
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
        $db = new dbcon();
        $db->dbConnection();
        
  
        $sql_insert = "INSERT INTO camping_tools(tool_description, tool_name, tool_image, tool_price) VALUES (?,?,?,?)";
  
        $stmt = $db->preQuery($sql_insert);
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

  public function updateTools() {
    try {
      $db = new dbcon();
      $db->dbConnection();
        $query = "UPDATE camping_tools SET tool_description = ?,  Tool_image = ?, Tool_name = ?, Tool_price = ? WHERE Tool_id = ?";
        $stmt = $db->preQuery($query);
        $stmt->bindValue(1, $this->tool_description);
        $stmt->bindValue(2,$this->imageData,PDO::PARAM_LOB);
        $stmt->bindValue(3, $this->tool_name);
        $stmt->bindValue(4, $this->tool_price);
       

        $stmt->execute();
        
        
        return ($stmt->rowCount() > 0);

    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

}

?>