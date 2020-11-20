<?php 
include ('config/crud.php');
//session_start();
//error_reporting(0);
?>
<!DOCTYPE html>
<html lang="es">
<!--menu o ventana principoal-->
<head>
    <?php include ('partials/head.php');  ?>
</head>

<body>
    <section class="form-group" style="padding: 20px">
        <!-- menu superior -->
        <div class="input-group-mb-3">
            <button class="btn btn-outline-primary" onclick="location.href='registro.php' ">Agregar Usuario</button>
            <br><br>
            <button class="btn btn-outline-danger" onclick="location.href='logout.php' ">Cerrar Sesion</button>
        </div>
        <!-- fin menu superior -->
        <!--filtrador-->
        <div class="col-sm-10">
            <br>
            <form action="" method="GET">
                <label for="filtro">Filtro por Oficinas</label>
                <select name="filtro" id="filtro" class="form-control form-control-sm">

                    <option value="">Todas</option>
                    <?php
                    $consult = mysqli_query(conectar(),"SELECT * FROM pais");
                        while ($fila = $consult->fetch_array()){
                ?>
                    <option value="<?php echo $fila['id']; ?>"> <?php echo $fila['nombre']; ?> </option>
                    <?php } 
                        
                    ?>

                </select> <br>
                <a href="main.php?"><button class="btn btn-outline-info" type="submit">Filtrar</button></a>
            </form>
        </div>
        </div>
        <!--fin del filtrador-->
    </section>
    <section>
        <!--tabla datos-->
        <div class="container">
            <table class="table">
                <?php 
                
////// variables de consulta /////
    $where = null;
    $filtro = $_GET['filtro'] ;
///// ejecucion de filtro //////
        if (isset($_GET['filtro'])){
            if(!empty($_GET['filtro'])){
                $where = " WHERE oficinas_id ='".$filtro."' ";
            }   
        }else{
            $where = "";
        }

?>
                <thead>

                    <tr>
                        <th>Id</th>
                        <th>Primer nombre</th>
                        <th>Segundo nombre</th>
                        <th>Edad</th>
                        <th>Email</th>
                        <th>Oficina</th>
                        <th>Rol</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
    $querydatos = mysqli_query(conectar(),"SELECT * FROM usuarios $where");

    while ($value = $querydatos->fetch_assoc()) {
    //uso de una funcion de php para extraer la posicion solo del año capturado 
    $fecha = substr($value['fecha_n'],0,-6);
    $año = 2020;
    //resta del año actual con el año de nacimiento
    $edad = $año - $fecha;
?>
                    <tr>
                        <td><?php  echo $value['id']; ?></td>
                        <td><?php  echo $value['primer_nombre']; ?></td>
                        <td><?php  echo $value['segundo_nombre']; ?></td>
                        <td><?php  echo $edad; ?></td>
                        <td><?php  echo $value['email']; ?></td>
                        <td><?php  echo $value['oficinas_id']; ?></td>
                        <td><?php  echo $value['permisos_id']; ?></td>
                    </tr>
                    <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                    <?php
     }    
            ?>

                </tbody>
            </table>
        </div>
        <!--fin tabla datos-->
    </section>
    <div class="form-group">
        <a href="main.php?suspender=suspender"><input type="submit" class="btn btn-danger" value="Suspender Cuenta"></a>
        <a href="main.php?activar=activar"><input type="button" class="btn btn-success" value="Restablecer Cuenta"></a>
        <a href="main.php?cuenta=rol"><input type="button" class="btn btn-primary" value="Cambiar Rol"></a>
    </div>

    <div class="form-group">
        <div class="group form">
            <?php
           if (isset($_GET['suspender'])) {
                    if (!empty($_GET['suspender'])) {
                        
                    
               ?>
            <div class="col-sm-10">
                <form action="" method="GET">
                    <label for="selectsuspender">Cuenta a suspender</label>
                    <select name="" id="selectsuspender" class="form-control form-control-sm ">
                        <option value="">Usuarios:</option>
                        <?php
                        $sqlusuario = mysqli_query(conectar(),"SELECT * FROM usuarios");
                        while($valor = $sqlusuario->fetch_array()){   
                    ?>
                        <option value="<?php echo $valor['id'] ?>">
                            <?php echo $valor['id']." ".$valor['primer_nombre']." ".$valor['segundo_nombre'] ?></option>
                        <?php }  ?>
                    </select> <br>
                    <a href="main.php?cuenta=<?php echo $valor['id'] ?>">
                        <button onclick="return suspender()" class="btn btn-outline-primary">Confirmar</button>
                    </a>
                </form>
            </div>
            <?php 
                } 
           }else if(isset($_GET['activar'])){
                    if (!empty($_GET['activar'])){
                    ?>
            <div class="col-sm-10">
                <form action="" method="GET">
                    <label for="selectactivar">Cuenta a activar</label>
                    <select name="" id="selectactivar" class="form-control form-control-sm ">
                        <option value="">Usuarios:</option>
                        <?php
                        $sqlusuario = mysqli_query(conectar(),"SELECT * FROM usuarios");
                        while($valor = $sqlusuario->fetch_array()){   
                    ?>
                        <option value="<?php echo $valor['id'] ?>">
                            <?php echo $valor['primer_nombre']." ".$valor['segundo_nombre'] ?></option>
                        <?php }  ?>
                    </select> <br>
                    <a href="main.php?cuenta=<?php echo $valor['id'] ?>">
                        <button onclick="return activar()" class="btn btn-outline-primary">Confirmar</button>
                    </a>
                </form>
            </div>
            <?php
                }
           } 
        ?>
        </div>
    </div>
</body>
<script type="text/javascript">
function suspender() {
    var respuesta = confirm("¿ Suspender esta cuenta ?");
    if (respuesta == true) {
        return true
    } else {
        return false
    }
}

function activar() {
    var respuesta = confirm("¿ activar esta cuenta ?");
    if (respuesta == true) {
        return true
    } else {
        return false
    }
}
</script>
<?php include ('partials/footer.php'); ?>

</html>