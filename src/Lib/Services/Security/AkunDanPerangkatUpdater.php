<?php

namespace Security\Lib\Services\Security;

use Security\Em;

class AkunDanPerangkatUpdater
{

    protected $em;

    public function __construct()
    {
        $this->em = Em::getEM();
    }

    public function update(array $data)
    {
        $errors = $this->validate($data);
        if (count($errors) === 0) {
            $akunDanPerangkat = $this->em->find(
                    '\Security\Entity\AkunDanPerangkat', $data['id_perangkat_dan_akun']
            );

            if ($akunDanPerangkat === null) {
                return [
                    "error" => ["Data tidak ditemukan."]
                ];
            }

            if (isset($data['id_perangkat'])) {
                $perangkat = $this->em->find('\Security\Entity\Perangkat', $data['id_perangkat']);
                $akunDanPerangkat->setId_perangkat($perangkat);
            }

            if (isset($data['id_akun'])) {
                $akun = $this->em->find('\Security\Entity\Akun', $data['id_akun']);
                $akunDanPerangkat->setId_akun($akun);
            }

            if (array_key_exists('delete_at', $data)) {
                if ($data['delete_at'] !== null) {
                    $akunDanPerangkat->setDelete_at(new \DateTime($data['delete_at']));
                } else {
                    $akunDanPerangkat->setDelete_at(null);
                }
            }

            if (isset($data['create_at'])) {
                $akunDanPerangkat->setCreate_at(new \DateTime($data['create_at']));
            }

            if (isset($data['last_update'])) {
                $akunDanPerangkat->setLast_update(new \DateTime($data['last_update']));
            }

            if (isset($data['create_by'])) {
                $akunDanPerangkat->setCreate_by($data['create_by']);
            }

            $this->em->persist($akunDanPerangkat);
            $this->em->flush();
            return true;
        }
        return $errors;
    }

    public function validate($data)
    {
        if (!isset($data['id_perangkat_dan_akun'])) {
            return [
                "error" => [
                    "id_perangkat_dan_akun tidak boleh kosong."
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

