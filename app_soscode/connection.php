<?php

class Connection{

    //Configure suas conexões com seu banco de dados criado com base no schema.sql
    private $host = 'localhost';
    private $db_name = 'db_sos';
    private $user = 'root';
    private $password = '';

    public function connect() {
        try {

            $connection = new PDO(
                "mysql:host=$this->host;dbname=$this->db_name",
                "$this->user",
                "$this->password"
            );

            return $connection;
            
        } catch (PDOException $error){
            echo '<p>' .$error->getMessage() . '</p>';
        }
    }
}

?>