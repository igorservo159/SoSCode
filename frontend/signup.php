<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>SosCode</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="../../vendor/twbs/bootstrap/dist/css/bootstrap.css"> -->
        <style>
            .card-cadastro{
                padding: 30px 0 0 0;
                width: 70%;
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
                <div class="card-cadastro">
                    <div class="card">
                        <div class="card-header bg-dark bg-gradient text-light">
                            Sign up
                        </div>
                        <div class="card-body bg-warning-subtle">
                            <form>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Digite seu nome">
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" placeholder="Digite seu e-mail">
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control" placeholder="Crie uma senha">
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control" placeholder="Confirme a senha">
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-lg btn-outline-dark btn-block" type="submit">Cadastrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>