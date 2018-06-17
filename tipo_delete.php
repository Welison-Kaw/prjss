<?php
    require_once 'global.php';

    try {
        $id = $_GET['id'];
        $tipo = new Tipo($id);
        $dispositivos = $tipo->getDispositivos();

        if (count($dispositivos) > 0) {
            $_SESSION['type'] = 'warning';
            $_SESSION['message'] = "Existem ". count($dispositivos) . " dispositivo(s) do tipo <strong>" . $tipo->getNome() . "</strong>! <br />Esse item não pode ser apagado!";
        } else {
            $_SESSION['type'] = 'delete';
            $_SESSION['message'] = "Tipo <strong>" . $tipo->getNome() . "</strong> excluído com sucesso!";

            $tipo->delete();
        }

        header('Location: tipos.php');

    } catch (Exception $e) {
        echo $e->getMessage();
    }