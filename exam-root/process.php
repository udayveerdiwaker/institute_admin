<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'exam_user') {
    header("Location: ../login.php");
    exit;
}


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../connection.php';

/* Initialize score */
if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}

/* Ensure form submitted */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Student details (from session / hidden input)
    $student_name = $_POST['student_name'] ?? $_SESSION['student_name'];

    // Question details
    $number   = (int) $_POST['number'];          // display number
    $subject  = $_POST['subject'];               // subject name
    $Que      = (int) $_POST['question'];        // real question_number
    $choice   = (int) $_POST['choice'];          // selected option id

    /* Total questions for this subject */
    $total_q = mysqli_num_rows(
        mysqli_query($conn, "SELECT id FROM questions WHERE sub='$subject'")
    );

    /* Get correct option */
    $correct = mysqli_fetch_assoc(
        mysqli_query(
            $conn,
            "SELECT id FROM options 
             WHERE question_number='$Que' 
             AND sub='$subject' 
             AND is_correct=1"
        )
    );

    $correct_choice = $correct['id'];

    /* Check answer */
    if ($choice === (int)$correct_choice) {
        $_SESSION['score']++;
    }

    /* Next question */
    $next_question_number = $Que + 1;
    $next_display_number  = $number + 1;
    $next_encoded         = base64_encode($next_display_number);

    /* Redirect */
    if ($number >= $total_q) {

        // Save final result (optional but recommended)
        mysqli_query($conn,"
            INSERT INTO result (student_name, student_marks)
            VALUES ('$student_name','{$_SESSION['score']}')
        ");

        header("Location: final.php");
        exit;

    } else {

        header(
            "Location: questions.php?n=$next_encoded&sub="
            . urlencode($subject) . "&Q=$next_question_number"
        );
        exit;
    }
}
?>