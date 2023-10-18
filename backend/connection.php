<?php

class Connection{
    private $host = 'localhost';
    private $db_name = 'db_sos';
    private $user = 'igor';
    private $password = '1234';

    private function connect(){
        try {
            $connection  = new PDO(
                "mysql:host=$this->host;dbname=$this->db_name",
                "$this->user",
                "$this->password"
            );

            return $connection;
            
        } catch (PDOException $error){
            echo '<p>' .$error->getMessege() . '</p>';
        }
    }
}

?>