<?php

include_once "datosConexion.php";

// conexion
class Conexion {
    function conectar() {
        try {
            // $conexion = new PDO("mysql:host=" . SERVER . ";dbname=" . DBNAME, USERNAME, PASSWORD);
            $conexion = new PDO("pgsql:host=" . SERVER . ";port=5432;dbname=" . DBNAME, USERNAME, PASSWORD);
            return $conexion;            
        } catch (Exception $error) {
            die("Error de conexion : {$error -> getMessage()}");
        }
    }
}