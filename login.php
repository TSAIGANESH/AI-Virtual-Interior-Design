<?php
session_start();

header("Content-Type: application/json");

$host = "localhost";
$user = "root";
$password = "";
$dbname = "ADMIN";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Database connection failed."]);
    exit;
}

$email = trim($_POST["email"] ?? '');
$password = trim($_POST["password"] ?? '');

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(["status" => "error", "message" => "Invalid email format."]);
    exit;
}

$stmt = $conn->prepare("SELECT id, username, password, photo FROM users WHERE email = ?");
if (!$stmt) {
    echo json_encode(["status" => "error", "message" => "Query prepare failed."]);
    exit;
}

$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows == 1) {
    $stmt->bind_result($id, $username, $hashedPassword, $photoPath);
    $stmt->fetch();

    if (password_verify($password, $hashedPassword)) {
        $_SESSION["user_id"] = $id;
        $_SESSION["username"] = $username;
        $_SESSION["email"] = $email;
        $_SESSION["photo"] = $photoPath;

        // Handle photo upload if exists
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
            $uploadDir = "profile_photos/";
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $ext = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
            $filename = "user_{$id}_" . time() . "." . $ext;
            $targetFile = $uploadDir . $filename;

            if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile)) {
                $photoPath = $targetFile;

                $updatePhoto = $conn->prepare("UPDATE users SET photo = ? WHERE id = ?");
                if ($updatePhoto) {
                    $updatePhoto->bind_param("si", $photoPath, $id);
                    $updatePhoto->execute();
                    $updatePhoto->close();
                    $_SESSION["photo"] = $photoPath;
                }
            }
        }

        // Insert login log
        $logStmt = $conn->prepare("INSERT INTO login_logs (user_id, email) VALUES (?, ?)");
        if ($logStmt) {
            $logStmt->bind_param("is", $id, $email);
            $logStmt->execute();
            $logStmt->close();
        }

        echo json_encode([
            "status" => "success",
            "username" => $username,
            "email" => $email,
            "photo" => $photoPath
        ]);
    } else {
        echo json_encode(["status" => "error", "message" => "Incorrect password."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Email not registered."]);
}

$stmt->close();
$conn->close();
?>
