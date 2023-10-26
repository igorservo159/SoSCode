<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>SosCode</title>
        <link rel="stylesheet" href="../vendor/twbs/bootstrap/dist/css/bootstrap.css">
        <style>
            .card-login{
                padding: 30px 0 0 0;
                width: 350px;
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
                <div class="card-login">
                    <div class="card">
                        <div class="card-header bg-dark bg-gradient text-light">
                            Login
                        </div>
                        <div class="card-body bg-warning-subtle">
                            <form>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id = "floatingInput" placeholder = "Digite seu e-mail">
                                    <label for="floatingInput">E-mail</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id = "floatingPassword" placeholder = "Digite sua senha">
                                    <label for="floatingPassword">Senha</label>
                                </div>
                                <div class="row">
                                    <div class="d-grid gap-2 col-6">
                                        <button class="btn btn-lg btn-outline-dark btn-block" type="submit">Entrar</button>
                                    </div>
                                    <div class="d-grid gap-2 col-6">
                                        <button class="btn btn-lg btn-outline-dark btn-block" type="button">Sign up</button>
                                    </div>
                                </div>    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>