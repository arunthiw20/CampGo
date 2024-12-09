<?php
require_once('db.php');

class getSetData{
    private $des_id;
    private $des_name;
    private $des_location;
    private $des_description; 
    private $des_price;

    private $des_image;
    


    public function __construct($des_id,$des_name, $des_location, $des_description, $des_price,$des_image){
        $this->des_id = $des_id;
        $this->des_name = $des_name;
        $this->des_location = $des_location;
        $this->des_description = $des_description;
        $this->des_price = $des_price;
        $this->des_image = $des_image;
    }

    public function getId(){
        return $this->des_id;
    }
    public function getName(){
        return $this->des_name;
    }
    public function getLocation(){
        return $this->des_location;
    }
    public function getDescription(){
        return $this->des_description;
    }
    public function getPrice(){
        return $this->des_price;
    }
    public function getImage(){
        return $this->des_image;
    }


    public function insertData(){
           /* try {
                $db = new dbConnection();
                $db->dbconnt();
        
                $sql_insert = "INSERT INTO `destinations`(`des_name`, `des_location`, `des_description`, `des_price`, `des_image`) VALUES (?,?,?,?,?)";
        
                $stmt = $db->preQuery($sql_insert);
                $stmt->bindValue(1, $this->des_name); 
                $stmt->bindValue(2, $this->des_location); 
                $stmt->bindValue(3, $this->des_description); 
                $stmt->bindValue(4, $this->des_price); 
                $stmt->bindValue(5, $this->des_image); 
        
                $stmt->execute();
        
                return ($stmt->rowCount() > 0);
            } catch (PDOException $e) {
                die("Error inserting data: " . $e->getMessage());
            }
        }
    */
        
        try {
            $db = new dbConnection();
            $db->dbconnt();
    
            $sql_insert = "INSERT INTO `destinations`(`des_id`, `des_name`, `des_location`, `des_description`, `des_price`, `des_image`) VALUES (NULL,?,?,?,?,?)";
    
            $stmt = $db->preQuery($sql_insert);
            $stmt->bindValue(1, $this->des_name); 
            $stmt->bindValue(2, $this->des_location); 
            $stmt->bindValue(3, $this->des_description); 
            $stmt->bindValue(4, $this->des_price); 
            $stmt->bindValue(5, $this->des_image); 
    
            $stmt->execute();
    
            return ($stmt->rowCount() > 0);
        } catch (PDOException $e) {
            die("Error inserting data: " . $e->getMessage());
        }
    }



    public static function displayDestinationDetails(){
            $destinations=array();
        try {
            
            $db = new dbConnection();
            $db->dbconnt();
            $query = "SELECT * FROM destinations";  
            $stmt = $db->preQuery($query);
            $stmt->execute();
            $rs = $stmt->fetchAll(PDO::FETCH_OBJ);
            if(!empty($rs)){
                foreach ($rs as $row) {
                    echo $row;
                    $destination = new getSetData($row->des_id,$row->des_name, $row->des_location, $row->des_description, $row->des_price, $row->des_image);
                    $destinations[] = $destination;
                }
        }
        } catch (PDOException $e) {
            die("Error inserting data: " . $e->getMessage());
        }
        return $destinations;
    }
    }
