<?php
include "db.php";
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$result = mysqli_query($conn, "SELECT * FROM tasks WHERE user_id = '$user_id'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

    <h2>Welcome, <?php echo $_SESSION['user_name']; ?>!</h2>
    <p>
        <a href="add_task.php">+ Add Task</a> |
        <a href="logout.php">Logout</a>
    </p>

    <h3>Your Tasks</h3>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo htmlspecialchars($row['title']); ?></td>
            <td><?php echo htmlspecialchars($row['description']); ?></td>
            <td>
                <a href="edit_task.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <a href="delete_task.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete this task?');">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>
