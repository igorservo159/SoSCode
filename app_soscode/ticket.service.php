<?php

class TicketService {

    private $connection;
    private $ticket;

    public function __construct(Connection $connection, Ticket $ticket){
        $this->connection = $connection->connect();
        $this->ticket = $ticket;
    }


    public function create(){
        $query = 'insert into tb_tickets(title, category, description)values(:title, :category, :description)';
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':title', $this->ticket->__get('title'));
        $stmt->bindValue(':category', $this->ticket->__get('category'));
        $stmt->bindValue(':description', $this->ticket->__get('description'));
        $stmt->execute();
    }

    public function read(){

    }

    public function update(){

    }

    public function delete(){
        
    }
}

?>