<?php

namespace Security\Lib\Services\Model;

class PerangkatDanAkun
{

    protected $id;
    protected $nomor;
    protected $idAkun;

    function getId()
    {
        return $this->id;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function getNomor()
    {
        return $this->nomor;
    }

    function getIdAkun()
    {
        return $this->idAkun;
    }

    function setNomor($nomor)
    {
        $this->nomor = $nomor;
    }

    function setIdAkun($idAkun)
    {
        $this->idAkun = $idAkun;
    }

    function getAsArray()
    {
        return [
            "ID_PERANGKAT_DAN_AKUN" => $this->getId(),
            "NOMOR" => $this->getNomor(),
            "ID_AKUN" => $this->getIdAkun()
        ];
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

