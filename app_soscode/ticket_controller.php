<?php

require "../app_soscode/ticket.model.php";
require "../app_soscode/ticket.service.php";
require "../app_soscode/connection.php";

echo '<pre>';
print_r($_POST);
echo '</pre>';

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

echo '<pre>';
print_r($ticketService);
echo '</pre>';

?>