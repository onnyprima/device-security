<?php
namespace Security\Config;

use \PDO;
include 'Database.php';

class Connection
{
    protected $servername;
    protected $username;
    protected $password;
    protected $conn;

    public function __construct()
    {
        $db = $GLOBALS['db'];

        $this->servername = $db['default']['hostname'];
        $this->username = $db['default']['username'];
        $this->password = $db['default']['password'];
        $this->database = $db['default']['database'];
    }

    public function pdoMysqlConn()
    {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getConn()
    {
        return $this->pdoMysqlConn();
    }
}
