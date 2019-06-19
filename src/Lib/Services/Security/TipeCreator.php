<?php

namespace Security\Lib\Services\Security;

use Security\Lib\Services\Security\InterfaceCreator;
use Security\Em;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validation;

class TipeCreator implements InterfaceCreator
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
        $contraints = new Assert\Collection([
            'nama' => [
                new Assert\NotNull(),
                new Assert\NotBlank(),
                new Assert\Length([
                    'min' => 2,
                    'max' => 25,
                    'minMessage' => 'Your first name must be at least {{ limit }} characters long',
                    'maxMessage' => 'Your first name cannot be longer than {{ limit }} characters'
                        ])
            ]
        ]);

        $errors = $this->validator->validate($data, $contraints);
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
        $tipe = new \Security\Entity\Tipe();
        $tipe->setNama($data["nama"]);
        try {
            $this->em->persist($tipe);
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

