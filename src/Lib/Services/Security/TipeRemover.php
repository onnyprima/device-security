<?php

namespace Security\Lib\Services\Security;

use Security\Em;

class TipeRemover
{

    protected $em;

    public function __construct()
    {
        $this->em = Em::getEM();
    }

    public function remove($id)
    {
        try {
            $tipe = $this->em->find('\Security\Entity\Tipe', $id);
            
            $this->em->remove($tipe);
            $this->em->flush();
            return true;
        } catch (Doctrine\ORM\Query\QueryException $e) {
            echo $e->getMessage();
        }
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

