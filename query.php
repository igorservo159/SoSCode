<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>SosCode</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="../vendor/twbs/bootstrap/dist/css/bootstrap.css"> -->
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
                            Consultar chamado
                        </div>
                        <div class="card-body bg-warning-subtle">
                            <div class="card mb-3 bg-light">
                                <div class="row card-body">
                                    <div class="col-10">
                                        <h5 class="card-title">Título do chamado</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Categoria</h6>
                                        <p class="card-text">Descrição do chamado</p>
                                    </div>
                                    <div class="d-grid col-2 gap-1">
                                        <div class="btn btn-sm btn-info btn-block">Concluir</div>
                                        <div class="btn btn-sm btn-warning btn-block">Editar</div>
                                        <div class="btn btn-sm btn-danger btn-block">Deletar</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3 bg-light">
                                <div class="row card-body">
                                    <div class="col-10">
                                        <h5 class="card-title">Título do chamado</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Categoria</h6>
                                        <p class="card-text">Descrição do chamado</p>
                                    </div>
                                    <div class="d-grid col-2 gap-1">
                                        <div class="btn btn-sm btn-info btn-block">Concluir</div>
                                        <div class="btn btn-sm btn-warning btn-block">Editar</div>
                                        <div class="btn btn-sm btn-danger btn-block">Deletar</div>
                                    </div>
                                </div>
                            </div>
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