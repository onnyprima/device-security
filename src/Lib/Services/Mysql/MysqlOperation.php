<?php

namespace Security\Lib\Services\Mysql;

use Security\Config\Connection;
use Security\Lib\Services\OperationInterface;
use Security\Lib\Services\Mysql\MysqlQuery;
use Security\Lib\Services\Model\Perangkat;
use Security\Lib\Services\Model\Akun;

class MysqlOperation implements OperationInterface
{

    public $conn;

    public function __construct()
    {
        $connection = new Connection();
        $this->conn = $connection->getConn();
    }

    public function closeConnection()
    {
        $this->conn = null;
    }

    public function addPerangkat(Perangkat $perangkat)
    {
        $query = MysqlQuery::insertPerangkatQuery();
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($perangkat->getAsArray());
        } catch (\PDOException $exc) {
            throw $exc;
        }

        $this->closeConnection();

        if ($stmt->rowCount() == 0) {
            return false;
        }
        return true;
    }

    public function addAkun(Akun $akun)
    {
        $query = MysqlQuery::insertAkunQuery();
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($akun->getAsArray());
        } catch (\PDOException $exc) {
            throw $exc;
        }
        $this->closeConnection();
        if ($stmt->rowCount() == 0) {
            return false;
        }
        return true;
    }

    public function addPerangkatDanAkun(Perangkat $perangkat, Akun $akun)
    {
        $query = MysqlQuery::insertPerangkatDanAkun();
        $param = [
            "NOMOR" => $perangkat->getNomor(),
            "ID_AKUN" => $akun->getIdAkun()
        ];
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($param);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $this->closeConnection();
        if ($stmt->rowCount() == 0) {
            return false;
        }
        return true;
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
