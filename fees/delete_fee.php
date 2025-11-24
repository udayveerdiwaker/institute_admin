<?php
// delete_fee.php
include 'connection.php';

// Expect id (fee row) and student_id to redirect back
if (!isset($_GET['id']) || !isset($_GET['student_id'])) {
    header("Location: fees_list.php");
    exit;
}

$id = (int) $_GET['id'];
$student_id = (int) $_GET['student_id'];

// Optional: fetch record to confirm exists
$check = mysqli_query($conn, "SELECT id FROM student_fees WHERE id = $id LIMIT 1");
if (!$check || mysqli_num_rows($check) == 0) {
    header("Location: view_fees.php?student_id={$student_id}");
    exit;
}

// Perform delete
mysqli_query($conn, "DELETE FROM student_fees WHERE id = $id");

// Redirect back to student history with message param
header("Location: view_fees.php?student_id={$student_id}&deleted=1");
exit;
?>
