<?php

namespace Security\Lib\Services;

use Security\Lib\Services\Security\PerangkatCreator;
use Security\Lib\Services\Security\AkunCreator;
use Security\Lib\Services\Security\AkunPerangkatCreator;
use Security\Lib\Services\Security\TipeCreator;

class SecurityCreator
{

    protected $perangkatCreator;
    protected $akunCreator;
    protected $tipeCreator;
    protected $akunDanPerangkatCreator;

    public function __construct()
    {
        $this->perangkatCreator =  new PerangkatCreator();
        $this->akunCreator = new AkunCreator();
        $this->tipeCreator =  new TipeCreator();
        $this->akunDanPerangkatCreator =  new AkunPerangkatCreator();
    }

    /**
     * 
     * @param array $data
     * @return type
     */
    public function addPerangkat(array $data)
    {
        $result = $this->perangkatCreator->create($data);
        return $result;
    }

    /**
     * 
     * @param array $data
     * @return type
     */
    public function addAkun(array $data)
    {
        $result = $this->akunCreator->create($data);
        return $result;
    }

    /**
     * 
     * @param array $data
     * @return type
     */
    public function addTipe(array $data)
    {
        $result = $this->tipeCreator->create($data);
        return $result;
    }

    /**
     * 
     * @param array $data
     * @return type
     */
    public function addAkunDanPerangkat(array $data)
    {
        $result = $this->akunDanPerangkatCreator->create($data);
        return $result;
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

