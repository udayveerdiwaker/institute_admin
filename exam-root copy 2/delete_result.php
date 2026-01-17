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

$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM result WHERE id='$id'");

header("Location: results.php");
exit;