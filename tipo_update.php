<?php
    require_once 'global.php';

    try {

        $tipo = new Tipo($id);
        $tipo->id = $_POST['id'];
        $tipo->nome = $_POST['nome'];

        $_SESSION['type'] = 'update';
        $_SESSION['message'] = "Tipo <strong>$tipo->nome</strong> alterado com sucesso!";
        
        $tipo->update();

        header('Location: tipos.php');

    } catch (Exception $e) {
        echo $e->getMessage();
    }