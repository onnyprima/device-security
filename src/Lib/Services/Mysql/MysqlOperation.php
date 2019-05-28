<?php

namespace Security\Lib\Services\Mysql;

use Security\Config\Connection;
use Security\Lib\Services\OperationInterface;
use Security\Lib\Services\Mysql\MysqlQuery;
use Security\Lib\Services\Model\Perangkat;

class MysqlOperation implements OperationInterface {

    public $conn;

    public function __construct()
    {
        $connection = new Connection();
        $this->conn = $connection->getConn();
    }

    public function addPerangkat(Perangkat $perangkat)
    {
        $query = MysqlQuery::insertQuery();
        $stmt = $this->conn->prepare($query);
        $stmt->execute($perangkat->getAsArray());
        
    }

    public function addAkun()
    {
        
    }

    public function addPerangkatDanAkun()
    {
        
    }

    public function addSession()
    {
        
    }

    public function getAkunById()
    {
        
    }

    public function getPerangkatById()
    {
        
    }

    public function getPerangkatDanAkunById()
    {
        
    }

    public function getSessionById()
    {
        
    }

    public function isDeletedAkun()
    {
        
    }

    public function isDeletedPerangkat()
    {
        
    }

    public function isDeletedPerangkatDanAkun()
    {
        
    }

    public function isDeletedSession()
    {
        
    }

    public function isExistAkun()
    {
        
    }

    public function isExistPerangkat()
    {
        
    }

    public function isExistPerangkatDanAkun()
    {
        
    }

    public function isExistSession()
    {
        
    }

    public function removeAkun()
    {
        
    }

    public function removePerangkat()
    {
        
    }

    public function removePerangkatDanAkun()
    {
        
    }

    public function removeSession()
    {
        
    }

    public function updateAkun()
    {
        
    }

    public function updatePerangkat()
    {
        
    }

    public function updatePerangkatDanAkun()
    {
        
    }

    public function updateSession()
    {
        
    }

}