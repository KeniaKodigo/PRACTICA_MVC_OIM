<?php

/**
 * PDO 
 * mysqli
 */

class Conexion{
    protected $conexion;

    public function conectar(){
        /**
         * nombre de db
         * servidor
         * usuario y contraseña
         */

        $this->conexion = mysqli_connect("localhost","root","","empleadosdb");
    }


}

?>