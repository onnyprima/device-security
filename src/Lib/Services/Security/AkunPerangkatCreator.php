<?php

namespace Security\Lib\Services\Security;

use Security\Lib\Services\Security\InterfaceCreator;
use Symfony\Component\Validator\Validation;
use Security\Em;
use Symfony\Component\Validator\Constraints as Assert;
use Security\Entity\AkunDanPerangkat;

class AkunPerangkatCreator implements InterfaceCreator
{

    protected $em;
    protected $validator;

    public function __construct()
    {
        $this->em = Em::getEM();
        $this->validator = Validation::createValidatorBuilder()
                ->addMethodMapping('loadValidatorMetadata')
                ->getValidator();
    }

    public function create(array $data)
    {
        $constraints = new Assert\Collection([
            'id_akun' => [
                new Assert\NotNull(),
                new Assert\NotBlank()
            ],
            'id_perangkat' => [
                new Assert\NotNull(),
                new Assert\NotBlank()
            ],
            'delete_at' => [],
            'create_at' => [
                new Assert\NotBlank(),
                new Assert\NotNull(),
                new Assert\DateTime()
            ],
            'last_update' => [],
            'create_by' => [],
        ]);

        $errors = $this->validator->validate($data, $constraints);
        if (count($errors) > 0) {
            return $this->getErrorsAsArray($errors);
        } else {
            $res = $this->save($data);
            return $res ? $res : false;
        }
    }

    public function getErrorsAsArray($errors)
    {
        $arrayError = [
            "error" => []
        ];
        foreach ($errors as $error) {
            array_push($arrayError["error"], [
                $error->getPropertyPath() => $error->getMessage()
            ]);
        }
        return $arrayError;
    }

    public function save($data)
    {
        try {
            $perangkat = $this->em->find('\Security\Entity\Perangkat', $data['id_perangkat']);
            $akun = $this->em->find('\Security\Entity\Akun', $data['id_akun']);

            $ap = new AkunDanPerangkat();
            $ap->setId_akun($akun);
            $ap->setId_perangkat($perangkat);
            $ap->setDelete_at($data['delete_at'] === null ? $data['delete_at'] : new \DateTime($data['delete_at']));
            $ap->setCreate_at($data['create_at'] === null ? $data['create_at'] : new \DateTime($data['create_at']));
            $ap->setLast_update($data['last_update'] === null ? $data['last_update'] : new \DateTime($data['last_update']));
            $ap->setCreate_by($data['create_by']);

            $this->em->persist($ap);
            $this->em->flush();
            
            return true;
        } catch (\Exception $exc) {
            exit();
            echo $exc->getMessage();
        }
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

