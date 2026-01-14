<?php
include '../connection.php';

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$nameError = $passwordError = "";
$name = $pass = $invalid = "";

if (isset($_POST['submit'])) {
    // set empty validation
    if (empty($username = $_POST['username'])) {
        $nameError = "Username is required";
    } else {
        $name = test_input($_POST["username"]);
    }

    //set empty validations
    if (empty($password = $_POST['password'])) {
        $passwordError = "Password is required";
    } else {
        $pass = test_input($_POST["password"]);
    }


    $query = "SELECT * FROM registered_user WHERE username = '$username' && password = '$password' ";

    $data = mysqli_query($conn, $query);

    $total = mysqli_num_rows($data);

  

    if ($total == 1)
    {

        header("location:http://localhost/institute_admin/exam-root/dashboard.php");

    } else {
        $invalid =  "invalid User Details";
    }
    $_SESSION['fname'] =$username;

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
    .error {
        color: #FF0000;
    }

    #btn {
        width: 100%;
        background-color: #ff644d;
        padding: 12px 200px 12px 200px;
        margin-top: 10px;
        border: none;
        border-radius: 5px;
        font-size: 22px;
    }

    input[type=text]:focus {
        font-size: 20px;
        font-weight: 900;
    }
    </style>

</head>

<body>
    <div class="container">
        <div class="row">
            <h1 class="display-5 text-center fw-bold">Welcome To You Computer Sikhe</h1>
            <div class="col-sm-5 col-md-6">
                <img src="logi.jpg" class="img-fluid">
            </div>


            <div class="col-sm-5 col-md-6 mt-5">
                <h1 class="display-4 text-center">Login Here</h1><span class="error"><?php echo $invalid; ?></span>
                <form action="user_logins.php" method="POST">

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Username</span>
                        <input type="text" class="form-control p-3" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" placeholder="Type Here.." name="username">
                        <span class="error"><?php echo $nameError; ?></span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
                        <input type="text" class="form-control p-3" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" placeholder="Type Here.." name="password">
                        <span class="error"><?php echo $passwordError; ?></span>
                    </div>
                    <a href="registration.php">New User? Register Here</a>
                    <button type="submit" id="btn" name="submit">Log In</button>
                </form>
            </div>

        </div>
    </div>
</body>

</html>