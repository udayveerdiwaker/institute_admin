<?php
include 'connection.php';

if (isset($_POST['submit'])) {
  $result = $_POST['score'] = $_SESSION['score'];
  $username = $_POST['fname'] = $_SESSION['fname'];
  $insert = "INSERT INTO `result`(`student_name`, `student_marks`)  VALUES ('$username','$result' )";

  $query = mysqli_query($conn, $insert) or die(mysqli_error($conn));

  if ($query) {
    echo '<script>alert("Thank You")</script>';
  } else {
    echo "Connection faild" . mysqli_connect_error();
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .container{
      background-image: url("video.mp4");
    }
    body {
      background-image: url('bg.svg');
      background-repeat: no-repeat;
      background-size: cover;
    }
    button{
      width: 150px;
    }
    #btn{
      background-color: #77b1b9;
      padding: 0.5rem;
      border-radius: 10px;
      border: none;
      color: white;
    }
    #btn:hover{
      background-color: #537b81;
    }
    #btnbtn{
      background-color: #92c0c7;
      padding: 0.5rem;
      border-radius: 10px;
      border: none;
      color: white;
    }
    #btnbtn:hover{
      background-color: #537b81;
    }
    h2{
      color: #77b1b9;
    }
  </style>
  <script>
var duration = 15 * 1000;
var animationEnd = Date.now() + duration;
var defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 0 };

function randomInRange(min, max) {
  return Math.random() * (max - min) + min;
}

var interval = setInterval(function() {
  var timeLeft = animationEnd - Date.now();

  if (timeLeft <= 0) {
    return clearInterval(interval);
  }

  var particleCount = 50 * (timeLeft / duration);
  // since particles fall down, start a bit higher than random
  confetti({ ...defaults, particleCount, origin: { x: randomInRange(0.1, 0.3), y: Math.random() - 0.2 } });
  confetti({ ...defaults, particleCount, origin: { x: randomInRange(0.7, 0.9), y: Math.random() - 0.2 } });
}, 250);


  </script>
</head>

<body>
  <div class="container">

    <div>
      <h2 class="display-3 text-center mt-5 fw-bold">Your Result</h2>
    </div>
    <div>
      <p class="display-6 text-center">Congratulation <?php echo  $_SESSION['fname'] ?> You have Completed This Test Successfully.</p>

      <p class="display-6 text-center">Your <strong>Score</strong> is <?php echo $_SESSION['score']; ?></p>

      <div class="d-flex justify-content-center">
        <form action="final.php" method="POST">
          <button type="submit" id="btnbtn" name="submit">Save Score</button>
        </form>
      </div>


      <div class="d-grid gap-2 d-md-flex justify-content-center mt-3">
        <a href="logout.php">
          <button id="btn" type="button">Logout</button>
        </a>
      </div>



    </div>
    <div class="d-flex justify-content-center mt-5">
      <cite>
      All Copyright ©  <?php echo date("Y")?> Reserved by - Computer Sikhe & Website Banaye
      </cite>
      
    </div>
  </div>

</body>

</html>