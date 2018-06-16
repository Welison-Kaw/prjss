<?php
    require_once 'global.php';

    try {

        $dispositivo = new Dispositivo($id);
        $dispositivo->hostname = $_POST['hostname'];
        $dispositivo->ip = $_POST['ip'];
        $dispositivo->tipo_id = $_POST['tipo_id'];
        $dispositivo->fabricante = $_POST['fabricante'];

        $_SESSION['type'] = 'insert';
        $_SESSION['message'] = "Dipositivo <strong>$dispositivo->hostname</strong> inserido com sucesso!";
        
        $dispositivo->insert();

        header('Location: dispositivos.php');

    } catch (Exception $e) {
        echo $e->getMessage();
    }