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

    #metodo para generar una consulta que lleve la informacion de un empleado en especifico
    public function find($id){
        $this->conectar();
        $sql = "SELECT *, empleados.Id AS idEmpleado, departamento.Nombre AS departamento FROM empleados INNER JOIN departamento ON empleados.idDepartamento = departamento.Id WHERE empleados.Id = $id";
        $this->query = mysqli_query($this->conexion, $sql);
        return $this->query;
    }

    #metodo para actualizar empleado
    public function update($id, $data){
        $this->conectar();
        #update empleados set nombre = 'Juana', correo = '', telefono = ''  where id = 1;
        $array = [];

        /**
         * $data = array("nombre" => "adonay")
         */
        foreach($data as $key => $value){
            $array[] = "{$key} = '{$value}'";
        }
        /**
         * $array = ["nombre" => 'adonay'
         *           "correo" => 'adonay@gmail.com']
         */

        #convertir un arreglo a cadena
        $array = implode(', ', $array); //[1,2,3] = 1-2-3 => nombre = 'adonay', correo = 'adonay@gmail.com'

        $sql = "UPDATE empleados SET {$array}  where Id = $id";
        $this->query = mysqli_query($this->conexion, $sql);
        if(!empty($this->query)){
            //redireccionamos a la tabla

            #header() => es un metodo que nos ayudar a redireccionar a x archivo
            header("location: index.php");
        }else{
            echo "Error al actualizar el empleado";
        }

    }

    public function delete($id){
        $this->conectar();
        $sql = "DELETE FROM empleados WHERE id = $id";
        $this->query = mysqli_query($this->conexion, $sql);
        return $this->query;
    }
}



?>