<?php

    require 'conexion.php';

    $idEvento = $_POST['id'];

    $con = new conectaDB('localhost','usuariodb','agenda01');

    if ($con->conectar('agenda')=='OK') {
        $datos_Agenda = $con->ejecutarQuery("DELETE FROM evento WHERE id = ".$idEvento);
        $response['msg']="OK";
    } else {
        $response['msg']="No se puede borrar el evento";
    };

    echo json_encode($response);

 ?>
