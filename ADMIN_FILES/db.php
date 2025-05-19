<?php
$mysqli = new mysqli("localhost", "root", "", "admin");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
