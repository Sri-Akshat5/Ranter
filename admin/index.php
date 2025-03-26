<?php
include '../config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Fetch user details from the database
    $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

   
    if ($user && $password === $user['password']) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: dashboard.php');
        exit();
    } else {
        $error_message = "❌ Invalid credentials. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Login | Feedback System</title>
    <style>
        /* Body Styling */
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(to right, #1e3c72, #2a5298);
            font-family: 'Arial', sans-serif;
            color: #fff;
        }

        /* Container Styling */
        .login-container {
            background: rgba(0, 0, 0, 0.7);
            padding: 50px;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.5);
            text-align: center;
            max-width: 400px;
            width: 100%;
            animation: fadeIn 1s ease-in-out;
        }

        /* Header Styling */
        h2 {
            margin-bottom: 30px;
            font-size: 32px;
            letter-spacing: 1.5px;
        }

        /* Input Styling */
        .input-field {
            width: 100%;
            padding: 14px;
            margin: 12px 0;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            background: #ffffff;
            color: #000;
            transition: all 0.3s ease;
        }

        .input-field:focus {
            outline: none;
            box-shadow: 0 0 10px #4CAF50;
        }

        /* Button Styling */
        .login-btn {
            width: 100%;
            padding: 14px;
            margin-top: 20px;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            background: #4CAF50;
            color: white;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .login-btn:hover {
            background: #45a049;
        }

        /* Error Message Styling */
        .error {
            color: #FF4C4C;
            margin-bottom: 20px;
        }

        /* Footer Link */
        .back-link {
            display: block;
            margin-top: 20px;
            color: #4CAF50;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: #66FF66;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2>🔐 Admin Login</h2>

        <!-- Error Message -->
        <?php if (isset($error_message)) : ?>
            <p class="error"><?php echo htmlspecialchars($error_message); ?></p>
        <?php endif; ?>

        <!-- Login Form -->
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" class="input-field" required>
            <input type="password" name="password" placeholder="Password" class="input-field" required>
            <button type="submit" class="login-btn">Login</button>
        </form>

        <a href="../home.php" class="back-link">← Back to Home</a>
    </div>

</body>

</html>
