<?php
  
    require 'conexion.php';

    $titulo =  $_POST['titulo'];
    $start_date =  $_POST['start_date'];
    $allDay = '0';
    if ($_POST['allDay']=='true'){
        $allDay = '1';    
    }
    $allDay =  $_POST['allDay'];
    $end_date =  $_POST['end_date'];
    $start_hour =  $_POST['start_hour'];
    $end_hour =  $_POST['end_hour'];

    if ($titulo=='') {
        $response['msg'] = 'Debe ingresar el título del evento que va a crear';
        echo json_encode($response);
    };

    if($allDay==0){
        if ($end_date=='' || $start_hour=='' || $end_hour=='') {
            $response['msg'] = 'Debe especificar la fecha de término y horas de inicio y fin cuando el evento no es todo el día';
            echo json_encode($response);
        }
    };

    $con = new conectaDB('localhost','usuariodb','agenda01');

    if ($con->conectar('agenda')=='OK') {
        $datos_Agenda = $con->ejecutarQuery("INSERT INTO evento (titulo, idusuario, fecini, fecfin,
                                             horaini, horafin, todoeldia) VALUES (".
                                             "'".$titulo."',".
                                             "'".$_COOKIE['id_agenda']."',".
                                             "STR_TO_DATE('".$start_date."','%Y-%m-%d'),".
                                             "STR_TO_DATE('".$end_date."','%Y-%m-%d'),".
                                             "'".$start_hour."',".
                                             "'".$end_hour."',".
                                             $allDay.")");

        $response['msg']="OK";

    } else {
        $response['msg']="No se puede agregar un nuevo evento";
    };

    echo json_encode($response);

 ?>
