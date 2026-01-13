<?php
include_once "connection.php";
    
if(isset($_POST['submit'])){
    $question_number = $_POST['question_number'];
    $question_text = $_POST['question_text'];
    $correct_choice = $_POST['correct_choice'];
    $subject_name = $_POST['subject_name'];
 
    // Choice Array
    $choice = array();
    $choice[1] = $_POST['choice1'];
    $choice[2] = $_POST['choice2'];
    $choice[3] = $_POST['choice3'];
    $choice[4] = $_POST['choice4'];
      
  //First Query for Questions

  $insert = "INSERT INTO `questions`(`question_number`, `question_text`,  `sub`) VALUES ('$question_number','$question_text', '$subject_name')";
      
$result = mysqli_query($conn, $insert) or die(mysqli_error($conn));

if($result){
  foreach($choice as $options => $value){
    if($value != ""){
      if($correct_choice == $options){
        $is_correct = 1;
      }else{
        $is_correct = 0;
      }
      
    //Second Query for Choice Table

      $query = "INSERT INTO `options`(`question_number`, `is_correct`, `options`) VALUES ('$question_number','$is_correct','$value')";

      $insert_row = mysqli_query($conn, $query);

      //Validation insertion of choices

      if( $insert_row){
        continue;
      }else{
        die("Second query for Choices could not be run");
      }

    }
  }

}

$message = "Questions has been added Sucessfully";
header("location:http://localhost/project-root/index.php");
}

$query1 = "SELECT * FROM questions";
$questions = mysqli_query($conn , $query1);
$total = mysqli_num_rows($questions);
$next = $total+1;



?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
      .display-5{
        font-size: 40px;
        text-align: center;
      }
      #exampleInputPassword1{
        width: 300px;
      }
      #exampleInputPassword2{
        width: 80px;
        display: flex;
      }
      #exampleInputEmail1{
        width: 500px;
      }
    </style>
</head>
<body>
    <div class="container">
    <div class="row">
    <div class="col" id="maindiv">
    <h1 class="display-5">Add Questions Here</h1>
      <form action="#" method="post">
      <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Question Number</label>
    <input type="number" class="form-control" id="exampleInputPassword2"  name="question_number" value="<?php echo $next ?>">
  </div>
  
      <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Subject Names</label>
    <input type="text" class="form-control" id="exampleInputPassword2"  name="subject_name" ">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Enter Question From Here</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="question_text">
  </div>


  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Enter Option From Here 1</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="choice1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Question Options 2</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="choice2">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Question Options 3</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="choice3">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Question Options 4</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="choice4">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Correct Options Number</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="correct_choice">
  </div>

  <button type="submit" class="btn btn-primary w-50" name="submit">Submit</button>
</form>

    </div>
    </div>
    </div>

</body>
</html>