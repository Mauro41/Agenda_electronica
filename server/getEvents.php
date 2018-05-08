<?php
  
  require 'conexion.php';

  $con = new conectaDB('localhost','usuariodb','agenda01');

  if ($con->conectar('agenda')=='OK') {
    $datos_Agenda = $con->ejecutarQuery('SELECT titulo, fecini, fecfin, todoeldia FROM evento'); // WHERE idusuario='.$_COOKIE['id_agenda']);

    if ($datos_Agenda) {
        $events = array();
        while ($evento_read = $datos_Agenda->fetch_assoc()) {
            $todoElDia = 'false';
            if ($evento_read['todoeldia']==1){
                $todoElDia = 'true';
            };
            $evento = array('title'=>$evento_read['titulo'], 'start'=>$evento_read['fecini'], 'end'=>$evento_read['fecfin'], 'allDay'=> $todoElDia);
            array_push($events, $evento);
        };
        $response['msg'] = 'OK';
        $response['eventos'] = $events;
        } else {
            $response['msg'] = 'No se puede recuperar los datos de la agenda';
            $response['eventos'] = '';
        };

} else {
    $response['msg'] = 'No se puede recuperar los datos de la agenda';
    $response['eventos'] = '';
}

echo json_encode($response);

 ?>
