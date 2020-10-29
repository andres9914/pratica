<?php
    require_once ('config/crud.php');
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include ('partials/head.php') ?>
</head>

<body>
    <section>
        <div>
            <button class="btn btn-outline-secondary" onclick="location.href='main.php' ">Volver</button>
        </div>
    </section>
    <section>
        <div class="form-control">
            <div class="form-group mx-sm-3 mb-2">
                <div class="rows">
                    <form action="registro.php" class="rol-form" method="POST">
                        <input type="text" name="ID" id="" placeholder="ID" class="form-control" required>
                        <input type="text" name="primer_nombre" id="" placeholder="Primer Nombre" required>
                        <input type="text" name="segundo_nombre" id="" placeholder="Segundo Nombre" required>
                        <input type="email" name="email" id="" placeholder="" required>
                        <select name="oficinas" id="oficinas" class="form-control">

                            <option autofocus value="">Todas</option>
                            <?php
                                $consult = mysqli_query($connect,"SELECT * FROM pais");
                                    while ($fila = $consult->fetch_array()){
                        ?>
                            <option value="<?php echo $fila['ID']; ?>"> <?php echo $fila['nombre']; ?> </option>
                            <?php } 

                            mysqli_free_result($fila);
                        ?>

                        </select>
                        <select name="rol" id="rol">

                            <option autofocus value="">Todas</option>
                            <?php
                                $consult = mysqli_query($connect,"SELECT * FROM permisos");
                                    while ($fila = $consult->fetch_array()){
                        ?>
                            <option value="<?php echo $fila['ID']; ?>"> <?php echo $fila['tipo_rol']; ?> </option>
                            <?php } 

                            mysqli_free_result($fila);
                        ?>

                        </select>
                        <input type="date" name="fecha-n" id="" placeholder="" required>
                        <input type="submit" class="btn btn-outline-success" value="Registrar">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
    $id = $_POST['ID'];
    $pnombre = $_POST['primer_nombre'];
    $snombre = $_POST['segundo_nombre'];
    $email = $_POST['email'];
    $ofina = $_POST['oficinas'];
    $fecha_n = $_POST['fecha-n'];
    $rol = $_POST['rol'];

?>
</body>

</html>