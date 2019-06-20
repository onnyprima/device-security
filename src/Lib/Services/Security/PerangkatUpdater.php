<?php

namespace Security\Lib\Services\Security;

use Security\Em;

class PerangkatUpdater
{

    protected $em;

    public function __construct()
    {
        $this->em = Em::getEM();
    }

    public function update(array $data)
    {
        $errors = $this->validate($data);
        if(count($errors) === 0){
            $perangkat = $this->em->find('\Security\Entity\Perangkat', $data['id_perangkat']);
            
            if(isset($data['tipe_perangkat'])){
                $tipe = $this->em->find('\Security\Entity\Tipe', $data['tipe_perangkat']);
                if(count($tipe) === 0){
                    return [
                        "error" => [
                            "Tipe tidak ditemukan."
                        ]
                    ];
                }
                $perangkat->setTipe_perangkat($tipe);
            }
            
            if(isset($data['deskripsi_perangkat'])){
                $perangkat->setDeskripsi_perangkat($data['deskripsi_perangkat']);
            }
            
            if(isset($data['deskripsi_lokasi_perangkat'])){
                $perangkat->setDeskripsi_perangkat($data['deskripsi_lokasi_perangkat']);
            }
            
            if (array_key_exists('delete_at', $data)) {
                if ($data['delete_at'] !== null) {
                    $perangkat->setDelete_at(new \DateTime($data['delete_at']));
                } else {
                    $perangkat->setDelete_at(null);
                }
            }

            if (isset($data['create_at'])) {
                $perangkat->setCreate_at(new \DateTime($data['create_at']));
            }

            if (isset($data['last_update'])) {
                $perangkat->setLast_update(new \DateTime($data['last_update']));
            }

            if (isset($data['create_by'])) {
                $perangkat->setCreate_by($data['create_by']);
            }
            
            $this->em->persist($perangkat);
            $this->em->flush();
            
            return true;//$perangkat->getArrayResult();
        }
        return $errors;
    }
    
    public function validate($data)
    {
        if (!isset($data['id_perangkat'])) {
            return [
                "error" => [
                    "id_perangkat tidak boleh kosong."
                ]
            ];
        }
        return [];
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

