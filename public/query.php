<?php

    $acao = 'recuperar';
    require 'ticket_controller.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>SosCode</title>
        <link rel="stylesheet" href="../vendor/twbs/bootstrap/dist/css/bootstrap.css">
        <style>
            .card-query{
                padding: 30px 0 0 0;
                width: 100%;
                margin: 0 auto;
            }
            body{
                background-image: url('imgs/bg_teste.png');
                background-size: cover;
                height: 100vh; 
                background-repeat: no-repeat; 
                background-position: center;
            }
        </style>

        <script>
            function edit(id, txt_title, txt_category, txt_description) {
                let form = document.createElement('form');
                form.action = "ticket_controller.php?acao=atualizar";
                form.method = 'post';
                form.className = 'row form-floating';

                let inputTitle = createInput('title', 'Título', txt_title);
                let inputCategory = createInput('category', 'Categoria', txt_category);
                let inputDescription = createInput('description', 'Descrição', txt_description);

                let inputId = document.createElement('input')
                inputId.type = 'hidden'
                inputId.name = 'id'
                inputId.value = id

                let button = document.createElement('button')
                button.type = 'submit'
                button.className = 'col-12 ms-2 me-2 mt-2 btn btn-info'
                button.innerHTML = 'Atualizar'

                let cancelButton = document.createElement('button')
                cancelButton.type = 'button'
                cancelButton.className = 'col-12 ms-2 me-2 mt-2 btn btn-danger'
                cancelButton.innerHTML = 'Cancelar'
                cancelButton.onclick = function () {
                    let ticket = document.getElementById('ticket_' + id);
                    ticket.innerHTML = '';
                    let textDiv = document.createElement('div');
                    textDiv.className = 'col-10'
                    textDiv.innerHTML = `
                        <h5 class="card-title">${txt_title}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">${txt_category}</h6>
                        <p class="card-text">${txt_description}</p>
                    `;
                    let actionsDiv = document.createElement('div');
                    actionsDiv.className = 'd-grid col-2 gap-1';
                    let completeButton = document.createElement('div');
                    completeButton.className = 'btn btn-sm btn-info btn-block';
                    completeButton.innerHTML = 'Concluir';
                    completeButton.onclick = function(){
                        conclude(id);
                    }
                    let editButton = document.createElement('div');
                    editButton.className = 'btn btn-sm btn-warning btn-block';
                    editButton.innerHTML = 'Editar';
                    editButton.onclick = function(){
                        edit(id, txt_title, txt_category, txt_description);
                    };
                    let deleteButton = document.createElement('div');
                    deleteButton.className = 'btn btn-sm btn-danger btn-block';
                    deleteButton.innerHTML = 'Deletar';
                    deleteButton.onclick = function(){
                        remove(id);
                    };

                    actionsDiv.appendChild(completeButton);
                    actionsDiv.appendChild(editButton);
                    actionsDiv.appendChild(deleteButton);
                    ticket.appendChild(textDiv);
                    ticket.appendChild(actionsDiv);
                }
                

                form.appendChild(inputTitle);
                form.appendChild(inputCategory);
                form.appendChild(inputDescription);
                form.appendChild(inputId)
                form.appendChild(button)
                form.appendChild(cancelButton);

                let ticket = document.getElementById('ticket_' + id);
                ticket.innerHTML = '';
                ticket.appendChild(form);
            }

            function createInput(name, label, value) {
                let container = document.createElement('div');
                container.className = 'col-12 mt-1';

                let labelElement = document.createElement('label');
                labelElement.for = 'floating' + name;
                labelElement.innerHTML = label;

                let inputElement = document.createElement('input');
                inputElement.id = 'floating' + name;
                inputElement.type = 'text';
                inputElement.name = name;
                inputElement.className = 'form-control';
                inputElement.value = value;

                container.appendChild(labelElement);
                container.appendChild(inputElement);

                return container;
            }

            function remove(id){
                location.href = 'query.php?acao=remover&id='+id;
            }

            function conclude(id){
                location.href = 'query.php?acao=concluir&id='+id;
            }

            function back(){
                window.location.href = "home.php";
            }

        </script>

    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="#">
                <img src="imgs/code.png" width="30" height="30" class="d-inline-block align-top" alt="">
                SosCode
            </a>
        </nav>
        
        <div class="container">
            <div class="row">
                <div class="card-query">
                    <div class="card">
                        <div class="card-header bg-dark bg-gradient text-light">
                            Consultar Ticket
                        </div>
                        <div class="card-body bg-warning-subtle overflow-y-auto d-flex flex-column"
                        style = "max-height: 70vh;">
                            <?php
                            foreach($tickets as $index => $ticket){ ?>
                                <div class="card mt-2 bg-light">
                                    <div class="row card-body" id="ticket_<?=$ticket->id?>">
                                        <div class="col-10">
                                            <h5 class="card-title"><?= $ticket->title ?> (<?= $ticket->status ?>)</h5>
                                            <h6 class="card-subtitle mb-2 text-muted"><?= $ticket->category ?></h6>
                                            <p class="card-text"><?= $ticket->description ?></p>
                                        </div>
                                        <div class="d-grid col-2 gap-1">
                                            <?php if($ticket->status == 'pendente'){?>
                                                <div class="btn btn-sm btn-info btn-block" onclick="conclude(<?=$ticket->id?>)">Concluir</div>
                                                <div class="btn btn-sm btn-warning btn-block" onclick="edit(<?=$ticket->id?>, '<?=$ticket->title?>', '<?=$ticket->category?>', '<?=$ticket->description?>')">Editar</div>
                                            <?php } ?>
                                            <div class="btn btn-sm btn-danger btn-block d-flex align-items-center justify-content-center" onclick="remove(<?=$ticket->id?>)">Deletar</div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="row mt-4">
                                <div class="col-2 d-grid gap-2">
                                    <button class="btn btn-warning btn-block" type="button" onclick="back()">Voltar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>