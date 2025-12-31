<?php
include 'connection.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $q = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $r = mysqli_query($conn,$q);

    if (mysqli_num_rows($r)==1) {
        $row = mysqli_fetch_assoc($r);
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['role']    = $row['role'];
        $_SESSION['name']    = $row['name'];

        if ($row['role']=='admin') {
            header("Location: dashboard.php");
        } else {
            header("Location: student/dashboard.php");
        }
        exit;
    } else {
        $err = "Invalid Login";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="col-md-4 mx-auto card p-4 shadow">
            <h4 class="text-center mb-3">Admin Login</h4>

            <?php if (!empty($error)) { ?>
            <div class="alert alert-danger"><?= $error ?></div>
            <?php } ?>

            <form method="post">
                <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
                <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
                <button name="login" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>


</body>

</html>