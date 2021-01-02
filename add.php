<?php
include_once("connection.php");

//ini adalah code untuk detect input dan save to database
if (isset($_POST['btnAdd'])) {
    $task = mysqli_real_escape_string($conn, $_POST['task']);


    $insert = "INSERT INTO tasks (task, status) VALUES ('{$task}', 0)";
    if ($conn->query($insert) === TRUE) {
        echo "<script>alert('Task Added Successfully')</script>";
        header("Location: index.php");
    } else {
        echo "Error : " . $insert . "<br>" . $conn->error;
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
</head>

<body>
    <!-- A grey horizontal navbar that becomes vertical on small screens -->
    <nav class="navbar navbar-expand-sm bg-dark">

        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
        </ul>

    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body table-responsive">

                        <h1>Add Task</h1>
                        <hr>
                        <form method="post">
                            <div class="form-group">
                                <input class="form-control" type="text" name="task" placeholder="Task" required>
                                <br>
                                <button class="btn btn-info float-right" type="submit" name="btnAdd">Add Task</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>