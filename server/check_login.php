<?php

    require 'conexion.php';

    $usuario =  $_POST['username'];
    $password = $_POST['password'];

    // $usuario =  'juan.gonzales@mail.com';
    // $password = 'claveacceso1';     

    $response['msg'] = msg($usuario, $password);
    
    echo json_encode($response);

    function msg($usuario, $password) {

        $con = new conectaDB('localhost','usuariodb','agenda01');

        if ($con->conectar('agenda')=='OK') {
                // $pass = password_hash('claveacceso3',PASSWORD_DEFAULT);
                // $datosUsr = $con->ejecutarQuery("INSERT INTO usuario (id,nombre,password) VALUES ('leslie.chacon@mymail.com','Leslie Chacón','".$pass."')");

                $datosUsr = $con->ejecutarQuery("SELECT id, password FROM usuario WHERE id='".$usuario."'");
                if ($datosUsr) {
                    if ($datosUsr->num_rows==0){
                        return('El usuario no existe');
                    } else {
                        $datos_Verificar = $datosUsr->fetch_assoc();
                        if (password_verify($password, $datos_Verificar['password'])) {
                            setcookie("id_agenda",$datos_Verificar['id']);
                            return('OK');
                        } else {
                            return('Usuario o password incorrectos');
                        }

                    }
                } else {
                    return('Usuario o password incorrectos');
                };
            };
    };

//};



// }

    
//     Class validarLogin {

//    // $usuario =  'juan.gonzales@mail.com';
//     // $password = 'claveaccevso1';

//     $con = new conectaDB('localhost','usuariodb','agenda01');

//     if ($con->conectar('agenda')=='OK') {
//         // $pass = password_hash('claveacceso3',PASSWORD_DEFAULT);
//         // $datosUsr = $con->ejecutarQuery("INSERT INTO usuario (id,nombre,password) VALUES ('leslie.chacon@mymail.com','Leslie Chacón','".$pass."')");

//         $datosUsr = $con->ejecutarQuery("SELECT id, password FROM usuario WHERE id='".$usuario."'");
//         if ($datosUsr) {
//             if ($datosUsr->num_rows==0){
//                 echo json_encode('El usuario no existe');
//             } else {
//                 $datos_Verificar = $datosUsr->fetch_assoc();
//                 if (password_verify($password, $datos_Verificar['password'])) {
//                     echo json_encode('OK');
//                 } else {
//                     echo json_encode('Usuario o password incorrectos');
//                 }

//             }
//         } else {
//             echo json_encode('Usuario o password incorrectos');
//         };
//     };

//     }

?>
 



