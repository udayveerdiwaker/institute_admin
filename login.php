<?php
session_start();
require 'connection.php';

// If already logged in
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: dashboard.php");
    exit;
}

$error = '';

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validate from database
    $sql = "SELECT * FROM admin_users WHERE username = ? AND password = MD5(?) LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <style>
        body { background:#f5f5f5; font-family:Arial; }
        .login-box {
            width: 350px;
            margin: 120px auto;
            background:#fff;
            padding:25px;
            border-radius:8px;
            box-shadow:0 0 10px rgba(0,0,0,.2);
        }
        input { width:100%; padding:12px; margin:8px 0; }
        button { width:100%; padding:12px; background:#333; color:#fff; border:none; cursor:pointer; }
        button:hover { background:#111; }
        .error { color:red; margin-top:10px; }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Admin Login</h2>

    <?php if ($error): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>

    <form method="post">
        <input type="text" name="username" placeholder="Enter Username" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <button type="submit" name="login">Login</button>
    </form>
</div>

</body>
</html>
