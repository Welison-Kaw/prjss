<?php
    require_once 'global.php';

    try {

        $tipo = new Tipo();
        $tipo->setNome($_POST['nome']);

        $_SESSION['type'] = 'insert';
        $_SESSION['message'] = "Tipo <strong>".$tipo->getNome()."</strong> inserido com sucesso!";

        $tipo->insert();

        header('Location: tipos.php');
    } catch (Exception $e) {
        echo $e->getMessage();
    }