<?php
namespace Security\Lib\Services\Security;

class ErrorMessage {
    
    public $messages = [
        "error" => []
    ];
    
    public function addMessages(String $data)
    {
        array_push($this->messages["error"], $data);
        return $this;
    }
    
    public function getMessages()
    {
        return $this->messages;
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

