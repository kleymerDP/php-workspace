<?php
require_once 'db.php';
require_once 'includes/header.php';
require_once 'includes/navigation.php';
?>

    <div class="container p-4">
        <div class="col-md-4">
            <div class="card card-body">
                <form action="saveTask.php" method="POST">
                    <div class="form-group mb-3">
                        <input class="form-control" type="text" name="title" id="" placeholder="task title" autofocus>
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

        <div class="col-md-8">

        </div>
    </div>

<?php 
require_once 'includes/fooder.php'; 
?>