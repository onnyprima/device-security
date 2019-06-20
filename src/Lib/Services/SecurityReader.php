<?php

namespace Security\Lib\Services;

use Security\Lib\Services\Security\PerangkatReader;
use Security\Lib\Services\Security\AkunReader;
use Security\Lib\Services\Security\TipeReader;
use Security\Lib\Services\Security\AkunDanPerangkatReader;

class SecurityReader
{

    protected $perangkatReader;
    protected $akunReader;
    protected $tipeReader;
    protected $akunDanPerangkatReader;

    public function __construct()
    {
        $this->perangkatReader = new PerangkatReader();
        $this->akunReader = new AkunReader();
        $this->tipeReader = new TipeReader();
        $this->akunDanPerangkatReader = new AkunDanPerangkatReader();
    }

    public function getPerangkat($idPerangkat)
    {
        $result = $this->perangkatReader->getPerangkatById($idPerangkat);
        return $result;
    }

    public function getListPerangkat($offset = 0, $limit = 25)
    {
        $result = $this->perangkatReader->getListPerangkat($offset, $limit);
        return $result;
    }

    public function getAkun($id)
    {
        $result = $this->akunReader->getAkunById($id);
        return $result;
    }
    
    public function getListAkun($offset = 0, $limit = 25)
    {
        $result = $this->akunReader->getListAkun($offset, $limit);
        return $result;
    }
    
    public function getTipe($id)
    {
        $result = $this->tipeReader->getTipeById($id);
        return $result;
    }
    
    public function getListTipe($offset = 0, $limit = 25)
    {
        $result = $this->tipeReader->getListTipe($offset, $limit);
        return $result;
    }

    public function getAkunDanPerangkat($id_akun, $id_perangkat)
    {
        $result = $this->akunDanPerangkatReader->getAkunDanPerangkat($id_akun, $id_perangkat);
        return $result;
    }
    
    public function getListAkunDanPerangkat($offset = 0, $limit = 25)
    {
        $result = $this->akunDanPerangkatReader->getListAkunDanPerangkat($offset, $limit);
        return $result;
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

