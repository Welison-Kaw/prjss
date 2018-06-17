<?php
    require_once 'global.php';

    try {

        $dispositivo = new Dispositivo($id);
        $dispositivo->setId($_POST['id']);
        $dispositivo->setHostname($_POST['hostname']);
        $dispositivo->setIp($_POST['ip']);
        $dispositivo->setTipo_id($_POST['tipo_id']);
        $dispositivo->setFabricante($_POST['fabricante']);

        $_SESSION['type'] = 'update';
        $_SESSION['message'] = "Dipositivo <strong>" . $dispositivo->getHostname() . "</strong> alterado com sucesso!";
        
        $dispositivo->update();

        header('Location: dispositivos.php');

    } catch (Exception $e) {
        echo $e->getMessage();
    }