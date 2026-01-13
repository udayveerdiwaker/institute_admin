<?php
 include_once "connection.php";


//Set Questions Number
$n = base64_decode($_GET['n'] );
$number = $n;
$n--;

//Get Question from database by subject name 
$subjectName = $_GET['sub'];

 //get the questions
$query = "SELECT * FROM `questions`  WHERE   sub = '$subjectName'  order by id asc limit $n,1";
$result = mysqli_query($conn, $query);
$question = mysqli_fetch_assoc($result);



//get the current question number

$current_question=$_GET['Q'];

//Get Choice
$query2 = "SELECT * FROM options WHERE question_number = '$current_question' AND sub ='$subjectName' ";
$choices = mysqli_query($conn, $query2);


//Get the total questions
$query3 = "SELECT * FROM questions WHERE  sub = '$subjectName' ";
$total_questions = mysqli_num_rows(mysqli_query($conn, $query3));


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="questionstyle.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>exam</title>
</head>

<body>
  <div class="container">
    <h2 class="display-6 mt-2">Welcome To You <?php echo $_SESSION['fname'] ?></h2>


    <div class="me-5 d-grid gap-2 d-md-flex justify-content-end">
      <a href="logout.php">
        <button class="btn btn-warning" type="button">Logout</button>
      </a>
    </div>

    <div class="heading">
      <h6 class="text-center card-header fs-4" ><?php echo $_SESSION['fname'] ?> You have to select only 1 correct answer out of 4 options.</h6>
    </div>
    <div class="maindiv mt-5">
      <div class="current text-center">Question <?php echo $number; ?> of <?php echo $total_questions; ?></div>

      <p class=" card questions card-header bg-white" id="qcard"><?php echo $number; ?> : <?php echo $question['question_text']?></p>

      <div>
<form action="process.php?sub=<?php echo $subjectName?>" method="POST">
        <ol>
          <?php while ($row = mysqli_fetch_assoc($choices)) { 
            
            ?>
            <li>
              <input name="choice" required class="form-check-input p-2" type="radio" name="radioNoLabel" id="radioNoLabel1" value="<?php echo $row['id']; ?>">
              <?php echo $row['options']; ?>
            </li>
          <?php } ?>
        </ol>
        <input type="hidden" name="number" value="<?php echo $number ?>">
        <input type="hidden" name="subject" value="<?php echo $subjectName ?>">
        <input type="hidden" name="question" value="<?php echo $current_question ?>">
        <input type="submit" name="submit" value="Submit">
      </form>
      </div>
    </div>
    
    <div id="cite">
      <cite>
      All Copyright © <?php echo date("Y")?> Reserved by - Computer Sikhe & Website Banaye
      </cite>
      
    </div>
  </div>

</body>

</html>