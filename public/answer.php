<?php

require "../app_soscode/auth.php";

session_start();

if (isset($_SESSION['token'])) {
    try {
        $teste = verifyToken($_SESSION['token']);
        $exp = $teste->exp;
        $current_time = time();

        if ($current_time > $exp) {
            session_unset(); 
            session_destroy(); 
            header('Location: index.php?erro=3');
            exit;
        }
    } catch (Exception $e) {
            session_unset(); 
            session_destroy(); 
            header('Location: index.php?erro=4');
            exit;
    }
} else {
    session_unset(); 
    session_destroy(); 
    header('Location: index.php?erro=4');
    exit;
}

$acao = 'recuperarPendentes';
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
            
            function checkSessionExp() {
                const current_time = Math.floor(Date.now() / 1000); // Obtenha o tempo atual em segundos
                if (current_time > <?=$exp?>) {
                    window.location.href = 'index.php?erro=3';
                }
            }

            function answer(id_owner, id_ticket, txt_name, txt_title, txt_category, txt_description, txt_status) {
                checkSessionExp();
                let form = document.createElement('form');
                form.action = "ticket_controller.php?acao=responder";
                form.method = 'post';
                form.className = 'row form-floating';

                let inputId_owner = document.createElement('input')
                inputId_owner.type = 'hidden'
                inputId_owner.name = 'id_owner'
                inputId_owner.value = id_owner

                let inputId_ticket = document.createElement('input')
                inputId_ticket.type = 'hidden'
                inputId_ticket.name = 'id_ticket'
                inputId_ticket.value = id_ticket

                let textareaDiv = document.createElement('div');
                textareaDiv.className = 'form-floating mb-2';

                let textarea = document.createElement('textarea');
                textarea.className = 'form-control';
                textarea.name = 'response';
                textarea.placeholder = 'Digite sua resposta aqui...';
                textarea.required = true;

                let label = document.createElement('label');
                label.for = 'response';
                label.textContent = 'Resposta';

                let button = document.createElement('button')
                button.type = 'submit'
                button.className = 'col-12 ms-2 me-2 mt-2 btn btn-info'
                button.innerHTML = 'Enviar resposta'

                textareaDiv.appendChild(textarea);
                textareaDiv.appendChild(label);

                let cancelButton = document.createElement('button')
                cancelButton.type = 'button'
                cancelButton.className = 'col-12 ms-2 me-2 mt-2 btn btn-danger'
                cancelButton.innerHTML = 'Cancelar'
                cancelButton.onclick = function () {
                    let ticket = document.getElementById('ticket_' + id_ticket);
                    ticket.innerHTML = '';
                    let textDiv = document.createElement('div');
                    textDiv.className = 'col-10'
                    textDiv.innerHTML = `
                        <h5 class="card-title">${txt_title} (${txt_status})</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Usuário: ${txt_name}</h6>
                        <h6 class="card-subtitle mb-2 text-muted">${txt_category}</h6>
                        <p class="card-text">${txt_description}</p>
                    `;
                    let actionsDiv = document.createElement('div');
                    actionsDiv.className = 'd-grid col-2 gap-1';
                    let answerButton = document.createElement('div');
                    answerButton.className = 'btn btn-sm btn-warning btn-block d-flex align-items-center justify-content-center';
                    answerButton.innerHTML = 'Responder';
                    answerButton.onclick = function(){
                        answer(id_owner, id_ticket, txt_name, txt_title, txt_category, txt_description);
                    }

                    actionsDiv.appendChild(answerButton);
                    ticket.appendChild(textDiv);
                    ticket.appendChild(actionsDiv);
                }

                form.appendChild(inputId_owner);
                form.appendChild(inputId_ticket);
                form.appendChild(textareaDiv);
                form.appendChild(button);
                form.appendChild(cancelButton);

                let ticket = document.getElementById('ticket_' + id_ticket);
                ticket.innerHTML = '';
                ticket.appendChild(form);
            }

            function back(){
                checkSessionExp();
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

        <?php if(isset($_GET['resposta']) && $_GET['resposta'] == 1 ){
            ?>
                <div class="bg-success pt-2 text-white d-flex justify-content-center">
                    <h5>Resposta enviada com sucesso</h5>
                </div>
            <?php
        }    
        ?>
        
        <div class="container">
            <div class="row">
                <div class="card-query">
                    <div class="card">
                        <div class="card-header bg-dark bg-gradient text-light">
                            Tickets em aberto
                        </div>
                        <div class="card-body bg-warning-subtle overflow-y-auto d-flex flex-column"
                        style = "max-height: 70vh;">
                            <?php
                            foreach($tickets as $index => $ticket){ ?>
                                <div class="card mt-2 bg-light">
                                    <div class="row card-body" id="ticket_<?=$ticket->id?>">
                                        <div class="col-10">
                                            <h5 class="card-title"><?= $ticket->title ?> (<?= $ticket->status ?>)</h5>
                                            <h6 class="card-subtitle mb-2 text-muted">Usuário: <?= $ticket->name ?></h6>
                                            <h6 class="card-subtitle mb-2 text-muted"><?= $ticket->category ?></h6>
                                            <p class="card-text"><?= $ticket->description ?></p>
                                        </div>
                                        <div class="d-grid col-2 gap-1">
                                            <div class="btn btn-sm btn-warning btn-block d-flex align-items-center justify-content-center" onclick="answer(<?=$teste->id?>, <?=$ticket->id?>, '<?=$ticket->name?>','<?=$ticket->title?>', '<?=$ticket->category?>', '<?=$ticket->description?>', '<?=$ticket->status?>')">Responder</div>
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