<?php
    require_once 'global.php';

    try {

        $dispositivo = new Dispositivo();
        $dispositivo->setHostname($_POST['hostname']);
        $dispositivo->setIp($_POST['ip']);
        $dispositivo->setTipo_id($_POST['tipo_id']);
        $dispositivo->setFabricante($_POST['fabricante']);

        $_SESSION['type'] = 'insert';
        $_SESSION['message'] = "Dipositivo <strong>" . $dispositivo->getHostname . "</strong> inserido com sucesso!";
        
        $dispositivo->insert();

        header('Location: dispositivos.php');

    } catch (Exception $e) {
        echo $e->getMessage();
    }