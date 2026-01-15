<?php
session_start();
include 'connection.php';

if (!isset($_SESSION['student_exam'])) {
    header("Location: registration_student.php");
    exit;
}

$exam_id = $_SESSION['student_exam'];

$exam = mysqli_fetch_assoc(mysqli_query($conn,"
    SELECT exam_name FROM exams WHERE id='$exam_id'
"));

$subject = $exam['exam_name'];

/* Get FIRST real question_number of this subject */
$q = mysqli_fetch_assoc(mysqli_query($conn,"
    SELECT question_number 
    FROM questions 
    WHERE sub='$subject'
    ORDER BY question_number ASC
    LIMIT 1
"));

$first_question = $q['question_number'];

/* Count questions */
$c = mysqli_fetch_assoc(mysqli_query($conn,"
    SELECT COUNT(*) AS total 
    FROM questions 
    WHERE sub='$subject'
"));

$total = $c['total'];

header("Location: questions.php?n=" . base64_encode(1) . "&sub=" . urlencode($subject) . "&Q=" . $first_question);
exit;