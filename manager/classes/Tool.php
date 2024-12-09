<?php
require_once('./classes/DbConnector.php');

class Tool{
    private $Toolname; 
    private $Tooldescription;
    private $Tool_image_name;
    private $Toolprice;

    public function __construct($Toolname, $Tooldescription, $Tool_image_name, $Toolprice){
        
        $this->Toolname = $Toolname;
        $this->Tooldescription = $Tooldescription;
        $this->Tool_image_name = $Tool_image_name;
        $this->Toolprice = $Toolprice;
    }
    public function insertData(){
        try {
            $db = new dbConnection();
            $db->dbconnt();
    
            $sql_insert = "INSERT INTO `camping_tools`(`tool_id`, `tool_name`, `tool_description`, `tool_image`, `tool_price`) VALUES (null,?,?,?,?)";
    
            $stmt = $db->preQuery($sql_insert);
            
            $stmt->bindValue(1, $this->Toolname);
            $stmt->bindValue(2, $this->Tooldescription); 
            $stmt->bindValue(3, $this->Tool_image_name); 
            $stmt->bindValue(4, $this->Toolprice); 
    
            $stmt->execute();
    
            return ($stmt->rowCount() > 0);
        } catch (PDOException $e) {
            die("Error inserting data: " . $e->getMessage());
        }
    }
}
    
?>