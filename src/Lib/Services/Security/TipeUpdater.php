<?php

namespace Security\Lib\Services\Security;

use Security\Em;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validation;

class TipeUpdater
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

    public function update(array $data)
    {
        $constraints = new Assert\Collection([
            'id_tipe' => [
                new Assert\NotNull(),
                new Assert\NotBlank()
            ],
            'nama' => [
                new Assert\NotBlank(),
                new Assert\NotNull(),
                new Assert\Length([
                    'min' => 2,
                    'max' => 25
                        ])
            ]
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
        $tipe = $this->em->find('\Security\Entity\Tipe', $data['id_tipe']);
        $tipe->setNama($data['nama']);

        try {
            $this->em->persist($tipe);
            $this->em->flush();
            return true;
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

