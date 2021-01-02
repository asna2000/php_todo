<?php

$host = 'localhost';
$user = 'root';
$pwd = '';
$database = 'todolist';

$conn = new mysqli($host, $user, $pwd, $database);

if ($conn->connect_errno) {
    echo "Database Failed to Connect : Error " . $conn->connect_error;
    exit();
}
