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

$acao = 'verRespostas';
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

        <div class="container">
            <div class="row">
                <div class="card-query">
                    <div class="card">
                        <div class="card-header bg-dark bg-gradient text-light">
                            Consultar Respostas
                        </div>
                        <div class="card-body bg-warning-subtle overflow-y-auto d-flex flex-column"
                        style = "max-height: 70vh;">
                            <?php foreach($reponses as $index => $reponse){ ?>
                                <div class="card mt-2 bg-light">
                                    <div class="row card-body" id="response_<?=$reponse->id?>">
                                        <div class="col-10">
                                            <h6 class="card-text"><?=$reponse->response?></h6> 
                                            <h6 class="card-subtitle mb-2 text-muted"><?=$reponse->name?> (<?php if($reponse->status == 1){echo 'Resposta negada';} else if($reponse->status == 2){echo 'Resposta aceita';}?>)</h6>
                                        </div>
                                        <div class="d-grid col-2 gap-1">
                                            <form action = "ticket_controller.php?acao=aceitarResposta" method = 'post'>
                                                <input type="hidden" name="id" value='<?=$reponse->id?>'>
                                                <button class="btn btn-sm btn-secondary btn-block d-flex align-items-center justify-content-center" type="submit">Aceitar</button>
                                            </form>
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