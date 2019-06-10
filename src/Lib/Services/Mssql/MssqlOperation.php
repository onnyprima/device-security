<?php

namespace Security\Lib\Services\Mssql;

use Security\Lib\Services\OperationInterface;
use Security\Config\Connection;
use Security\Lib\Services\Mssql\MssqlQuery;
use Security\Lib\Services\Model\Perangkat;
use Security\Lib\Services\Model\Akun;

class MssqlOperation implements OperationInterface
{
    public $conn;
    
    public function __construct()
    {
        $connection = new Connection();
        $this->conn = $connection->pdoSqlSrvConn();
    }
    
    public function closeConnection()
    {
        $this->conn = null;
    }

    public function addAkun(Akun $akun)
    {
        $query = MssqlQuery::insertAkunQuery();
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

    public function addPerangkat(Perangkat $perangkat)
    {
        $query = MssqlQuery::insertPerangkatQuery();
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

    public function addPerangkatDanAkun(Perangkat $p, Akun $a)
    {
        $query = MssqlQuery::insertPerangkatDanAkun();
        $param = [
            "NOMOR" => $p->getNomor(),
            "ID_AKUN" => $a->getIdAkun()
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

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

