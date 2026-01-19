<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'exam_user') {
    header("Location: ../login.php");
    exit;
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);   
error_reporting(E_ALL);
include 'header.php';
?>

<div class="main-content">
    <div class="container mt-5">

        <div class="alert alert-warning text-center">
            <h4>Exam Already Attempted</h4>
            <p>
                Dear <strong><?= htmlspecialchars($_SESSION['student_name'] ?? '') ?></strong>,
                you have already attempted this examination.
            </p>

            <a href="dashboard.php" class="btn btn-primary mt-3">
                Go to Dashboard
            </a>
        </div>

    </div>
</div>