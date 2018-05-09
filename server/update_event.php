<?php
 
 require 'conexion.php';

 $id =  $_POST['id'];
 $start_date =  $_POST['start_date'];
 $end_date =  $_POST['end_date'];
 $start_hour =  $_POST['start_hour'];
 $end_hour =  $_POST['end_hour'];

$con = new conectaDB('localhost','usuariodb','agenda01');

if ($con->conectar('agenda')=='OK') {

    $datos_Agenda = $con->ejecutarQuery("UPDATE eventos SET ".
                                        "fecini=STR_TO_DATE('".$start_date."','%Y-%m-%d'),".
                                        "fecfin=STR_TO_DATE('".$end_date."','%Y-%m-%d'),".
                                        "horaini='".$start_hour."',".
                                        "horafin='".$end_hour."' WHERE ".
                                        "id=". $id);

    $response['msg'] = "UPDATE eventos SET ".
    "fecini=STR_TO_DATE('".$start_date."','%Y-%m-%d'),".
    "fecfin=STR_TO_DATE('".$end_date."','%Y-%m-%d'),".
    "horaini='".$start_hour."',".
    "horafin='".$end_hour."' WHERE ".
    "id=". $id;
} else {
    $response['msg'] = 'No se puede actualizar el evento';
};

echo json_encode($response); 

 ?>
