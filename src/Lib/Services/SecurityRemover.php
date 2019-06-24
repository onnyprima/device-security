<?php

namespace Security\Lib\Services;

use Security\Lib\Services\Security\TipeReader;
use Security\Lib\Services\Security\AkunReader;
use Security\Lib\Services\Security\PerangkatReader;
use Security\Lib\Services\Security\AkunDanPerangkatReader;
use Security\Lib\Services\PerangkatRemover;
use Security\Lib\Services\AkunRemover;
use Security\Lib\Services\Security\TipeRemover;
use Security\Lib\Services\Security\AkunPerangkatRemover;

class SecurityRemover
{

    protected $pr;
    protected $ar;
    protected $ap;
    protected $tr;
    protected $perangkatRemover;
    protected $akunRemover;
    protected $tipeRemover;
    protected $akunDanPerangkatRemover;

    public function __construct()
    {
        $this->tr = new TipeReader();
        $this->ar = new AkunReader();
        $this->pr = new PerangkatReader();
        $this->ap =  new AkunDanPerangkatReader();
        $this->perangkatRemover = new PerangkatRemover();
        $this->akunRemover = new AkunRemover();
        $this->tipeRemover = new TipeRemover();
        $this->akunDanPerangkatRemover = new AkunPerangkatRemover();
    }

    /**
     * 
     * @param type $id
     * @return type
     */
    public function removePerangkat($id)
    {
        $pr =  $this->pr->getPerangkatById($id);
        if(count($pr) === 0){
            return [
                "error" => "Perangkat tidak ditemukan."
            ];
        }
        $result = $this->perangkatRemover->remove($id);
        return $result;
    }

    /**
     * 
     * @param type $id
     * @return type
     */
    public function removeAkun($id)
    {
        $ar = $this->ar->getAkunById($id);
        if(count($ar) === 0){
            return [
                "error" => "Akun tidak ditemukan."
            ];
        }
        $result = $this->akunRemover->remove($id);
        return $result;
    }

    /**
     * 
     * @param type $id
     * @return type
     */
    public function removeTipe($id)
    {
        $tr = $this->tr->getTipeById($id);
        if(count($tr) === 0){
            return [
                "error" => "Tipe tidak ditemukan."
            ];
        }
        $result = $this->tipeRemover->remove($id);
        if(!$result){
            return [
                "error" => "Tipe sudah terpakai tidak bisa dihapus."
            ]; 
        }
        return $result;
    }
    
    /**
     * 
     * @param type $idPerangkat
     * @param type $idAkun
     * @return type
     */
    public function removeAkunDanPerangkat($idPerangkat, $idAkun)
    {
        $ap = $this->ap->getAkunDanPerangkat($idAkun, $idPerangkat);
        if(count($ap) === 0){
            return [
                "error" => "Id perangkat dan akun tidak ditemukan."
            ];
        }
        $id = $ap['id_perangkat_dan_akun'];
        
        $result = $this->akunDanPerangkatRemover->remove($id);
        return $result;
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

