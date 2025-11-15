<?php
include 'connection.php';
if (!isset($_GET['id'])) { header('Location: view_fees.php'); exit; }
$id = (int) $_GET['id'];

// delete
mysqli_query($conn, "DELETE FROM student_fees WHERE id = $id");
header('Location: view_fees.php');
exit;