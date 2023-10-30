<?php

require "../app_soscode/ticket.model.php";
require "../app_soscode/response.model.php";
require "../app_soscode/ticket.service.php";
require "../app_soscode/response.service.php";
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
} else if($acao == 'recuperarPendentes'){
    $ticket = new Ticket();
    $connection = new Connection();

    $ticketService = new TicketService($connection, $ticket);
    $tickets = $ticketService->readAll();
} else if($acao == 'responder'){
    $response = new Response();
    $response->__set('id_owner',  $_POST['id_owner']);
    $response->__set('id_ticket',  $_POST['id_ticket']);
    $response->__set('response',  $_POST['response']);

    $connection = new Connection();

    $responseService = new ResponseService($connection, $response);
    $responseService->create();

    header('Location: answer.php?resposta=1');
} else if($acao == 'verRespostas'){
    $response = new Response();
    $response->__set('id_ticket',  $_GET['id']);

    $connection = new Connection();

    $responseService = new ResponseService($connection, $response);
    $reponses = $responseService->read();

} else if ($acao == 'aceitarResposta'){
 
    $response2 = new Response();
    $response2->__set('id', $_POST['id'])->__set('status', 2);

    $connection = new Connection();

    echo $_POST['id'];

    $responseService = new ResponseService($connection, $response2);
    $responseService->accept();

    //header('Location: query.php?resposta=1');
}


?>