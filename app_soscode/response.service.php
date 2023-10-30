<?php

class ResponseService {

    private $connection;
    private $response;

    public function __construct(Connection $connection, Response $response){
        $this->connection = $connection->connect();
        $this->response = $response;
    }

    public function create(){
        $query = 'insert into tb_responses(response, id_ticket, id_owner)values(:response, :id_ticket, :id_owner)';
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':response', $this->response->__get('response'));
        $stmt->bindValue(':id_ticket', $this->response->__get('id_ticket'));
        $stmt->bindValue(':id_owner', $this->response->__get('id_owner'));
        $stmt->execute();
    }

    public function read(){
        $query = '
            select 
                u.name, r.response, r.id, r.status
            from
                tb_responses as r
            inner join 
                tb_users as u on (r.id_owner = u.id)
            where
                r.id_ticket = :id_ticket;
        ';
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':id_ticket', $this->response->__get('id_ticket'));
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function accept(){
        $query = "update tb_responses
                  set status = :status
                  where id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':status', $this->response->__get('status'));
        $stmt->bindValue(':id', $this->response->__get('id'));
        return $stmt->execute();
    }
}

?>