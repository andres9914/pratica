<?php
    require_once ('config/crud.php');
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="es">
<!--Formulario de registro de nuevos usuarios-->
<head>
    <?php include ('partials/head.php') ?>
</head>

<body>
    <section>
        <div>
            <br>
            <button class="btn btn-outline-secondary" onclick="location.href='main.php' ">Volver</button>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="form-group mx-sm-3 mb-2">
                <div class="rows">
                    <form action="registro.php" id="rol-form" method="POST">
                        <input type="text" name="id" id="" placeholder="ID" class="form-control" required> <br>
                        <input type="text" name="primer_nombre" class="form-control" placeholder="Primer Nombre" required> <br>
                        <input type="text" name="segundo_nombre" class="form-control" placeholder="Segundo Nombre" required> <br>
                        <input type="email" name="email" class="form-control" placeholder="Email" required> <br>
                        <div>
                            <div id="titulos"><h3>Oficinas</h3></div>
                        <select name="oficinas" id="oficinas" class="form-control">

                            <option autofocus value="">Todas</option>
                            <?php
                                $consult = mysqli_query(conectar(),"SELECT * FROM pais");
                                    while ($fila = $consult->fetch_array()){
                        ?>
                            <option value="<?php echo $fila['id']; ?>"> <?php echo $fila['nombre']; ?> </option>
                            <?php } 

                            mysqli_free_result($fila);
                        ?>

                        </select>
                        </div> <br>
                        <div>
                            <div id="titulos"><h3>Permisos</h3></div>
                        <select name="rol" id="rol" class="form-control">

                            <option autofocus value="">Todas</option>
                            <?php
                                $consult = mysqli_query(conectar(),"SELECT * FROM permisos");
                                    while ($fila = $consult->fetch_array()){
                        ?>
                            <option value="<?php echo $fila['id']; ?>"> <?php echo $fila['tipo_rol']; ?> </option>
                            <?php } 

                            mysqli_free_result($fila);
                        ?>

                        </select>
                        </div> <br>
                        <div id="titulos"><h3>Fecha de Nacimiento</h3></div>
                        <input type="date" name="fecha_n" class="form-control" required> <br>
                        <input type="submit" class="btn btn-outline-success" value="Registrar">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
    $id = $_POST['id'];
    $pnombre = $_POST['primer_nombre'];
    $snombre = $_POST['segundo_nombre'];
    $email = $_POST['email'];
    $ofina = $_POST['oficinas'];
    $fecha_n = $_POST['fecha_n'];
    $rol = $_POST['rol'];

?>
</body>

</html>