<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quagga - Chat online de estudantes</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="./assets/main.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
    <nav class="bg-material-blue navbar navbar-dark">
        <span class="navbar-brand ms-3 h1 poppins">Quagga</span>
    </nav>
    <div class="container">
        <div class="row align-items-center mx-auto my-auto">
            <div class="col-6 text-center">
                <img class="img-responsive" src="./assets/imgs/classroom.jpg" alt="classroom">
            </div>
            <div class="col-6 text-center">
                <button class="bg-material-blue btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseProf" aria-expanded="false" aria-controls="collapseProf">
                    Professor
                </button>
                <button class="bg-material-blue btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseAluno" aria-expanded="true" aria-controls="collapseAluno">
                    Aluno
                </button>
                
                <div class="accordion-group">
                    <div class="collapse mt-2" id="collapseAluno">
                        <div class="card card-body">
                            <form action="sala.php" method="get" onsubmit="return validateForm()">
                                <div class="form-group">
                                    <label for="ID">ID sala</label>
                                    <input type="hidden" name="tipo" value="aluno">
                                    <input type="number" class="form-control" id="sala" name="sala" aria-describedby="ID da sala" placeholder="123456">
                                </div>
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" id="nomeAluno" name="nomeAluno" placeholder="Felipe">
                                </div>
                                <button type="submit" class="btn btn-primary bg-material-blue mt-2">Acessar</button>
                            </form>
                        </div>
                    </div>

                    <div class="collapse mt-2" id="collapseProf">
                        <div class="card card-body">
                            <form action="sala.php" method="get" onsubmit="return validateForm()">
                                <div class="form-group">
                                    <input type="hidden" name="tipo" value="prof">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" id="nomeProf" name="nomeProf" placeholder="Felipe">
                                </div>
                                <button type="submit" class="btn btn-primary bg-material-blue mt-2">Acessar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 mt-auto border-top">
        <div class="d-flex align-items-center">
            <span class="ms-3 mb-0 text-muted">© 2024 Quagga</span>
        </div>
    </footer>
</body>
</html>