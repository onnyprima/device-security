<?php

namespace Security\Lib\Services\Security;

use Security\Lib\Services\Security\InterfaceCreator;
use Security\Lib\Services\Validator\PerangkatValidator;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;
use Security\Entity\Perangkat;
use Security\Em;

class PerangkatCreator implements InterfaceCreator
{

    protected $validatorPerangkat;
    protected $validator;
    protected $em;

    public function __construct()
    {
        $this->validatorPerangkat = new PerangkatValidator();
        $this->em = Em::getEM();
        $this->validator = Validation::createValidatorBuilder()
                ->addMethodMapping('loadValidatorMetadata')
                ->getValidator();
    }

    public function create(array $data)
    {
        $constraints = new Assert\Collection([
            'id_perangkat' => [
                new Assert\NotNull(),
                new Assert\NotBlank()
            ],
            'deskripsi_perangkat' => [],
            'delete_at' => [],
            'last_update' => [],
            'create_at' => [
                new Assert\NotBlank(),
                new Assert\NotNull(),
                new Assert\DateTime()
            ],
            'create_by' => []
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
        $perangkat = new Perangkat();
        $perangkat->setId($data['id_perangkat']);
        $perangkat->setDeskripsi_perangkat($data['deskripsi_perangkat']);
        $perangkat->setDelete_at($data['delete_at'] === null ? $data['delete_at'] : new \DateTime($data['delete_at']));
        $perangkat->setCreate_at($data['create_at'] === null ? $data['create_at'] : new \DateTime($data['create_at']));
        $perangkat->setLast_update($data['last_update'] === null ? $data['last_update'] : new \DateTime($data['last_update']));
        $perangkat->setCreate_by($data['create_by']);

        try {
            $this->em->persist($perangkat);
            $this->em->flush();
            return true;
        } catch (\Exception $exc) {
            echo $exc->getMessage();
        }
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

