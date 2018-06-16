<?php
    require_once 'global.php';

    try {
        $id = $_GET['id'];
        $dispositivo = new Dispositivo($id);

        $_SESSION['type'] = 'delete';
        $_SESSION['message'] = "Dipositivo <strong>$dispositivo->hostname</strong> excluído com sucesso!";

        $dispositivo->delete();

        header('Location: dispositivos.php');

    } catch (Exception $e) {
        echo $e->getMessage();
    }