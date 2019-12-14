<?php

use function PHPSTORM_META\elementType;

class Database
{
    private $conn;

    public function connect()
    {
        include_once("constants.php");
        $this->conn = new mysqli(HOST, USER, PASS, DB);
        if ($this->conn) {
            //echo "CONNECTED SUCCESSFULLY";

            return $this->conn;
        }
        return "DATABASE CONNECTION ERR";
    }
}

$db = new Database();
$db->connect();
