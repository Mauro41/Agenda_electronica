<?php
  
  require 'conexion.php';

  $con = new conectaDB('localhost','usuariodb','agenda01');

  if ($con->conectar('agenda')=='OK') {
    $datos_Agenda = $con->ejecutarQuery("SELECT titulo, fecini, COALESCE(fecfin, fecini) AS fecfin, COALESCE(horaini,'00:00') AS horaini, COALESCE(horafin,'23:59') AS horafin, todoeldia FROM evento WHERE idusuario='".$_COOKIE['id_agenda']."'");

    $events = array();
    if ($datos_Agenda) {        
        while ($evento_read = $datos_Agenda->fetch_assoc()) {
            $todoElDia = 'false';
            if ($evento_read['todoeldia']==1){
                $todoElDia = 'true';
            };
            if ($todoElDia == 'true') {
                $evento = array('title'=>$evento_read['titulo'], 'start'=>$evento_read['fecini'], 'allDay'=> $todoElDia);
                array_push($events, $evento);
            } else {
                $evento = array('title'=>$evento_read['titulo'], 'start'=>$evento_read['fecini'].'T'.$evento_read['horaini'], 'end'=>$evento_read['fecfin'].'T'.$evento_read['horafin'], 'allDay'=> $todoElDia);
                array_push($events, $evento);
            }
        };
        
    };
    $response['msg'] = 'OK';
    $response['eventos'] = $events;

} else {
    $response['msg'] = 'No se puede recuperar los datos de la agenda '.$_COOKIE['id_agenda'];
    $response['eventos'] = '';
}

echo json_encode($response);

 ?>
