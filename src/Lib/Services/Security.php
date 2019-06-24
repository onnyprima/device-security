<?php

namespace Security\Lib\Services;

use Security\Lib\Services\Security\PerangkatReader;
use Security\Lib\Services\Security\AkunReader;
use Security\Lib\Services\Security\AkunDanPerangkatReader;
use Security\Lib\Services\Security\ErrorMessage;

class Security
{

    protected $message;
    protected $perangkatReader;
    protected $akunReader;
    protected $akunDanPerangkatReader;

    /**
     * apakah perangkat terdaftar dan tidak dalam status deleted
     * @param type $id (mac address/ imei)
     */
    public function __construct()
    {
        $this->message = new ErrorMessage();
        $this->perangkatReader = new PerangkatReader();
        $this->akunReader = new AkunReader();
        $this->akunDanPerangkatReader = new AkunDanPerangkatReader();
    }

    /**
     * 
     * @param type $idPerangkat
     * @return boolean
     */
    public function isPerangkatAllowed($idPerangkat)
    {
        $isAvailable = $this->perangkatReader->getPerangkatById($idPerangkat);

        if (count($isAvailable) === 0) {
            $this->message->addMessages("Perangkat tidak terdaftar.");
            return $this->message->getMessages();
        }

        if ($isAvailable['delete_at'] !== null) {
            $this->message->addMessages("Perangkat telah dihapus.");
            return $this->message->getMessages();
        }
        return true;
    }

    /**
     * 
     * @param type $idAkun
     * @return boolean
     */
    public function isAkunAllowed($idAkun)
    {
        $isAvailable = $this->akunReader->getAkunById($idAkun);

        if (count($isAvailable) === 0) {
            $this->message->addMessages("Akun tidak terdaftar.");
            return $this->message->getMessages();
        }

        if ($isAvailable['delete_at'] !== null) {
            $this->message->addMessages("Akun telah dihapus.");
            return $this->message->getMessages();
        }
        return true;
    }

    /**
     * 
     * @param type $idAkun
     * @param type $idPerangkat
     * @return boolean
     */
    public function isAkunDanPerangkatAllowed($idAkun, $idPerangkat)
    {
        $isAvailable = $this->akunDanPerangkatReader->getAkunDanPerangkat($idPerangkat, $idAkun);

        if (count($isAvailable) === 0) {
            $this->message->addMessages("Akun dan Perangkat tidak terdaftar.");
            return $this->message->getMessages();
        }

        if ($isAvailable['delete_at'] !== null) {
            $this->message->addMessages("Akun dan Perangkat telah dihapus.");
            return $this->message->getMessages();
        }
        return true;
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

