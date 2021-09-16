<?php

require_once '../db.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM tareas WHERE id = $id";
    $deleteAction = mysqli_query($conexion, $query);

    if(!$deleteAction) {
        die('Query failed');
    }

    session_start();
    $_SESSION['message'] = 'Tarea eliminada correctamente';
    $_SESSION['messageType'] = 'danger';
    
    header("Location: ../");
}