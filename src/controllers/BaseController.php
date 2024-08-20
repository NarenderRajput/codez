<?php

namespace src\controllers;

class BaseController
{

    public $db;

    public function __construct()
    {
        $this->db = $this->connectDB();
    }

    public function connectDB()
    {
        $db_config = include_once __DIR__.'/../../config/database.php';
        
        $servername = $db_config['HOST_NAME'];
        $username = $db_config['USER_NAME'];
        $password = $db_config['PASSWORD'];
        $database = $db_config['DB_NAME'];

        // Create connection
        $conn = new \mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //echo "Connected successfully";

        return $conn;
    }

    public function __destruct()
    {
        $this->db->close();
    }
}
