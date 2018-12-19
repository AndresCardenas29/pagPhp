<?php

include 'conexion.php';
$consulta = '';

if($conexion->connect_errno){
    echo 'Error en la conexión';
    exit;
}

function mostrarDatos(){
    global $conexion, $consulta;
    $sql = 'SELECT * FROM usuario';
    return $conexion->query($sql);
}

function insertar($nombre, $contrasena, $foto){
    global $conexion;
    $sql = "INSERT INTO usuario (nombre, pass, foto) VALUES ('{$nombre}','{$contrasena}','{$foto}')";
    $conexion->query($sql);
}

function actualizarNombre($id, $nombre){
    global $conexion;
    $sql = "UPDATE tabla SET nombre='$nombre' 
    WHERE id='$id'";
    $conexion->query($sql);
}

function actualizarContrasena($id, $contrasena){
    global $conexion;
    $sql = "UPDATE tabla SET contrasena='$contrasena' 
    WHERE id='$id'";
    $conexion->query($sql);
}

function actualizarFoto($id, $foto){
    global $conexion;
    $sql = "UPDATE tabla SET foto='$foto' 
    WHERE id='$id'";
    $conexion->query($sql);
}

?>