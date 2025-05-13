<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "ADMIN";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = trim($_POST["username"]);
$email = trim($_POST["email"]);
$password = trim($_POST["password"]);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format.";
    exit;
}

if (!preg_match("/@gmail\.com$/", $email)) {
    echo "Only Gmail addresses are allowed.";
    exit;
}

if (strlen($password) < 8) {
    echo "Password must be at least 8 characters.";
    exit;
}

// Hash the password before storing
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Check for duplicate email
$check = $conn->prepare("SELECT id FROM users WHERE email = ?");
$check->bind_param("s", $email);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    echo "Email already registered.";
} else {
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashedPassword);
    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$check->close();
$conn->close();
?>
