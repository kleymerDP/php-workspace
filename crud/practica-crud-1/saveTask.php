<?php

require_once 'db.php';

if (isset($_POST['save_task'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "INSERT INTO tareas(title, description) VALUES ('$title', '$description')";
    
    $result = mysqli_query($conexion, $query);

    if (!$result) {
        die("Query falled");
    }

    // echo "guardado";
    header("Location: ./");

}