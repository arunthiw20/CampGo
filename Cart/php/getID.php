<?
class getID{
    function __construct(){
       
    }
    public function getID(){
        try {
            
           $db = new dbcon();
            $db->dbConnection();
            $query = "SELECT proID FROM product";
            $stmt = $db->preQuery($query);
            $stmt->execute();
            $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultSet;
  
        } catch (PDOException $ex) {
            
           die("Couldn't connect to the database: " . $ex->getMessage());
       
        }
  
    }
}

?>