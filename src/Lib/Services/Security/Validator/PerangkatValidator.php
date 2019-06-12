<?php
namespace Security\Lib\Services\Validator;

use Symfony\Component\Validator\Mapping\ClassMetadata; 
use Symfony\Component\Validator\Constraints as Assert;

class PerangkatValidator {
    
    public $id_perangkat;
    public $deskripsi_perangkat;
    public $delete_at;
    public $create_at;
    public $last_update;
    public $create_by;
    
    static public function loadValidatorMetadata(ClassMetadata $metadata){
        $metadata->addPropertyConstraint('id_perangkat', new Assert\NotBlank());
        $metadata->addPropertyConstraint('id_perangkat', new Assert\NotNull());
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

