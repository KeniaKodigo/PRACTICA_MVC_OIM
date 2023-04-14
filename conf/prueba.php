<?php

require "database.php";

class Prueba extends Conexion{
    
    public function obtenerEmpleados(){
        #metodo que nos conecta a la base de datos
        $this->conectar();
        $query = "SELECT * FROM empleados";
        /**
         * 2 parametro
         * 1parametro = informacion de la bd
         * 2parametro = consulta sql
         */

        #mysqli_query = ejecuta la consulta de sql, pidiendo la informacion de la bd
        $resultado = mysqli_query($this->conexion, $query);
        return $resultado;

    }
    
}


?>