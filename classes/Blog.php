<?php
require_once('./classes/DbConnector.php');

class Blog{
    private $Blogname;
    private $Blogdescription;
    private $imageData; 
   

    public function __construct($Blogname, $Blogdescription, $imageData){
        
        $this->Blogname = $Blogname;
        $this->Blogdescription = $Blogdescription;
        $this->imageData = $imageData;
    }
    public function insertData(){
        try {
            $db = new dbConnection();
            $db->dbconnt();
    
            $sql_insert = "INSERT INTO `blog`(`blog_id`, `blog_name`, `blog_description`, `blog_image`) VALUES (null,?,?,?)";
    
            $stmt = $db->preQuery($sql_insert);
            
            $stmt->bindValue(1, $this->Blogname); 
            $stmt->bindValue(2, $this->Blogdescription); 
            $stmt->bindValue(3, $this->imageData); 
    
            $stmt->execute();
    
            return ($stmt->rowCount() > 0);
        } catch (PDOException $e) {
            die("Error inserting data: " . $e->getMessage());
        }
    }
}
    
?>