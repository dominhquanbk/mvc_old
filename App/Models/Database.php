<?php

class Database
{
    private $servername;
    private $username;
    private $password;
    private $database;
    public $conn;

    public function __construct($servername, $username, $password, $database)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function connect()
    {
        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    public function Query($sql)
    {

        return  mysqli_query($this->conn, $sql);
    }
    public function FetchAll($sql)
    {

        return mysqli_fetch_all(mysqli_query($this->conn, $sql), MYSQLI_ASSOC);
    }


    public function selectAllInTable($tablename)
    {   
        $sql = "SELECT * FROM $tablename";
        return mysqli_fetch_all(mysqli_query($this->conn, $sql), MYSQLI_ASSOC);
    }
    


    public function close()
    {
        $this->conn->close();
    }
}
