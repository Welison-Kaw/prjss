<?php
    require_once 'global.php';

    try {

        $dispositivo = new Dispositivo($id);
        $dispositivo->id = $_POST['id'];
        $dispositivo->hostname = $_POST['hostname'];
        $dispositivo->ip = $_POST['ip'];
        $dispositivo->tipo_id = $_POST['tipo_id'];
        $dispositivo->fabricante = $_POST['fabricante'];

        $_SESSION['type'] = 'update';
        $_SESSION['message'] = "Dipositivo <strong>$dispositivo->hostname</strong> alterado com sucesso!";
        
        $dispositivo->update();

        header('Location: dispositivos.php');

    } catch (Exception $e) {
        echo $e->getMessage();
    }