<?php

class conectaDB {

    private $conexion;
    private $host;
    private $user;
    private $password;

    function __construct($host, $user, $password){
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
    }

    function conectar($nombre_db){
        
        $this->conexion = new mysqli($this->host, $this->user, $this->password, $nombre_db);
        if ($this->conexion->connect_error) {
          return "Error:" . $this->conexion->connect_error;
        }else {
          return "OK";
        }
      }

    function ejecutarQuery($query){
        return $this->conexion->query($query);
      }

    function borrarEvento($idEvento, $idUsuario){

        $datosUsr = $this.ejecutarQuery('DELETE from evento WHERE id='.$idEvento.' AND idUsuario='.$idUsuario);

    }

}

?>