<?php
include_once "connection.php";

if (isset($_POST['btnDel'])) {
    $task_id = mysqli_real_escape_string($conn, $_POST['task_id']);

    $delete = "DELETE FROM tasks WHERE id='{$task_id}'";
    if ($conn->query($delete) === FALSE) {
        echo "Error : " . $delete . "<br>" . $conn->error;
    }
}

if (isset($_POST['btnDone'])) {
    $task_id = mysqli_real_escape_string($conn, $_POST['task_id']);

    $update = "UPDATE tasks SET status=1 WHERE id='{$task_id}'";
    if ($conn->query($update) === FALSE) {
        echo "Error : " . $update . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Todo List</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body table-responsive">

                        <h1>PHP TODO LIST<span class="float-right"><a class="btn btn-primary" href="add.php"><i class='fa fa-plus'></i> Add Task</a></span></h1>
                        <hr>
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th>Task</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $getTasks = "SELECT * FROM tasks";
                                $tasks = $conn->query($getTasks);

                                if ($tasks->num_rows > 0) {
                                    while ($row = $tasks->fetch_assoc()) {
                                ?>
                                        <tr>
                                            <td>
                                                <?php
                                                if ($row['status'] == 0) {
                                                ?>
                                                    <?= $row['task'] ?>
                                                <?php
                                                } else {
                                                ?>
                                                    <del><?= $row['task'] ?></del>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <form method="post">
                                                    <input type="hidden" name="task_id" value="<?= $row['id'] ?>">

                                                    <button type="submit" name="btnDone" class="btn btn-success"><i class='fa fa-check'></i></button>
                                                </form>
                                                <form method="post">
                                                    <input type="hidden" name="task_id" value="<?= $row['id'] ?>">

                                                    <button type="submit" name="btnDel" class="btn btn-danger"><i class='fa fa-trash'></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="2">No Task Yet</td>
                                    </tr>
                                <?php
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>