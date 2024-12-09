<?php

class dbcon{
    private $host='localhost:3306';
    private $username='root';
    private $password='';
    private $dbName='testdb';
    private $con;
 
    public function dbConnection(){
        $dsn="mysql:host={$this->host};dbname={$this->dbName}";
        try {
           
            $this->con=new PDO($dsn,$this->username,$this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            return $this->con;

        } catch (PDOException $p) {
            die("Could not connect to database: " . $p->getMessage());
        }
    }
   
    public function preQuery($query){
        return $this->con->prepare($query);
    }

}



?> 