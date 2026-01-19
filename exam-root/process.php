<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'exam_user') {
    header("Location: ../login.php");
    exit;
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../connection.php';

/* ===============================
   REQUIRED SESSION CHECK
   =============================== */
    //  print_r($_SESSION);
    // exit;
if (
    empty($_SESSION['student_id']) ||
    empty($_SESSION['student_exam']) ||
    empty($_SESSION['student_name'])
  
) {
    header("Location: registration_student.php");
    exit;
}

/* ===============================
   INITIALIZE SCORE
   =============================== */
if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}

/* ===============================
   PROCESS ANSWER
   =============================== */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $student_id   = (int) $_SESSION['student_id'];
    $student_name = mysqli_real_escape_string($conn, $_SESSION['student_name']);
    $exam_id      = (int) $_SESSION['student_exam'];

    /* Question data */
    $number  = (int) $_POST['number'];      // visible question count
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $qid     = (int) $_POST['question'];    // real question id
    $choice  = (int) $_POST['choice'];

    /* Total questions */
    $total_q = mysqli_num_rows(
        mysqli_query($conn,"SELECT id FROM questions WHERE sub='$subject'")
    );

    /* Correct option */
    $correct_q = mysqli_query($conn,"
        SELECT id FROM options
        WHERE question_number='$qid'
        AND sub='$subject'
        AND is_correct=1
        LIMIT 1
    ");

    if (mysqli_num_rows($correct_q) === 1) {
        $correct_choice = (int) mysqli_fetch_assoc($correct_q)['id'];

        if ($choice === $correct_choice) {
            $_SESSION['score']++;
        }
    }

    /* NEXT QUESTION */
    $next_qid     = $qid + 1;
    $next_display = $number + 1;
    $next_encoded = base64_encode($next_display);

    /* ===============================
       FINAL QUESTION → SAVE RESULT
       =============================== */
    if ($number >= $total_q) {

        /* Prevent duplicate insert */
        $check = mysqli_query($conn,"
            SELECT id FROM result
            WHERE student_id='$student_id'
            AND exam_id='$exam_id'
            LIMIT 1
        ");

        if (mysqli_num_rows($check) === 0) {

            mysqli_query($conn,"
                INSERT INTO result
                (student_id, exam_id, student_name, student_marks)
                VALUES
                ('$student_id','$exam_id','$student_name','{$_SESSION['score']}')
            ");
        }

        /* Cleanup */
        unset($_SESSION['score']);

        header("Location: final.php");
        exit;

    } else {

        header(
            "Location: questions.php?n=$next_encoded&sub="
            . urlencode($subject) . "&Q=$next_qid"
        );
        exit;
    }
}