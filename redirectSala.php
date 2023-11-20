<?php
    include_once("./assets/conn/database_connection.php");
    //if(isset($_POST["mensagem"])){
        $query = "INSERT INTO mensagens(mensagens_texto,usuarios_id,salas_salas_id) VALUES ('" . $_POST['mensagem'] . "'," . $_POST['usuario_id'] . ",".$_POST['sala_id'].")";
        $stm_sql = $banco->prepare($query);
        $stm_sql->execute();
        header('Location: '.$_POST['url_to_redirect']);
        exit;
    //}
?>