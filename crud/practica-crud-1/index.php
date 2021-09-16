<?php
// require_once 'db.php';
require_once 'includes/header.php';
require_once 'includes/navigation.php';
// require_once 'querys/showTask.php';
?>

    <?php
    /*
        session_start();

        echo "<hr>";
        echo $_SESSION['mensaje'];
        echo "<hr>";
        var_dump($_SESSION['mensaje']);
        echo "<hr>";
        var_dump(isset($_SESSION['mensaje']));
        echo "<hr>";

        echo "<hr>";
        echo $_SESSION['mensajeError'];
        echo "<hr>";
        var_dump($_SESSION['mensajeError']);
        echo "<hr>";
        var_dump(isset($_SESSION['mensajeError']));
        echo "<hr>";

        session_unset();
        // session_destroy();
    */
    ?>

    <div class="container p-4">
        <div class="row">
            <div class="col-sm-4">
                <?php session_start(); if(isset($_SESSION['message'])) { ?>
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </symbol>
                </svg>
                <div class="alert alert-<?= $_SESSION['messageType'] ?> d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                        <?= $_SESSION['message'] ?>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php session_unset(); } ?>            
                <div class="card card-body">
                    <form action="querys/saveTask.php" method="POST">
                        <div class="form-group mb-3">
                            <input class="form-control" type="text" name="title" id="" placeholder="task title" autocomplete="off" autofocus>
                        </div>
                        <div class="form-group mb-3">
                            <textarea class="form-control" name="description" id="" rows="3" placeholder="Task description"></textarea>
                        </div>
                        <div class="d-grid gap-2">
                            <input class="btn btn-success" type="submit" name="save_task" value="Save Task">
                        </div>
                    </form>
                </div>
            </div>
    
            <div class="col-sm-8">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Título</th>
                            <th>Descripcion</th>
                            <th>Fecha Creación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once 'querys/showTask.php';

                        /*
                            echo "<pre>";
                            print_r($rows);
                            foreach($rows as $row) {
                                print_r($row);
                            }
                            echo "</pre>";
                        */
                        foreach($rows as $row) {
                            // print_r($row);
                            //echo $row[1];
                        ?>
                        
                            <tr>
                                <td><?= $row[1] ?></td>
                                <td><?= $row[2] ?></td>
                                <td><?= $row[3] ?></td>
                                <td>
                                    <div class="d-grid gap-2 d-md-block m-auto">
                                        <a class="btn btn-primary" href="querys/edit.php?id=<?= $row[0] ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
                                            </svg>
                                        </a>
                                        <a class="btn btn-outline-danger" href="querys/deleteTask.php?id=<?= $row[0] ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php } mysqli_close($conexion); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php
require_once 'includes/fooder.php';
?>