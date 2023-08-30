<?php 
class DBConnection{

    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'carsdb';
    
    public $con;
    
    public function __construct(){

        if (!isset($this->con)) {
            
            $this->con = new mysqli($this->host, $this->username, $this->password, $this->database);
            
            if (!$this->con) {
                echo 'Cannot connect to database server';
                exit;
            }            
        }    
        
    }
    public function __destruct(){
        $this->con->close();
    }
}
?>