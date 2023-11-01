<?php

class Database {
    private $localhost = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'dbmysql';
    protected $conn = null;

    public function __construct() {
        $this->connect();
    }

    public function connect() {
        $this->conn = new mysqli($this->localhost, $this->username, $this->password, $this->database);
        if($this->conn->connect_error) {
            die('Error connecting to database' . $this->conn->connect_error);
        }
    }
}