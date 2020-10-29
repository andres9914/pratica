<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname= "competencia";

    $connect = mysqli_connect($host,$user,$password,$dbname) or die("Problemas al Conectar");
    mysqli_select_db($connect,$dbname)or die("problemas al conectar con la base de datos");