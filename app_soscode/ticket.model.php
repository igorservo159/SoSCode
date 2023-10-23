<?php

class Ticket {
    private $id;
    private $id_user;
    private $title;
    private $category;
    private $description;
    private $registered_date;

    public function __get($attribute){
        return $this->$attribute;
    }

    public function __set($attribute, $value){
        $this->$attribute = $value;
    }
}

?>