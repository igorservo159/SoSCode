<?php

class TicketService {

    private $connection;
    private $ticket;

    public function __construct(Connection $connection, Ticket $ticket){
        $this->connection = $connection->connect();
        $this->ticket = $ticket;
    }


    public function create(){

    }

    public function read(){

    }

    public function update(){

    }

    public function delete(){
        
    }
}

?>