<?php
session_start();

// Check if the user is logged in as admin
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}

$admin_email = $_SESSION['admin_email']; // Get admin email from session
include('db.php');

// Fetch all users from 'users' table
$query = "SELECT id, username, email FROM users";
$result = $mysqli->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>Admin - Registered Users</header>
    <div class="container">
        <p>Hello, <strong><?php echo htmlspecialchars($admin_email); ?></strong>! You are logged in as the admin.</p>

        <h3>All Registered Users</h3>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>
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
