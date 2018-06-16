<?php
    require_once 'global.php';

    try {
        $id = $_GET['id'];
        $tipo = new Tipo($id);
        $tipo->selectDispositivos();

        if (count($tipo->dispositivos) > 0) {
            $_SESSION['type'] = 'warning';
            $_SESSION['message'] = "Existem ". count($tipo->dispositivos) . " dispositivo(s) do tipo <strong>$tipo->nome</strong>! <br />Esse item não pode ser apagado!";
        } else {
            $_SESSION['type'] = 'delete';
            $_SESSION['message'] = "Tipo <strong>$tipo->nome</strong> excluído com sucesso!";

            $tipo->delete();
        }

        header('Location: tipos.php');

    } catch (Exception $e) {
        echo $e->getMessage();
    }