<?php
include 'connection.php';
if($_SESSION == true)
{

}
else
{
    header("location:http://localhost/project-root/user_logins.php");
}

$query1 = "SELECT * FROM questions";
$total_questions = mysqli_num_rows(mysqli_query( $conn ,$query1));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styledashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Dashboard</title>
    
</head>
<body>
    
    <div class="container">
<h2 class="display-6">Welcome To You <?php echo $_SESSION['fname']?></h2>

<div class="me-5 d-grid gap-2 d-md-flex justify-content-end">
<a href="logout.php">
<button class="btn btn-warning" type="button">Logout</button>
</a>
</div>

    <div class="card mt-3"  id="heading">
        <h6 class="text-center mt-2 p-2 fs-5"><?php echo $_SESSION['fname']?> You Have To Select Only 1 out of 4 .All The Best</h6>
    </div>


<div class="col-lg-8 m-auto d-block" id="maindiv">
<h3 class="h3text">Test Your Knowledge</h3>
<ul>
    <li><strong>Number Of Questions</strong> <?php echo  $total_questions?></li>
    <li><strong>Type :</strong> Multiple choice </li>
    <li><strong>Estimated Time</strong> <?php echo  $total_questions * 1?> Mins</li>
</ul>


<div class="d-grid gap-2 col-6 mx-auto">
    <?php $n = base64_encode("1")?>
  <a class="btn btn-primary" href="examsection.php?n=<?php echo $n?>" role="button">Start Exam</a>
</div>

</div>

</div>

<div class="card-footer text-body-secondary text-center mt-5">
    <cite>  All Copyright © <?php echo date("Y")?>Reserved by - Computer Sikhe & Website Banaye
    </cite>  
</div>
</body>
</html>