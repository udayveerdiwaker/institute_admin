<?php 
include 'connection.php';

//for first questions ,  score will be not be there
if (!isset($_SESSION['score'])){
    $_SESSION['score'] = 0;
}
if($_POST){
    //we need total questions in process file
    $subjectName = $_GET['sub'];
    $query = "SELECT * FROM questions WHERE sub= '$subjectName' ";
    $total_questions = mysqli_num_rows(mysqli_query($conn, $query));

    //captrue the question number where form was submitted
    $number = $_POST['number'];
    $sub = $_POST['subject'];
    $Que = $_POST['question'];




    //storing the selected options by user
    $selected_choice = $_POST['choice'];


    //what will be the next question number
    $convertint = intval($number);


  
    //check the correct choice for current questions

    $query1 ="SELECT * FROM options WHERE question_number = '$Que' AND is_correct = 1 ";

    $result = mysqli_query($conn, $query1);
    $row = mysqli_fetch_assoc($result);



    $correct_choice = $row['id'];

    // print_r($correct_choice);
    // echo '<br>';
    // print_r($selected_choice);
    // print_r($_SESSION);
    // print_r($convertint);
    // exit;

  //  imcrease the score if selected choice is correct
    if($selected_choice == $correct_choice){
       $results = $_SESSION['score']++;
    }
    $Que++;
    $next = base64_encode($convertint+1);

    //redirect to next question or final page
    if($convertint == $total_questions){
        header("location:http://localhost/project-root/final.php");
    }
    else
    {
        header("location://localhost/project-root/questions.php?n=".$next."&sub=".$sub."&Q=".$Que);
    }
}

?>