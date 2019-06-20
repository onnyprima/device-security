<?php

namespace Security\Lib\Services\Security;

use Security\Em;

class AkunReader
{

    protected $em;

    public function __construct()
    {
        $this->em = Em::getEM();
    }

    public function getAkunById($id)
    {
        $akun = $this->em->find('\Security\Entity\Akun', $id);
        if ($akun !== null) {
            return [
                "id_akun" => $akun->getId(),
                "deskripsi_akun" => $akun->getDeskripsi_akun(),
                "delete_at" => $akun->getDelete_at(),
                "create_at" => $akun->getCreate_at(),
                "last_update" => $akun->getLast_update(),
                "create_by" => $akun->getCreate_by()
            ];
        }
        return [];
    }

    public function getListAkun($offset = 0, $limit = 25)
    {
        try {
            $qb = $this->em->createQueryBuilder();
            $q = $qb->select('p')
                    ->from('\Security\Entity\Akun', 'p')
                    ->orderBy('p.id', 'ASC')
                    ->setFirstResult($offset)
                    ->setMaxResults($limit)
                    ->getQuery();
            $result = $q->getResult();

            if (count($q->getArrayResult()) > 0) {
                $data = [];
                foreach ($result as $key => $akun) {
                    array_push($data, [
                        "id_perangkat" => $akun->getId(),
                        "deskripsi_akun" => $akun->getDeskripsi_akun(),
                        "delete_at" => $akun->getDelete_at(),
                        "create_at" => $akun->getCreate_at(),
                        "last_update" => $akun->getLast_update(),
                        "create_by" => $akun->getCreate_by()
                    ]);
                }
                return $data;
            }
            return [];
        } catch (\Doctrine\ORM\Query\QueryException $exc) {
            echo $exc->getMessage();
        }
    }

    public function isPerangkatDeleted($id)
    {
        $result = $this->getAkunByIdById($id);
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

