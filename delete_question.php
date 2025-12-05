<?php
include 'connection.php'; // update path if needed
session_start();

// -------------------------
// 1. Validate question ID
// -------------------------
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: manage_question.php?msg=Invalid+ID");
    exit;
}

$question_id = (int) $_GET['id'];

// -------------------------
// 2. Check if question exists
// -------------------------
$check = mysqli_query($conn, "SELECT id FROM questions WHERE id = $question_id LIMIT 1");

if (!$check || mysqli_num_rows($check) == 0) {
    header("Location: manage_question.php?msg=Question+Not+Found");
    exit;
}

// -------------------------
// 3. Delete the question
// -------------------------
$delete = mysqli_query($conn, "DELETE FROM exam_questions WHERE id = $question_id");

if ($delete) {
    header("Location: manage_question.php?msg=Question+Deleted+Successfully");
    exit;
} else {
    header("Location: manage_question.php?msg=Failed+To+Delete");
    exit;
}
?>