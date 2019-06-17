<?php

namespace Security\Lib\Services\Security;

use Security\Em;

class PerangkatReader
{

    protected $em;

    public function __construct()
    {
        $this->em = Em::getEM();
    }

    public function getPerangkatById($id)
    {
        $perangkat = $this->em->find('\Security\Entity\Perangkat', $id);
        if ($perangkat !== null) {
            return [
                "id_perangkat" => $perangkat->getId(),
                "deskripsi_perangkat" => $perangkat->getDeskripsi_perangkat(),
                "delete_at" => $perangkat->getDelete_at(),
                "create_at" => $perangkat->getCreate_at(),
                "last_update" => $perangkat->getLast_update(),
                "create_by" => $perangkat->getCreate_by()
            ];
        }
        return [];
    }

    public function getListPerangkat()
    {
        try {
            $qb = $this->em->createQueryBuilder();
            $q = $qb->select('p')
                    ->from('\Security\Entity\Perangkat', 'p')
                    ->orderBy('p.id', 'ASC')
                    ->getQuery();
            $result = $q->getResult();

            if (count($q->getArrayResult()) > 0) {
                $data = [];
                foreach ($result as $key => $perangkat) {
                    array_push($data, [
                        "id_perangkat" => $perangkat->getId(),
                        "deskripsi_perangkat" => $perangkat->getDeskripsi_perangkat(),
                        "delete_at" => $perangkat->getDelete_at(),
                        "create_at" => $perangkat->getCreate_at(),
                        "last_update" => $perangkat->getLast_update(),
                        "create_by" => $perangkat->getCreate_by()
                    ]);
                }
                return $data;
            }
            return [];
        } catch (\Doctrine\ORM\Query\QueryException $exc) {
            echo $exc->getMessage();
        }
    }

    /**
     * jika ditemukan perangkat dan cek status
     * @param type $id
     * @return boolean
     */
    public function isPerangkatDeleted($id)
    {
        $result = $this->getPerangkatById($id);
        if ($result["delete_at"] === null) {
            return true;
        }
        return false;
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

