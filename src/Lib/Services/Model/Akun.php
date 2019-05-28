<?php
namespace Security\Lib\Services\Model;

class Akun {
    
     protected $idAkun;
     protected $deskripsi;
     protected $deleteAt;
     protected $createAt;
     protected $lastUpdate;
     protected $createBy;
     
     function getIdAkun()
     {
         return $this->idAkun;
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

     function setIdAkun($idAkun)
     {
         $this->idAkun = $idAkun;
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
             "ID_AKUN" => $this->getIdAkun(),
             "AKUN_DESKRIPSI" => $this->getDeskripsi(),
             "AKUN_DELETE_AT" => $this->getDeleteAt(),
             "AKUN_CREATE_AT" => $this->getCreateAt(),
             "AKUN_LAST_UPDATE" => $this->getLastUpdate(),
             "AKUN_CREATE_BY" => $this->getCreateBy()
         ];
     }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

