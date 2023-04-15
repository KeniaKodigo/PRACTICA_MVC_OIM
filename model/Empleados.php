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

    #metodos para obtener todos los empleados
    public function getQuery($consulta){
        //$consulta = "SELECT * FROM table"; //dml
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
    
    #INSERT INTO table (nombre, correo, telefono, edad, idDepartamento) VALUES ('','','');
    
    /*$dato = array(
        key           value
        "nombre" => "prueba",
        "correo" => "prueba@gmail.com",
        "telefono" => 75899
    );*/

    public function save($data){
        $this->conectar();

        #cadena para las keys
        $keys = array_keys($data); //[nombre, correo, telefono]
        #implode() => convierte un arreglo a cadena
        $keys = implode(',', $keys); //nombre, correo, telefono (string)

        #cadena para el value
        $values = array_values($data); //[prueba, prueba@gmail.com, 75899]
        $values = "'" . implode(" ', '", $values) . "'"; //'prueba', 'prueba@gmail.com', '75899'

        #INSERT INTO table (nombre, correo, telefono, edad, idDepartamento) VALUES ('','','');
        $sql = "INSERT INTO empleados ({$keys}) VALUES ({$values})";

        #ejecutamos la consulta
        $this->query = mysqli_query($this->conexion, $sql);
        #empty () => metodo para verificar si algo esta vacio o no
        if(!empty($this->query)){
            //redireccionamos a la tabla

            #header() => es un metodo que nos ayudar a redireccionar a x archivo
            header("location: index.php");
        }else{
            echo "Error al registrar el empleado";
        }
        
    }
}



?>