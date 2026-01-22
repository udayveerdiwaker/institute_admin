<?php
include 'session.php';

/* ===============================
   1. Student must be selected
   =============================== */
if (!isset($_GET['sid'])) {
    header("Location: register_students");
    exit;
}

$sid = (int) $_GET['sid'];

/* ===============================
   2. Fetch student from registered_user
   =============================== */
$student_q = mysqli_query(
    $conn,
    "SELECT * FROM registered_user WHERE id='$sid' LIMIT 1"
);

if (mysqli_num_rows($student_q) !== 1) {
    die("Invalid student");
}

$student = mysqli_fetch_assoc($student_q);

/* ===============================
   3. SET SESSION (VERY IMPORTANT)
   =============================== */
$_SESSION['student_id']    = $student['id'];
$_SESSION['student_name']  = $student['name'];
$_SESSION['student_exam']  = $student['exam_id'];
$_SESSION['student_phone'] = $student['phone'];

// print_r($_SESSION);
// exit;

/* ===============================
   4. CHECK ATTEMPT (AFTER SESSION)
   =============================== */
$student_id = $_SESSION['student_id'];
$exam_id    = (int) $_SESSION['student_exam'];

$attempt_q = mysqli_query(
    $conn,
    "SELECT id 
     FROM result 
     WHERE student_id='$student_id'
     AND exam_id='$exam_id'
     LIMIT 1"
);

if (mysqli_num_rows($attempt_q) > 0) {
    header("Location: already_attempted");
    exit;
}

/* ===============================
   5. Fetch exam
   =============================== */
$exam_q = mysqli_query(
    $conn,
    "SELECT exam_name FROM exams WHERE id='$exam_id' LIMIT 1"
);

if (mysqli_num_rows($exam_q) !== 1) {
    die("Invalid exam");
}

$exam = mysqli_fetch_assoc($exam_q);
$subject = $exam['exam_name'];

/* ===============================
   6. Fetch FIRST question
   =============================== */
$q_q = mysqli_query(
    $conn,
    "SELECT id 
     FROM questions 
     WHERE sub='$subject'
     ORDER BY id ASC
     LIMIT 1"
);

if (mysqli_num_rows($q_q) === 0) {
    die("No questions found for this exam");
}

$first_question_id = mysqli_fetch_assoc($q_q)['id'];

/* ===============================
   7. START EXAM
   =============================== */
   
header(
    "Location: questions?n=" . base64_encode(1) .
    "&sub=" . urlencode($subject) .
    "&Q=" . $first_question_id
);
exit;