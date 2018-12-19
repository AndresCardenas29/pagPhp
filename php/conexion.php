<?php
    //conectar a base de datos
    $dbhost	= "localhost";	   // localhost or IP
    $dbuser	= "root";		  // database username
    $dbpass	= "";		     // database password
    $dbname	= "prueba";    // database name

    $conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
?>