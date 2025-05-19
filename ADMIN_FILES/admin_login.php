<?php
session_start();
include('db.php');

// Handle login form submission
if (isset($_POST['admin_email'], $_POST['admin_password'])) {
    $email = $_POST['admin_email'];
    $password = $_POST['admin_password'];

    $stmt = $mysqli->prepare("SELECT id, password FROM admin_track WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($admin_id, $hashed_pw);
        $stmt->fetch();

        if ($password === $hashed_pw) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_email'] = $email;
            $_SESSION['admin_id'] = $admin_id;

            header("Location: admin_dashboard.php");
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "No admin found with this email.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('admin_background.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .container {
            width: 400px;
            background: rgba(255, 255, 255, 0.92);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            transition: border 0.3s;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #667eea;
            outline: none;
        }

        .btn {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            color: white;
            background: linear-gradient(to right, #667eea, #764ba2);
            transition: background 0.3s ease-in-out;
        }

        .btn:hover {
            background: linear-gradient(to right, #764ba2, #667eea);
        }

        .error-message {
            color: red;
            margin-bottom: 15px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Admin Login</h2>

        <?php if (isset($error)): ?>
            <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="admin_email">Email</label>
                <input type="email" id="admin_email" name="admin_email" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label for="admin_password">Password</label>
                <input type="password" id="admin_password" name="admin_password" placeholder="Enter your password" required>
            </div>

            <input type="submit" value="Login" class="btn">
        </form>
    </div>
</body>
</html>
