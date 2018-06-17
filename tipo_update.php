<?php
    require_once 'global.php';

    try {

        $tipo = new Tipo($id);
        $tipo->setId($_POST['id']);
        $tipo->setNome($_POST['nome']);

        $_SESSION['type'] = 'update';
        $_SESSION['message'] = "Tipo <strong>".$tipo->getNome()."</strong> alterado com sucesso!";
        
        $tipo->update();

        header('Location: tipos.php');

    } catch (Exception $e) {
        echo $e->getMessage();
    }