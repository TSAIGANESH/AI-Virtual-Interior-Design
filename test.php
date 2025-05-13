<?php
echo "Hello from test.php";
?>
<?php
error_reporting(E_ALL); 
ini_set('display_errors', 1);

$servername = "localhost";  // Change this if you're using a different server
$username = "root";         // Your database username
$password = "";   // Your database password
$dbname = "admin";          // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully to the database!";
}
?>
