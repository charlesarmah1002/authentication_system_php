<?php

class Config 
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "akatsuki";

    protected function connect() 
    {
        try {
        $dns = 'mysql:host='. $this->host.';dbname='.$this->db_name;
        
        $pdo = new PDO($dns, $this->username, $this->password);

        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

        return $pdo;
        } catch (PDOException $e) {
            // echo 'Connection Failed: ' . $e->getMessage(); 
        }
    }
}