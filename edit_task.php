<?php
include "db.php";
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$query = mysqli_query($conn, "SELECT * FROM tasks WHERE id='$id' AND user_id='$user_id'");
$task = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    mysqli_query($conn, "UPDATE tasks SET title='$title', description='$desc' WHERE id='$id'");
    header("Location: dashboard.php");
}
?>

<form method="post">
    <h2>Edit Task</h2>
    <input type="text" name="title" value="<?php echo $task['title']; ?>" required><br><br>
    <textarea name="description" required><?php echo $task['description']; ?></textarea><br><br>
    <button type="submit" name="update">Update Task</button>
</form>
