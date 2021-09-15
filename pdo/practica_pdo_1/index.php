<?php

require_once 'conexion.php';

$objConexion = new Conexion;
$conexion = $objConexion -> conectar();

$consulta = "SELECT * FROM tb_usuarios";
$resultado = $conexion -> prepare($consulta);
$resultado -> execute();

$datos = $resultado -> fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($datos);
echo "</pre>";

foreach ($datos as $dato) {
    echo $dato['nombre'] . "<br>";
}
