<?php
session_start();

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'student') {
        header("Location: dashboard");
    }
    elseif ($_SESSION['role'] == 'exam_admin') {
        header("Location: admin/dashboard");
    }
    elseif ($_SESSION['role'] == 'exam_user') {
        header("Location: exam-root/dashboard");
    }
    exit;
}

$username_cookie = $_COOKIE['login_user'] ?? '';
?>


<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
</head>

<body class='bg-light'>

    <div class='container mt-5' style='max-width:450px;'>
        <div class='card shadow p-4'>
            <h3 class='text-center mb-3'>Admin Login</h3>

            <?php if ( isset( $_GET[ 'error' ] ) ) {
    ?>
            <div class='alert alert-danger'>
                <?php echo htmlspecialchars( $_GET[ 'error' ] ) ?>
            </div>
            <?php }
    ?>

            <form method='POST' action='check_login'>
                <div class='mb-3'>
                    <label class='form-label'>Username</label>
                    <input required type='text' name='username' class='form-control'
                        value="<?= htmlspecialchars($username_cookie) ?>">
                </div>

                <div class='mb-3'>
                    <label class='form-label'>Password</label>
                    <input required type='password' name='password' class='form-control'>
                </div>

                <div class='form-check mb-3'>
                    <input class='form-check-input' type='checkbox' name='remember' id='remember'>
                    <label class='form-check-label' for='remember'>Remember Me</label>
                </div>

                <button class='btn btn-primary w-100'>Login</button>
            </form>
        </div>
    </div>

</body>

</html>