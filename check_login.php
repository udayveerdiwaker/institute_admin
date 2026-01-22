<?php
session_start();
include 'connection.php';

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = $_POST['password'];

$sql = "SELECT * FROM admin_users WHERE username='$username' LIMIT 1";
$res = mysqli_query($conn, $sql);

if ($res && mysqli_num_rows($res) == 1) {

    $row = mysqli_fetch_assoc($res);

    if (hash('sha256', $password) === $row['password']) {

        $_SESSION['user_id']   = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['role']     = $row['role'];

        if (isset($_POST['remember'])) {
            setcookie("login_user", $row['username'], time() + (86400 * 30), "/");
            setcookie("login_role", $row['role'], time() + (86400 * 30), "/");
        }

        if ($row['role'] == 'student') {
            header("Location: dashboard");              // ROOT
        }
        elseif ($row['role'] == 'exam_admin') {
            header("Location: admin/dashboard");       // ADMIN
        }
        elseif ($row['role'] == 'exam_user') {
            header("Location: exam-root/dashboard");        // EXAM USER
        }
        exit;
    }
}

header("Location: login?error=Invalid Username or Password");
exit;