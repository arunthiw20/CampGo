<?php
require_once('DbConnector.php');
//session_start();

class getSetData {
    private $fName;
    private $lName;
    private $photopath;
    private $email;
    private $contact;
    private $user_id;

    // Constructor
    public function __construct($fName, $lName, $email, $contact, $photopath,$user_id) {
        $this->fName = $fName;
        $this->lName = $lName;
        $this->photopath = $photopath;
        $this->email = $email;
        $this->contact = $contact;
        $this->user_id = $user_id ;// $_SESSION['user_id'];
    }

    public function setData() {
        try {
            $db = new DbConnector();
            $db->connect();
            $query = "UPDATE customer SET fName = ?, lName = ?, email = ?, contact = ?, img_path = ? WHERE userId = ?";
            $stmt = $db->preQury($query);
            $stmt->bindValue(1, $this->fName);
            $stmt->bindValue(2, $this->lName);
            $stmt->bindValue(3, $this->email);
            $stmt->bindValue(4, $this->contact);
            $stmt->bindValue(5, $this->photopath,PDO::PARAM_LOB);
            $stmt->bindValue(6, $this->user_id);
    
            $stmt->execute();
            
            
            return ($stmt->rowCount() > 0);
    
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
    

    public function getData() {
        try {
            $db = new DbConnector();
            $db->connect();
            $query = "SELECT * FROM customer WHERE userId = ?";
            $stmt = $db->preQury($query);
            $stmt->bindValue(1, $this->user_id);
            $stmt->execute();
            
            // Fetch data as an associative array
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            
            return $data;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
    public function getManagerData() {
        try {
            $db = new DbConnector();
            $db->connect();
            $query = "SELECT * FROM manager WHERE userid = ?";
            $stmt = $db->preQury($query);
            $stmt->bindValue(1, $this->user_id);
            $stmt->execute();
            
            // Fetch data as an associative array
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            
            return $data;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
    public function setManagerData() {
        try {
            $db = new DbConnector();
            $db->connect();
            $query = "UPDATE manager SET fName = ?, lName = ?, email = ?, contact = ?, img_path = ? WHERE userid = ?";
            $stmt = $db->preQury($query);
            $stmt->bindValue(1, $this->fName);
            $stmt->bindValue(2, $this->lName);
            $stmt->bindValue(3, $this->email);
            $stmt->bindValue(4, $this->contact);
            $stmt->bindValue(5, $this->photopath,PDO::PARAM_LOB);
            $stmt->bindValue(6, $this->user_id);
    
            $stmt->execute();
            
            
            return ($stmt->rowCount() > 0);
    
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
    public function getManagerName() {
        try {
            $db = new DbConnector();
            $db->connect();
            $query = "SELECT fName FROM manager WHERE userid = ?";
            $stmt = $db->preQury($query);
            $stmt->bindValue(1,  $this->user_id);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
    public function getUserName() {
        try {
            $db = new DbConnector();
            $db->connect();
            $query = "SELECT fName FROM customer WHERE userId = ?";
            $stmt = $db->preQury($query);
            $stmt->bindValue(1,  $this->user_id);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}
?>