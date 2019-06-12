<?php

namespace Security\Lib\Services\Security;

use Security\Lib\Services\Security\InterfaceCreator;
use Security\Em;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validation;
use Security\Entity\Session;

class SessionCreator implements InterfaceCreator
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
            'token' => [
                new Assert\NotNull(),
                new Assert\NotBlank()
            ],
            'id_perangkat_dan_akun' => [
                new Assert\NotNull(),
                new Assert\NotBlank()
            ],
            'expired' => [
                new Assert\NotNull(),
                new Assert\NotBlank(),
                new Assert\DateTime()
            ],
            'login_at' => [],
            'logout_at' => []
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
        $session = new Session();
        $idPerangkatDanAkun = $this->em->find(
                '\Security\Entity\AkunDanPerangkat', $data['id_perangkat_dan_akun']
        );

        $expired = new \DateTime($data['expired']);
        $login_at = new \DateTime($data['login_at']);
        $logout_at = null;

        $session->setId($data['token']);
        $session->setIdPerangkatDanAkun($idPerangkatDanAkun);
        $session->setExpired($expired);
        $session->setLogin_at($login_at);
        $session->setLogout_at($logout_at);

        try {
            $this->em->persist($session);
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

