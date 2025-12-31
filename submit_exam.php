<?php
session_start();
include '../connection.php';

$student_id = $_SESSION['student_id'];
$course_id = $_POST['course_id'];

$total = 0;
$correct = 0;

foreach ($_POST['ans'] as $qid => $ans) {
    $total++;

    $q = mysqli_fetch_assoc(
        mysqli_query($conn,"SELECT correct_option FROM exam_questions WHERE id='$qid'")
    );

    if ($q['correct_option'] == $ans) {
        $correct++;
    }
}

$wrong = $total - $correct;
$score = $correct;

mysqli_query($conn,"
    INSERT INTO exam_results
    (student_id, course_id, total, correct, wrong, score)
    VALUES
    ('$student_id','$course_id','$total','$correct','$wrong','$score')
");

header("Location: my_result.php");