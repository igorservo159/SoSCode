<?php

class Response {
    private $id;
    private $id_owner;
    private $id_ticket;
    private $status;
    private $response;

    public function __get($attribute){
        return $this->$attribute;
    }

    public function __set($attribute, $value){
        $this->$attribute = $value;
        return $this;
    }
    
}

?>