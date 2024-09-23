<?php
// Allow any origin
header("Access-Control-Allow-Origin: *");

// Allow specific methods like POST, GET
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

// Allow specific headers
header("Access-Control-Allow-Headers: Content-Type");


class Database {
    public $conn;
    protected $database_name = 'font_group_system';
	protected $user_name = 'root';
	protected $password = '';
	protected $host_name = 'localhost';
    
    public function dbConnection () {
        $this->conn = null;
        $this->conn = new  mysqli($this->host_name ,$this->user_name, $this->password, $this->database_name);
        if($this->conn->connect_errno) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        return $this->conn;
    }
}

?>