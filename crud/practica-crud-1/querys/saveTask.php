<?php

require_once '../db.php';

if (isset($_POST['save_task'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "INSERT INTO tareas(titulo, descripcion) VALUES ('$title', '$description')";
    
    $result = mysqli_query($conexion, $query);
    
    if (!$result) {
        die("Query falled");
    } 
           
    session_start();
    $_SESSION['message'] = "Tarea guardada correctamente";
    $_SESSION['messageType'] = "success";
    //{si funciona :V} (!$result) ? $_SESSION['mensajeError'] = 'ERROR CONEXION: Tarea no guardada' : $_SESSION['mensaje'] = 'Tarea guardada correctamente';

    // echo "guardado";
    header("Location: ../");

}