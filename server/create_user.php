<?php

    require 'conexion.php';

    $con = new conectaDB('localhost','usuariodb','agenda01');

    if ($con->conectar('agenda')=='OK') {

        $datos_Usr = $con->ejecutarQuery("INSERT INTO usuario (id, nombre, password)
                                         VALUES ('juan.gonzales@mail.com',
                                         'Juan Gonzales',".
                                         "'".password_hash('claveacceso1',PASSWORD_DEFAULT)."')");

       $datos_Usr = $con->ejecutarQuery("INSERT INTO usuario (id, nombre, password)
                                         VALUES ('martha.juarez@cloud.com',
                                         'Marta Gonzales',".
                                         "'".password_hash('claveacceso2',PASSWORD_DEFAULT)."')");
                                         
        $datos_Usr = $con->ejecutarQuery("INSERT INTO usuario (id, nombre, password)
                                         VALUES ('leslie.chacon@mymail.com',
                                         'Leslie Chacón',".
                                         "'".password_hash('claveacceso3',PASSWORD_DEFAULT)."')");

        echo 'Usuarios creados';


    } else {
        echo 'Ocurrió un error';

    };



 ?>
