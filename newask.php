<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>SosCode</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="../vendor/twbs/bootstrap/dist/css/bootstrap.css"> -->
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
        
        <div class="container">
            <div class="row">
                <div class="card-open-call">
                    <div class="card">
                        <div class="card-header bg-dark bg-gradient text-light">
                            Abrir chamado
                        </div>
                        <div class="card-body bg-warning-subtle">
                            <div class="row">
                                <div class="col">
                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label">Título</label>
                                            <input type="text" class="form-control"
                                            placeholder="Título">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Categoria do problema</label>
                                            <select class="form-select">
                                                <option>Frontend</option>
                                                <option>Backend</option>
                                                <option>Database</option>
                                                <option>Devops</option>
                                                <option>Mobile</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Descrição</label>
                                            <textarea class="form-control" rows="3"></textarea>
                                        </div>

                                        <div class="row mt-5">
                                            <div class="d-grid gap-2 col-6">
                                                <button class="btn btn-lg btn-info btn-block" type="submit">Abrir</button>
                                            </div>
                                            <div class="d-grid gap-2 col-6">
                                                <button class="btn btn-lg btn-warning btn-block" type="submit">Voltar</button>
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
    </body>
</html>