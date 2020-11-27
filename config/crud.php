<?php
/*
    $host = "localhost";
    $user = "root";
    $password = "1234";
    $dbname= "competencia";

    $connect = mysqli_connect($host,$user,$password,$dbname) or die ("Problemas al Conectar");
    mysqli_select_db($connect,$dbname)or die ("problemas al conectar con la base de datos");
*/
 function conectar (){
        $conexion = new mysqli ('localhost','root','1234','competencia');
         if ($conexion-> connect_error){
             die('error de conexion('.$conexion-> connect_error.')'.$conexion-> connect_error);
         }
         return $conexion;
     }

