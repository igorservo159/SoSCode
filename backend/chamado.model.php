<?php

class Chamado {
    private $id;
    private $id_user;
    private $title;
    private $categoria;
    private $descricao;
    private $registered_date;

    public function __get($attribute){
        return $this->attribute;
    }

    public function __set($attribute, $value){
        $this->attribute = $value;
    }
}

?>