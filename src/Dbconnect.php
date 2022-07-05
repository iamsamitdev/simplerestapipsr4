<?php
namespace Samit\Simplerestapipsr4;
use PDO;

class Dbconnect {

    // Properties (ตัวแปรที่อยู่ในคลาส)
    // For MySQL
    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "1234";
    private $db_name = "simplerestdb";
    private $db_port = 3306;

    // For MS SQL Server
    // private $db_host = "SamitZ50";
    // private $db_user = "sa";
    // private $db_pass = "377040";
    // private $db_name = "Stockdb";
    // private $db_port = 1433;

    // Method (ฟังก์ชันที่อยู่ในคลาส)
    public function getConnect(){

        // MySQL Data Source Name
        $dsn = "mysql:host=".$this->db_host.";port=".$this->db_port.";dbname=".$this->db_name;

        // MS SQL Server Data Source Name
        // $dsn = "sqlsrv:Server=".$this->db_host.",".$this->db_port.";Database=".$this->db_name;
        // Example
        // $dsn = "sqlsrv:Server=localhost,1433;Database=simplerestdb";

        // PostgreSQL Data Source Name
        // $dsn = "pgsql:host=".$this->db_host.";port=".$this->db_port.";dbname=".$this->db_name;
        // Example
        // $dsn = "pgsql:host=localhost;port=5432;dbname=simplerestdb";

        try {
            $conn = new PDO(
                $dsn,
                $this->db_user, 
                $this->db_pass
            );
            $conn->exec("SET NAMES 'utf8'");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            echo "Connect database success";
            return $conn;

        } catch(PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }

    }
}

// การสร้าง object จาก class Dbconnect
$connect = new Dbconnect;
$connect->getConnect();