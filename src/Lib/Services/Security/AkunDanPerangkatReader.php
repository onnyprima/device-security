<?php

namespace Security\Lib\Services\Security;

use Security\Em;

class AkunDanPerangkatReader
{

    protected $em;

    public function __construct()
    {
        $this->em = Em::getEM();
    }

    public function getAkunDanPerangkat($id_akun, $id_perangkat)
    {
        try {
            $qb = $this->em->createQueryBuilder();
            $q = $qb->select('ap')
                    ->from('\Security\Entity\AkunDanPerangkat', 'ap')
                    ->where('ap.id_akun = ?1')
                    ->andWhere('ap.id_perangkat = ?2')
                    ->setParameters([
                        1 => $id_akun,
                        2 => $id_perangkat
                    ])
                    ->getQuery();

            $result = $q->getScalarResult();
            
            if (count($q->getArrayResult()) > 0) {
                $data = [];
                foreach ($result as $key => $akun) {
                    array_push($data, [
                        "id_perangkat_dan_akun" => $akun["ap_id"],
                        "id_perangkat" => $id_perangkat,
                        "id_akun" => $id_akun,
                        "delete_at" => $akun["ap_delete_at"] === NULL ? $akun["ap_delete_at"] : $akun["ap_delete_at"]->format('Y-m-d H:i:s'),
                        "create_at" => $akun["ap_create_at"] === NULL ? $akun["ap_create_at"] : $akun["ap_create_at"]->format('Y-m-d H:i:s'),
                        "last_update" => $akun["ap_last_update"] === NULL ? $akun["ap_last_update"] : $akun["ap_last_update"]->format('Y-m-d H:i:s'),
                        "create_by" => $akun["ap_create_by"]
                    ]);
                }
                return $data[0];
            }
            return [];
        } catch (\Doctrine\ORM\Query\QueryException $exc) {
            echo $exc->getMessage();
        }
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

