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
        require "./controller/EmpleadosController.php";
        $empleado = new EmpleadosController();
        $departamentos = $empleado->allDepartment();
    ?>
    <div class="container">
    <form action="" method="POST">
        <label for="">Nombre Completo</label>
        <input type="text" class="form-control" name="nombre">

        <label for="">Correo</label>
        <input type="email" class="form-control" name="correo">

        <label for="">Telefono</label>
        <input type="number" class="form-control" name="telefono">

        <label for="">Edad</label>
        <input type="number" class="form-control" name="edad">

        <label for="">Seleccione Departamento</label>
        <select name="departamento" id="" class="form-control">
            <?php
                foreach($departamentos as $value){
            ?>
                <option value="<?php echo $value['Id'];  ?>"><?php echo $value['Nombre']; ?></option>
            <?php
                }
            ?>
        </select>

        <input class="btn btn-success" type="submit" name="guardar" value="Registrar Empleado">

    </form>
    <?php
        $empleado->registerEmployee();
    ?>
    </div>
</body>
</html>