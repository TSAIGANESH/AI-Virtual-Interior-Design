<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}

$admin_email = $_SESSION['admin_email'];  // Get admin email from session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to the modern CSS -->
</head>
<body>
    <header>Admin Dashboard</header>
    <div class="container">
        <h2>Welcome, Boss</h2>
        <p>Hello, <strong><?php echo htmlspecialchars($admin_email); ?></strong>! You are logged in as the admin.</p>

        <h3>Dashboard Options</h3>
        <a href="view_users.php" class="btn">View Users</a>
        <a href="view_login_logs.php" class="btn">View Login Logs</a>

        <form action="logoutAdmin.php" method="POST" style="margin-top: 20px;">
            <button type="submit">Logout</button>
        </form>
    </div>
</body>
</html>
