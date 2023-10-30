<?php

require "../app_soscode/ticket.model.php";
require "../app_soscode/ticket.service.php";
require "../app_soscode/connection.php";


$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

if($acao == 'inserir'){
    $ticket = new Ticket();
    $ticket->__set('id_user',  $_POST['id_user']);
    $ticket->__set('title', $_POST['title']);
    if ($_POST['other-category'] == ""){
        $ticket->__set('category', $_POST['category']);
    }
    else{
        $ticket->__set('category', strtolower($_POST['other-category']));
    }
    $ticket->__set('description', $_POST['description']);
    
    $connection = new Connection();
    
    $ticketService = new TicketService($connection, $ticket);
    $ticketService->create();
    
    header('Location: ticket.php?inclusao=1');

} else if($acao == 'recuperar'){
    $ticket = new Ticket();
    $ticket->__set('id_user', $teste->id);
    $connection = new Connection();

    $ticketService = new TicketService($connection, $ticket);
    $tickets = $ticketService->read();

} else if($acao == 'atualizar'){
    $ticket = new Ticket();
    $ticket->__set('id', $_POST['id']);
    $ticket->__set('title', $_POST['title']);
    $ticket->__set('category', $_POST['category']);
    $ticket->__set('description', $_POST['description']);

    $connection = new Connection();

    $ticketService = new TicketService($connection, $ticket);

    if($ticketService->update()){
        header('location: query.php');
    }
} else if($acao == 'remover'){
    $ticket = new Ticket();
    $ticket->__set('id', $_GET['id']);

    $connection = new Connection();
    
    $ticketService = new TicketService($connection, $ticket);
    $ticketService->delete();

    header('location: query.php');
} else if($acao == 'concluir'){
    
    $ticket = new Ticket();
    $ticket->__set('id', $_GET['id'])->__set('id_status', 2);

    $connection = new Connection();

    $ticketService = new TicketService($connection, $ticket);
    $ticketService->conclude();

    header('location: query.php');
}


?>