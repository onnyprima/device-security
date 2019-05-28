<?php

namespace Security\Lib\Services;

use Security\Lib\Services\Model\Perangkat;

interface OperationInterface {

    public function getPerangkatById();
    public function getAkunById();
    public function getPerangkatDanAkunById();
    public function getSessionById();

    public function addPerangkat(Perangkat $perangkat);
    public function addAkun();
    public function addPerangkatDanAkun();
    public function addSession();

    public function updatePerangkat();
    public function updateAkun();
    public function updatePerangkatDanAkun();
    public function updateSession();
    
    public function removePerangkat();
    public function removeAkun();
    public function removePerangkatDanAkun();
    public function removeSession();

    public function isExistPerangkat();
    public function isExistAkun();
    public function isExistPerangkatDanAkun();
    public function isExistSession();

    public function isDeletedPerangkat();
    public function isDeletedAkun();
    public function isDeletedPerangkatDanAkun();
    public function isDeletedSession();
}