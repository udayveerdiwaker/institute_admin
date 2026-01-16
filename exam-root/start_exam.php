<?php
session_start();
/* Only exam user can start exam */
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'exam_user') {
    header("Location: ../login.php");
    exit;
}


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../connection.php';



/* Student id must be passed */
if (!isset($_GET['sid'])) {
    die("Student not selected");
}

$sid = (int) $_GET['sid'];

/* Fetch student */
$student = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT * FROM registered_user WHERE id='$sid'")
);

if (!$student) {
    die("Invalid student");
}

/* SET SESSIONS (THIS WAS MISSING) */
$_SESSION['student_name'] = $student['name'];
$_SESSION['student_exam'] = $student['exam_id'];
$_SESSION['student_phone'] = $student['phone'] ?? '';

/* Fetch exam */
$exam = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT exam_name FROM exams WHERE id='{$student['exam_id']}'")
);

if (!$exam) {
    die("Invalid exam");
}

$subject = $exam['exam_name'];

/* Fetch FIRST question */
$q = mysqli_fetch_assoc(
    mysqli_query($conn,"
        SELECT id 
        FROM questions 
        WHERE sub='$subject'
        ORDER BY id ASC
        LIMIT 1
    ")
);

if (!$q) {
    die("No questions found");
}

/* Start exam */
header(
    "Location: questions.php?n=" . base64_encode(1) .
    "&sub=" . urlencode($subject) .
    "&Q=" . $q['id']
);
exit;