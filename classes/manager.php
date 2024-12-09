<?php
require_once('./classes/manager.php');

class manager{
    private $uerid;
    private $fname;
    private $lname;
    private $contact;
    private $nic;
    private $email; 
    private $username;
    private $password;
    private $branchId;
    private $imageData;


    public function __construct($uerid, $fname, $lname, $contact, $nic, $email,$username,$password,$branchId,$imageData){
        
        $this->uerid = $uerid;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->contact = $contact;
        $this->nic = $nic;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->branchId = $branchId;
        $this->imageData = $imageData;

    }
    public function insertData(){
        try {
            $db = new dbConnection();
            $db->dbconnt();
    
            $sql_insert = "INSERT INTO `manager`(`userid`, `fName`, `lName`, `contact`, `NIC`, `email`, `username`, `password`, `branchId`, `img_path`) VALUES (?,?,?,?,?,?,?,?,?,?)";
    
            $stmt = $db->preQuery($sql_insert);
            $stmt->bindValue(1, $this->uerid); 
            $stmt->bindValue(2, $this->fname);
            $stmt->bindValue(3, $this->lname);
            $stmt->bindValue(4, $this->contact);
            $stmt->bindValue(5, $this->nic); 
            $stmt->bindValue(6, $this->email); 
            $stmt->bindValue(7, $this->username); 
            $stmt->bindValue(8, $this->password); 
            $stmt->bindValue(9, $this->branchId); 
            $stmt->bindValue(10, $this->imageData); 

    
            $stmt->execute();
    
            return ($stmt->rowCount() > 0);
        } catch (PDOException $e) {
            die("Error inserting data: " . $e->getMessage());
        }
    }
}
    
?>