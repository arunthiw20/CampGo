<?php 

class dbConnection{
   private $host="localhost";
   private $username="root";
   private $dbpw="";
   private $db_name="testdb";
   private $con;
    
    
    public function dbconnt(){
        $dsn = "mysql:host=$this->host;dbname=$this->db_name";
        try {
            
            $this->con = new PDO($dsn, $this->username, $this->dbpw);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->con;
        } catch (PDOException $th) {
            die("CANNOT CONNECT: " . $th->getMessage());
        }
    }

    public function preQuery($query){
        return $this->con->prepare($query);
    }
}








































/*class dbConnection{
   private $host="localhost";
   private $username="Root";
   private $dbpw="rootN";
   private $db_name="campgo";
   private $con;
    
    
    public function dbconnt(){
        $dsn = "mysql:host=$this->host;dbname= $this->db_name";
        try {
            
            $this->con = new PDO($dsn, $this->username, $this->dbpw);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->con;
        } catch (PDOException $th) {
            die("CANNOT CONNTEC".$th->getMessage());
        }
    }

    public function preQuery($query){
        return $this->con->prepare($query);
    }

}



/*try {
    $con=new PDO("mysql:host=$host;dbname=$db_name",$username,$dbpw);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'error occured: '.$e->getMessage();
    die();
}*/
?>