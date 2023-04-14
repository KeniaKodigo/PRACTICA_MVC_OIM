<?php

require "conf/database.php";

class Empleados extends Conexion{
    protected $query; //atributo me va servir para todas las consultas
    /**
     * obtener todos los empleados
     * insertar empleado
     * actualizar empleado
     * obtengamos un empleado por su id
     * eliminar empleado
     */

    #select * from empleados

    public function getQuery($consulta){
        $this->conectar();
        $this->query = mysqli_query($this->conexion, $consulta);
        return $this; //retornamos en objeto la ejecucion de la consulta que nos manda el usuario
    }
    
    #obtenemos en un arreglo la informacion de la query
    public function resultQuery(){
        /**
         * asociando la informacion de x tabla y mandamela en un arreglo
         * 
         * array("id" => 1, "nombre" => "kenia"
         *         "id" => 2, "nombre" => nn)  
         */
        return $this->query->fetch_all(MYSQLI_ASSOC); //mandamos a llamar todos los registros de la tabla
    }
    
}



?>