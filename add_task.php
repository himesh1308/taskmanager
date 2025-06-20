<?php
include "db.php";
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $user_id = $_SESSION['user_id'];

    $query = "INSERT INTO tasks (user_id, title, description) VALUES ('$user_id', '$title', '$desc')";
    mysqli_query($conn, $query);
    header("Location: dashboard.php");
}
?>

<form method="post">
    <h2>Add Task</h2>
    <input type="text" name="title" placeholder="Task Title" required><br><br>
    <textarea name="description" placeholder="Task Description" required></textarea><br><br>
    <button type="submit" name="add">Add Task</button>
</form>
