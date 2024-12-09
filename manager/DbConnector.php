<?PHP
class DbConnector{
    private $dbHost = "localhost";
    private $dbName = "testdb";
    private $dbUser = "root";
    private $dbPass = "";
    private $con;

    public function connect(){
        $dsn = "mysql:host={$this->dbHost};dbname={$this->dbName}";
        try {
            $this->con = new PDO($dsn, $this->dbUser, $this->dbPass);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->con;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
    public function preQury($query){
        return $this->con->prepare($query);
    }
}
?>