<?php
session_start();

// Check if the user is logged in as admin
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}

$admin_email = $_SESSION['admin_email'];
include('db.php');

// Fetch login logs
$query = "SELECT id, user_id, email, login_time FROM login_logs";
$result = $mysqli->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Logs</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>Admin - Login Logs</header>
    <div class="container">
        <p>Hello, <strong><?php echo htmlspecialchars($admin_email); ?></strong>! You are logged in as the admin.</p>

        <h3>Login Logs</h3>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Email</th>
                    <th>Login Time</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['login_time']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <div style="margin-top: 20px;">
            <a href="admin_dashboard.php" class="btn">Back to Dashboard</a>
            <form action="logoutAdmin.php" method="POST" style="display: inline;">
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>
