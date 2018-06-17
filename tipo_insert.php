<?php
    require_once 'global.php';

    try {

        $tipo = new Tipo();
        $tipo->nome = $_POST['nome'];

        $_SESSION['type'] = 'insert';
        $_SESSION['message'] = "Tipo <strong>$tipo->nome</strong> inserido com sucesso!";

        $tipo->insert();

        header('Location: tipos.php');
    } catch (Exception $e) {
        echo $e->getMessage();
    }