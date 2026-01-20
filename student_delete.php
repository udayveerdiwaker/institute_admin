<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'student') {
    header("Location: login.php");
    exit;
}

// dashboard.php - full UI + PHP + Charts (monthly & yearly)
// Turn on errors for debugging (remove in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'connection.php';


$id = intval($_GET['id']);

// Get image name
$res = mysqli_query($conn, "SELECT photo FROM students WHERE id=$id");
$row = mysqli_fetch_assoc($res);

if ($row && !empty($row['photo'])) {
    $imgPath = "student_img/" . $row['photo'];

    if (file_exists($imgPath)) {
        unlink($imgPath); // DELETE IMAGE
    }
}

// Delete fees
mysqli_query($conn, "DELETE FROM student_fees WHERE student_id=$id");

// Delete student
mysqli_query($conn, "DELETE FROM students WHERE id=$id");

header("Location: all_students.php?msg=deleted");
exit;