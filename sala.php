<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quagga - Chat online de estudantes</title>
    <link rel="stylesheet" href="assets/style.css">
    <meta http-equiv="refresh" content="10" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
    <nav class="bg-material-blue navbar navbar-dark fixed-top">
        <span class="navbar-brand ms-3 h1 poppins"><a href="./index.php">Quagga</a></span>
    </nav>
    <div class="spacer">
        &nbsp;
    </div>
    <div class="container">
        <div class="row align-items-center mx-auto my-auto">
            <div class="col-12 mt-2">
            <?php
                include_once("./assets/conn/database_connection.php");
                if(isset($_GET['tipo'])){
                    if($_GET['tipo'] === 'prof'){
                        if(!isset($_GET['sala'])){
                            $query = "INSERT INTO salas(salas_id) VALUES (null)";
                            $stm_sql = $banco->prepare($query);
                            $stm_sql->execute();
                            $sala=$banco->lastInsertId();
                            $newURL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                            $newURL = $newURL . "&sala=".$sala;
                            header('Location: '.$newURL);
                            

                            
                        }else{
                            $sala = $_GET['sala'];
                            echo '<div class="message-blue">
                            <p class="message-content"> ADM: O ID da sala atual é ' . $sala  . '</p>
                            </div>
                            <br>';
                            $query = "INSERT INTO usuarios(usuarios_nick,usuarios_prof) VALUES ('" . $_GET['nomeProf'] . "',1)";
                            $stm_sql = $banco->prepare($query);
                            $stm_sql->execute();
                            $usuario_id=$banco->lastInsertId();
                        }
                    }else{
                        if (isset($_GET['nomeAluno'])){
                            $nomeAluno = $_GET['nomeAluno'];
                            $query = "INSERT INTO usuarios(usuarios_nick,usuarios_prof) VALUES ('" . $nomeAluno . "',0)";
                            $stm_sql = $banco->prepare($query);
                            $stm_sql->execute();
                            $usuario_id=$banco->lastInsertId();
                        }
                        $sala = $_GET['sala'];
                    }
                }

                $query = "select m.mensagens_texto as msg, u.usuarios_nick as usu from mensagens m join salas s on s.salas_id = m.salas_salas_id join usuarios u on u.usuarios_id = m.usuarios_id
                          and s.salas_id = " . $sala;
                $stm_sql=$banco->prepare($query);
                $stm_sql->execute();
                $mensagens = $stm_sql->fetchAll(PDO::FETCH_ASSOC);
                foreach($mensagens as $mensagem){
                    if (empty($mensagem['usu'])){
                        $usuario_msg = 'Anônimo';
                    }else{
                        $usuario_msg = $mensagem['usu'];
                    }
                    echo '<div class="message-blue">
                          <p class="message-content">' . $usuario_msg . ': ' . $mensagem['msg']  . '</p>
                          </div>
                          <br>';
                }
                echo '<div class="spacer">
                        &nbsp;
                      </div>';
            ?>
            <form action="redirectSala.php" method="post" class="mt-auto">
                <div class="row mt-auto fixed-bottom" style="padding-bottom: 1rem !important; padding-left:2rem">
                    <div class="col-11 d-flex">
                        <input type="hidden" name="url_to_redirect" value="<?php
                            $newURL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                            if (!isset($_GET['sala'])){
                                $newURL .= "&sala=".$sala;
                            }
                            echo $newURL;
                        ?>" method="get">
                        <input type="hidden" name="sala_id" value="<?php echo $sala?>">
                        <input type="hidden" name="usuario_id" value="<?php echo $usuario_id?>">
                        <input type="text" class="form-control" id="mensagem" name="mensagem" aria-describedby="Mensagem" placeholder="Escreva aqui!">
                    </div>
                    <div class="col-1">
                        <button class="btn bg-material-blue"><btn class="material-symbols-outlined">send</btn></button>
                    </div>
                </div>
                
            </form>
            </div>
        </div>
    </div>
</body>
</html>