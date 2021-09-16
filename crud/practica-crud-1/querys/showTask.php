<?php

require_once './db.php';

$query = "SELECT * FROM tareas";
$resultTasks = mysqli_query($conexion, $query);

$rows = mysqli_fetch_all($resultTasks);