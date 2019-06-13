<?php

namespace Security\Lib\Services;

use Security\Em;

class AkunRemover
{

    public function remove($id)
    {
        $em = Em::getEM();
        try {
            $qb = $em->createQueryBuilder();
            $q = $qb->update('Security\Entity\Akun', 'a')
                    ->set('a.delete_at', '?1')
                    ->where('a.id = ?2')
                    ->setParameter(1, date("Y-m-d H:i:s"))
                    ->setParameter(2, $id)
                    ->getQuery();
            $q->execute();
            
            return true;
        } catch (\Doctrine\ORM\Query\QueryException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function unRemove($id)
    {
        $em = Em::getEM();
        try {
            $qb = $em->createQueryBuilder();
            $q = $qb->update('Security\Entity\Akun', 'a')
                    ->set('a.delete_at', '?1')
                    ->where('a.id = ?2')
                    ->setParameter(1, null)
                    ->setParameter(2, $id)
                    ->getQuery();
            $q->execute();
            
            return true;
        } catch (\Doctrine\ORM\Query\QueryException $e) {
            echo $e->getMessage();
            return false;
        }
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

