<?php

namespace Security\Lib\Services;

use Security\Lib\Services\Security\PerangkatUpdater;
use Security\Lib\Services\Security\AkunUpdater;
use Security\Lib\Services\Security\AkunDanPerangkatUpdater;
use Security\Lib\Services\Security\TipeUpdater;

class SecurityUpdater
{

    protected $perangkatUpdater;
    protected $akunUpdater;
    protected $akunDanPerangkatUpdater;
    protected $tipeUpdater;

    public function __construct()
    {
        $this->perangkatUpdater = new PerangkatUpdater();
        $this->akunUpdater = new AkunUpdater();
        $this->akunDanPerangkatUpdater = new AkunDanPerangkatUpdater();
        $this->tipeUpdater = new TipeUpdater();
    }

    public function updatePerangkat(array $newdata)
    {
        $result = $this->perangkatUpdater->update($newdata);
        return $result;
    }

    public function updateAkun(array $newdata)
    {
        $result = $this->akunUpdater->update($newdata);
        return $result;
    }

    public function updateTipe(array $newdata)
    {
        $result = $this->tipeUpdater->update($newdata);
        return $result;
    }
    
    public function updateAkunDanPerangkat(array $newdata)
    {
        $result = $this->akunDanPerangkatUpdater->update($newdata);
        return $result;
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

