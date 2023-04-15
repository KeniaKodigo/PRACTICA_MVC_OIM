<?php

require "model/Empleados.php";

class EmpleadosController{

    //metodo para generar la consulta de obtener todos los empleados
    public function all(){
        $empleado = new Empleados();
        #ejecutamos la consulta y lo retornamos en un arreglo
        return $empleado->getQuery("SELECT * FROM empleados")->resultQuery();
    }

    #metodo para generar la consulta de obtener todos los departamentos
    public function allDepartment(){
        $empleado = new Empleados();
        #ejecutamos la consulta y lo retornamos en un arreglo
        return $empleado->getQuery("SELECT * FROM departamento")->resultQuery();
    }

    #metodo para registrar el empleado
    public function registerEmployee(){
        $empleado = new Empleados();
        if(isset($_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['edad'], $_POST['departamento'])){
            return $empleado->save([
                'nombre' => $_POST['nombre'],
                'correo' => $_POST['correo'], 
                'telefono' => $_POST['telefono'],
                'edad' => $_POST['edad'],
                'idDepartamento' => $_POST['departamento']
            ]);
        }
    }
}


?>