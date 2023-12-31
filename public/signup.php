<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>SosCode</title>
        <link rel="stylesheet" href="../vendor/twbs/bootstrap/dist/css/bootstrap.css">
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
        <script>
            function back(){
                window.location.href = "index.php";
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
        
        <?php if(isset($_GET['erro']) && $_GET['erro'] == 0 ){
            ?>
                <div class="bg-danger pt-2 text-white d-flex justify-content-center">
                    <h5>Preencha todos os campos!</h5>
                </div>
            <?php
        }    
        ?>

        <?php if(isset($_GET['erro']) && $_GET['erro'] == 1 ){
            ?>
                <div class="bg-danger pt-2 text-white d-flex justify-content-center">
                    <h5>As senhas não coincidem!</h5>
                </div>
            <?php
        }    
        ?>

        <?php if(isset($_GET['erro']) && $_GET['erro'] == 2 ){
            ?>
                <div class="bg-danger pt-2 text-white d-flex justify-content-center">
                    <h5>O email já está em uso!</h5>
                </div>
            <?php
        }    
        ?>

        <?php if(isset($_GET['erro']) && $_GET['erro'] == 3 ){
            ?>
                <div class="bg-danger pt-2 text-white d-flex justify-content-center">
                    <h5>Ocorreu algum problema! Tente mais tarde.</h5>
                </div>
            <?php
        }    
        ?>

        <div class="container">    
            <div class="row">
                <div class="card-cadastro">
                    <div class="card">
                        <div class="card-header bg-dark bg-gradient text-light">
                            Sign up
                        </div>
                        <div class="card-body bg-warning-subtle">
                            <form method="post" action="user_controller.php?acao=registrar">
                                <div class="form-floating mb-3">
                                    <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Nome" required>
                                    <label for="floatingInput">Nome</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="E-mail" required>
                                    <label for="floatingEmail">E-mail</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Senha" required>
                                    <label for="floatingPassword">Senha</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" name="passwordConfirm" class="form-control" id="floatingConfirmPassword" placeholder="Confirmar senha" required>
                                    <label for="floatingConfirmPassword">Confirmar senha</label>
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-lg btn-outline-dark btn-block" type="submit">Cadastrar</button>
                                </div>
                            </form>
                            <div class="d-grid gap-2 mt-2">
                                <button class="btn btn-lg btn-outline-dark btn-block" type="button" onclick="back()">Voltar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const currentURL = new URL(window.location.href);
            currentURL.searchParams.delete('erro');

            history.replaceState({}, document.title, currentURL.toString());
        </script>
    </body>
</html>