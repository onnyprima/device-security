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
        try {
            $qb = $this->em->createQueryBuilder();
            $q = $qb->select('p', 't')
                    ->from('\Security\Entity\Perangkat', 'p')
                    ->leftJoin('\Security\Entity\Tipe', 't', \Doctrine\ORM\Query\Expr\Join::WITH, 'p.tipe_perangkat = t.id')
                    ->where('p.id = :id')
                    ->setParameter('id', $id)
                    ->getQuery()
                    ->getScalarResult();

            if (count($q) > 0) {
                $data = $q[0];
                return [
                    "id_perangkat" => $data["p_id"],
                    "tipe_perangkat" => $data["t_nama"],
                    "deskripsi_lokasi_perangkat" => $data['p_deskripsi_lokasi_perangkat'],
                    "deskripsi_perangkat" => $data['p_deskripsi_perangkat'],
                    "delete_at" => $data['p_delete_at'] === null ? $data['p_delete_at'] : $data['p_delete_at']->format('Y-m-d H:i:s'),
                    "create_at" => $data['p_create_at']->format('Y-m-d H:i:s'),
                    "last_update" => $data['p_last_update']->format('Y-m-d H:i:s'),
                    "create_by" => $data['p_create_by']
                ];
            }
            return [];
        } catch (Doctrine\ORM\Query\QueryException $e) {
            echo $e->getMessages();
        }
    }

    /**
     * default perpage 25 data
     * @param type $offset
     * @param type $limit
     * @return array
     */
    public function getListPerangkat($offset = 0, $limit = 25)
    {
        try {
            $qb = $this->em->createQueryBuilder();
            $q = $qb->select('p', 't')
                    ->from('\Security\Entity\Perangkat', 'p')
                    ->leftJoin('\Security\Entity\Tipe', 't', \Doctrine\ORM\Query\Expr\Join::WITH, 'p.tipe_perangkat = t.id')
                    ->setFirstResult($offset)
                    ->setMaxResults($limit)
                    ->getQuery()
                    ->getScalarResult();
            if (count($q) > 0) {
                $data = [];
                foreach ($q as $key => $perangkat) {
                    array_push($data, [
                        "id_perangkat" => $perangkat["p_id"],
                        "tipe_perangkat" => $perangkat["t_nama"],
                        "deskripsi_lokasi_perangkat" => $perangkat['p_deskripsi_lokasi_perangkat'],
                        "deskripsi_perangkat" => $perangkat['p_deskripsi_perangkat'],
                        "delete_at" => $perangkat['p_delete_at'] === null ? $perangkat['p_delete_at'] : $perangkat['p_delete_at']->format('Y-m-d H:i:s'),
                        "create_at" => $perangkat['p_create_at']->format('Y-m-d H:i:s'),
                        "last_update" => $perangkat['p_last_update']->format('Y-m-d H:i:s'),
                        "create_by" => $perangkat['p_create_by']
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

