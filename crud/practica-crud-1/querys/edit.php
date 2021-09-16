<?php

require_once '../db.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM tareas WHERE id = $id";
    $result = mysqli_query($conexion, $query);

    if(mysqli_num_rows($result) === 1) {
        // echo 'tu puedes hijo';
        $row = mysqli_fetch_array($result);
        $title = $row['titulo'];
        $description = $row['descripcion'];
        // echo $title;
    }
}

// var_dump(isset($_POST['actualizar']));

if(isset($_POST['actualizar'])) {
    $id = $_GET['id'];
    $title = $_POST['titulo'];
    $description = $_POST['descripcion'];

    $query = "UPDATE tareas SET titulo = '{$title}', descripcion='{$description}' WHERE id=$id";
    mysqli_query($conexion, $query);

    session_start();
    $_SESSION['message'] = '¡Dato Actualizado!';
    $_SESSION['messageType'] = 'info';

    header("Location: ../");
}

require_once '../includes/header.php';
require_once '../includes/navigation.php';
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?= $id ?>" method="POST">
                    <div class="mb-3">
                        <label for="txtTitulo" class="form-label">Actualizar titulo</label>
                        <input type="text" class="form-control" id="txtTitulo" name="titulo" value="<?= $title ?>" autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="taTitulo" class="form-label">Actualizar Descripcion</label>
                        <textarea class="form-control" name="descripcion" id="taTitulo" rows="4"><?= $description ?></textarea></textarea>
                    </div>
                    <div class="d-grid gap-2 mb-3">
                        <button class="btn btn-outline-primary" name="actualizar">Actualizar</button>
                    </div>
                    <div class="d-grid gap-2">
                        <a class="btn btn-outline-success" href="../">Regresar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once '../includes/fooder.php'; ?>