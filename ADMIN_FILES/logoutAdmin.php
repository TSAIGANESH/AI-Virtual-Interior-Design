<?php
session_start();

// Destroy all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to admin login page
header("Location: admin_login.php");
exit();
?>
