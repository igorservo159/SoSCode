<?php

require "../app_soscode/ticket.model.php";
require "../app_soscode/ticket.service.php";
require "../app_soscode/connection.php";


$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

if($acao == 'inserir'){

    $ticket = new Ticket();
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

} else if($acao = 'recuperar'){
    
    $ticket = new Ticket();
    $connection = new Connection();

    $ticketService = new TicketService($connection, $ticket);
    $tickets = $ticketService->read();

}


?>