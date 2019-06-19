<?php

namespace Security\Lib\Services\Security;

use Security\Em;

class AkunUpdater
{

    protected $em;

    public function __construct()
    {
        $this->em = Em::getEM();
    }

    /**
     * example param
     * $data = [
     * "id_akun" => "bot", //id yg sudah ada
     * "deskripsi_akun" => "test data", //data baru
     * "delete_at" => null //data baru etc
     * ];
     * @param array $data
     * @return type
     */
    public function update(array $data)
    {
        $errors = $this->validate($data);
        if (count($errors) === 0) {
            $akun = $this->em->find('\Security\Entity\Akun', $data['id_akun']);

            if (isset($data['deskripsi_akun'])) {
                $akun->setDeskripsi_akun($data['deskripsi_akun']);
            }

            if (array_key_exists('delete_at', $data)) {
                if ($data['delete_at'] !== null) {
                    $akun->setDelete_at(new \DateTime($data['delete_at']));
                } else {
                    $akun->setDelete_at(null);
                }
            }

            if (isset($data['create_at'])) {
                $akun->setCreate_at(new \DateTime($data['create_at']));
            }

            if (isset($data['last_update'])) {
                $akun->setLast_update(new \DateTime($data['last_update']));
            }

            if (isset($data['create_by'])) {
                $akun->setCreate_by($data['create_by']);
            }

            $this->em->persist($akun);
            $this->em->flush();

            return $akun->getArrayResult();
        }
        return $errors;
    }

    public function validate(array $data)
    {
        if (!isset($data['id_akun'])) {
            return [
                "error" => [
                    "id_akun tidak boleh kosong."
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

