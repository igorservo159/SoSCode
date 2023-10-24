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
                // Crie um elemento form
                let form = document.createElement('form');
                form.action = '#';
                form.method = 'post';
                form.className = 'row form-floating';

                // Crie os campos de entrada para título, categoria e descrição
                let inputTitle = createInput('title', 'Título', txt_title);
                let inputCategory = createInput('category', 'Categoria', txt_category);
                let inputDescription = createInput('description', 'Descrição', txt_description);

                let inputId = document.createElement('input')
                inputId.type = 'hidden'
                inputId.name = 'id'
                inputId.value = id

                let button = document.createElement('button')
                button.type = 'submit'
                button.className = 'col-12 mt-2 btn btn-info'
                button.innerHTML = 'Atualizar'

                // Adicione os campos de entrada ao formulário
                form.appendChild(inputTitle);
                form.appendChild(inputCategory);
                form.appendChild(inputDescription);
                form.appendChild(inputId)
                form.appendChild(button)

                // Adicione o formulário ao elemento ticket
                let ticket = document.getElementById('ticket_' + id);
                ticket.innerHTML = '';
                ticket.appendChild(form);
            }

            // Função para criar campos de entrada
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
                                <div class="card mb-3 bg-light">
                                    <div class="row card-body" id="ticket_<?=$ticket->id?>">
                                        <div class="col-10">
                                            <h5 class="card-title"><?= $ticket->title ?> (<?= $ticket->status ?>)</h5>
                                            <h6 class="card-subtitle mb-2 text-muted"><?= $ticket->category ?></h6>
                                            <p class="card-text"><?= $ticket->description ?></p>
                                        </div>
                                        <div class="d-grid col-2 gap-1">
                                            <div class="btn btn-sm btn-info btn-block">Concluir</div>
                                            <div class="btn btn-sm btn-warning btn-block" onclick="edit(<?=$ticket->id?>, '<?=$ticket->title?>', '<?=$ticket->category?>', '<?=$ticket->description?>')">Editar</div>
                                            <div class="btn btn-sm btn-danger btn-block">Deletar</div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <button class="btn btn-warning btn-block" type="submit">Voltar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>