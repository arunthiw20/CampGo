<?php
require_once('DbConnector.php');
session_start();

class Setpassword {
    private $user_id;
    private $username;
    
    private $password;
    

    // Constructor
    public function __construct($username, $password,$user_id) {
        $this->username = $username;
        $this->password = $password;
        
        $this->user_id = $user_id ;// $_SESSION['user_id'];
    }

    public function setPassword() {
        try {
            $db = new DbConnector();
            $db->connect();
            $query = "UPDATE customer SET password = ? WHERE CustomerId = ?";
            $stmt = $db->preQury($query);
            $stmt->bindValue(1, $this->password);
            $stmt->bindValue(2, $this->user_id);
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
            $query = "SELECT * FROM customer WHERE CustomerId = ?";
            $stmt = $db->preQury($query);
            $stmt->bindValue(1, $this->user_id);
            $stmt->execute();
            $Data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $Data;

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
}

}
?>
