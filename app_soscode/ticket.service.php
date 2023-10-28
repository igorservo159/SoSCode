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
        $query = '
            select 
                t.id, s.status, t.title, t.category, t.description 
            from
                tb_tickets as t
                left join tb_status as s on (t.id_status = s.id)
        ';
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function update(){
        $query = "update tb_tickets
                  set title = :title, category = :category, description = :description
                  where id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':title', $this->ticket->__get('title'));
        $stmt->bindValue(':category', $this->ticket->__get('category'));
        $stmt->bindValue(':description', $this->ticket->__get('description'));
        $stmt->bindValue(':id', $this->ticket->__get('id'));
        return $stmt->execute();
    }

    public function delete(){
        $query = 'delete from tb_tickets where id = ?';
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(1, $this->ticket->__get('id'));
        $stmt->execute();
    }

    public function conclude(){
        $query = "update tb_tickets
                  set id_status = ?
                  where id = ?";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(1, $this->ticket->__get('id_status'));
        $stmt->bindValue(2, $this->ticket->__get('id'));
        return $stmt->execute();
    }
}

?>