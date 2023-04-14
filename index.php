<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php
        require "./conf/prueba.php";

        $emp = new Prueba();
        print_r($emp->obtenerEmpleados());
        $dat = $emp->obtenerEmpleados();
        /*foreach($dat as $value){
            echo $dat['nombre'];
        }*/

?>
    <div class="container">
        <h1 class="text-center">Lista de Empleados</h1>
        
        <table class="table table-hover">
            <thead>
                <th>N°</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Edad</th>
                <th>Departamento</th>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</body>
</html>