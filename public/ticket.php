<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>SosCode</title>
        <link rel="stylesheet" href="../vendor/twbs/bootstrap/dist/css/bootstrap.css">
        <style>
            .card-open-call{
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

        <?php if(isset($_GET['inclusao']) && $_GET['inclusao'] == 1 ){
            ?>
                <div class="bg-success pt-2 text-white d-flex justify-content-center">
                    <h5>Tarefa inserida com sucesso</h5>
                </div>
            <?php
        }    
        ?>

        
        <div class="container">
            <div class="row">
                <div class="card-open-call">
                    <div class="card">
                        <div class="card-header bg-dark bg-gradient text-light">
                            Novo Ticket
                        </div>
                        <div class="card-body bg-warning-subtle">
                            <div class="row">
                                <div class="col">
                                    <form method="post" action="ticket_controller.php?acao=inserir">

                                        <div class="mb-3">
                                            <label class="form-label">Título</label>
                                            <input name="title" type="text" class="form-control"
                                            placeholder="Título">
                                        </div>

                                        <div class="mb-3">
                                            <label for="category" class="form-label">Categoria do Ticket</label>
                                            <select name="category" class="form-select" id="category">
                                                <option value = "frontend">Frontend</option>
                                                <option value = "backend">Backend</option>
                                                <option value = "database">Database</option>
                                                <option value = "devops">Devops</option>
                                                <option value = "mobile">Mobile</option>
                                                <option value = "other">Outro</option>
                                            </select>
                                        </div>

                                        <div class="mb-3 d-none" id="other-category">
                                            <label class="form-label">Outra Categoria</label>
                                            <input id="input-other" name="other-category" type="text" class="form-control" placeholder="Outra Categoria">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Descrição</label>
                                            <textarea name="description" class="form-control" rows="3"></textarea>
                                        </div>

                                        <div class="row mt-5">
                                            <div class="d-grid gap-2 col-6">
                                                <button class="btn btn-lg btn-info btn-block" type="submit">Abrir</button>
                                            </div>
                                            <div class="d-grid gap-2 col-6">
                                                <button class="btn btn-lg btn-warning btn-block" type="button" onclick="back()">Voltar</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function back(){
                window.location.href = "home.php";
            }

            var category = document.getElementById("category");
            var otherCategory = document.getElementById("other-category");
            var inputOther = document.getElementById("input-other");
            category.addEventListener("change", function () {
                if (category.value === "other") {
                    otherCategory.classList.remove("d-none");
                    otherCategory.classList.add("d-block");
                } else {
                    otherCategory.classList.remove("d-block");
                    otherCategory.classList.add("d-none");
                    inputOther.value = "";
                }
            });
        </script>
        
    </body>
</html>