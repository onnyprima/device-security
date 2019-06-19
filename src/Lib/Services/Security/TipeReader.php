<?php

namespace Security\Lib\Services\Security;

use Security\Em;

class TipeReader
{

    protected $em;

    public function __construct()
    {
        $this->em = Em::getEM();
    }

    public function getTipeById($id)
    {
        $tipe = $this->em->find('\Security\Entity\Tipe', $id);

        if (count($tipe) > 0) {
            return [
                'id_tipe' => $tipe->getId,
                'nama' => $tipe->getNama
            ];
        }
        return [];
    }

    public function getListTipe($offset = 0, $limit = 25)
    {
        try {
            $qb = $this->em->createQueryBuilder();
            $q = $qb->select('t')
                    ->from('\Security\Entity\Tipe', 't')
                    ->setFirstResult($offset)
                    ->setMaxResults($limit)
                    ->getQuery();
            $result = $q->getArrayResult();
            return $result;
        } catch (Doctrine\ORM\Query\QueryException $e) {
            echo $e->getMessage();
        }
        
        return [];
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

