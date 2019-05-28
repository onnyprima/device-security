<?php

namespace Security\Lib\Services\Model;

class Perangkat
{

    public $nomor;
    public $deskripsi;
    public $deleteAt;
    public $createAt;
    public $lastUpdate;
    public $createBy;

    function getNomor()
    {
        return $this->nomor;
    }

    function getDeskripsi()
    {
        return $this->deskripsi;
    }

    function getDeleteAt()
    {
        return $this->deleteAt;
    }

    function getCreateAt()
    {
        return $this->createAt;
    }

    function getLastUpdate()
    {
        return $this->lastUpdate;
    }

    function getCreateBy()
    {
        return $this->createBy;
    }

    function setNomor($nomor)
    {
        $this->nomor = $nomor;
    }

    function setDeskripsi($deskripsi)
    {
        $this->deskripsi = $deskripsi;
    }

    function setDeleteAt($deleteAt)
    {
        $this->deleteAt = $deleteAt;
    }

    function setCreateAt($createAt)
    {
        $this->createAt = $createAt;
    }

    function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;
    }

    function setCreateBy($createBy)
    {
        $this->createBy = $createBy;
    }
    
    function getAsArray()
    {
        return [
            "NOMOR" => $this->getNomor(),
            "DESKRIPSI_PERANGKAT" => $this->getDeskripsi(),
            "DELETE_AT" => $this->getDeleteAt(),
            "CREATE_AT" => $this->getCreateAt(),
            "LAST_UPDATE" => $this->getLastUpdate(),
            "CREATE_BY" => $this->getCreateBy()
        ];
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

