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


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>SosCode</title>
        <link rel="stylesheet" href="../vendor/twbs/bootstrap/dist/css/bootstrap.css">
        <style>
            .card-home{
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
            .zoom-image {
                transition: transform 0.2s;
                cursor: pointer;
            }

            .zoom-image:hover {
                transform: scale(1.2);
            }
        </style>
        <script>
            function newTicket(){
                window.location.href = "ticket.php";
            }

            function allTickets(){
                window.location.href = "query.php";
            }
            
            function logout() {
                window.location.href = 'index.php?logout=true';
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
                <div class="card-home">
                    <div class="card">
                        <div class="card-header bg-dark bg-gradient text-light">
                            Menu
                        </div>
                        <div class="card-body bg-warning-subtle">
                            <div class="row">
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col d-flex justify-content-center">
                                            <img src="imgs/sos.png" width="70" height="70" class="img-fluid zoom-image" onclick="newTicket()">
                                        </div>
                                        <div class="text-center">Abrir Ticket</div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col d-flex justify-content-center">
                                            <img src="imgs/search.png" width="70" height="70" class="img-fluid zoom-image" onclick="allTickets()">
                                        </div>
                                        <div class="text-center">Consultar Ticket</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <button class="btn btn-danger" onclick="logout()">Sair da Sessão</button>
                </div>
            </div>
        </div>
    </body>
</html>