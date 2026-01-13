<?php
include 'connection.php';


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$EmailError = $PassWordErrrorSingUp = "";
$EmailSingUp = $PassWordSingUp = "";

if (isset($_POST['submit'])) {

$fname =$_POST['fname'];
$lname =$_POST['lname'];


    if (empty($username = $_POST['username'])) {
        $EmailError = 'Username is required';
    } else {
        $NameSingUp = test_input($_POST['username']);
        // cheak if name only contains letters and whitespace
        if (!filter_var($NameSingUp, FILTER_VALIDATE_EMAIL)) {
            $EmailError = "Invalid Email format";
        }
    }

    if (empty($password = $_POST['password'])) {
        $PassWordErrrorSingUp = 'Password is required';
    } else {
        $PassWordSingUp = test_input($_POST['username']);

        if (preg_match("/[0-9A-Za-z@]{6,12}$/", $PassWordErrrorSingUp)) {
            $PassWordErrrorSingUp = "the password does not meet the requirements !";
        }
    }

    $insert = "INSERT INTO `registered_user`(`fname`, `lname`, `username`, `password`) VALUES ('$fname','$lname','$username','$password')";

    $query = mysqli_query($conn, $insert) or die(mysqli_error($conn));

$_SESSION['fname'] =$fname;


  //  header("Location: http://localhost:/project-root/registration.php");


  header( "refresh:5;url=http://localhost:/project-root/user_logins.php" );

  echo '<div style="color:#fff; width:700px; height:100px; background-color:#D22B2B; position:absolute; left:50%; top:15%; transform: translate(-50%, -50%);  border-radius: 10px;"> <h2 class="display-6">You will be redirected in within 5 second do not press any key.</h2></div>';

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <style>
    .newbtn{
      margin-top: 20px;
      border: none;
      border-radius: 5px;
      padding: 15px;
      background-color: 
      #0a3e83;
      color: #fff;
    }
    input[type=text]:focus {
            font-size: 20px;
            font-weight: 900;
}
  </style>
  <script>
    function capitalizeFirstLetter() {
      const word = document.getElementById('myInput').value;
      const capitalized =
        word.charAt(0).toUpperCase() + word.slice(1);
      document.getElementById('myInput').value = capitalized;
    }

  </script>
</head>

<body>
  <div class="container text-center">
    <div class="row">
    <h1 class="display-5 text-center fw-bold">Welcome To You Computer Sikhe</h1>
      <div class="col-sm-5 col-md-6">
        <img src="regi.jpg" class="img-fluid">
      </div>
      <div class="col-sm-5 col-md-6 mt-5">
        <h1 class="display-4 mb-4">Registrations Here</h1>
        <form action="registration.php" method="POST">

          <div class="input-group mb-3">
            <span class="input-group-text">First and last name</span>
            <input type="text" aria-label="First name" class="form-control p-3" placeholder="Type Here.." name="fname"
              required onkeyup="capitalizeFirstLetter()" id="myInput">

            <input type="text" aria-label="Last name" class="form-control p-3" placeholder="Type Here.." name="lname"
              onclick="capitalizeFirstLetter()" id="myInput">
          </div>


          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Username</span>
            <input type="text" class="form-control p-3" aria-label="Sizing example input"
              aria-describedby="inputGroup-sizing-default" name="username" placeholder="Type Here..">
            <span class="error">
              <?php echo $EmailError; ?>
            </span>
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
            <input type="text" class="form-control p-3" aria-label="Sizing example input"
              aria-describedby="inputGroup-sizing-default" name="password" placeholder="Type Here..">
            <span class="error">
              <?php echo $PassWordErrrorSingUp; ?>
            </span>
          </div>

          <button type="submit" class="btn btn-primary w-100 p-3" name="submit">Registration</button>
        </form>
        <hr>
        <a href="user_logins.php"><button class="newbtn">You have already registered</button></a>
      
      </div>

    </div>
  </div>
</body>

</html>