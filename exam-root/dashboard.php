<?php

session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'exam_user') {
    header("Location: ../login.php");
    exit;
}


// dashboard.php - full UI + PHP + Charts (monthly & yearly)
// Turn on errors for debugging (remove in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../connection.php';

$total_questions = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM questions"));
?>

<!DOCTYPE html>
<html>

<head>
    <title>Student Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
        background: #f4f6f9;
    }

    .sidebar {
        width: 240px;
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh;
        background: #1e1e2f;
        padding: 15px;
    }

    .sidebar a {
        color: #ccc;
        display: block;
        padding: 12px;
        border-radius: 6px;
        text-decoration: none;
        margin-bottom: 8px;
    }

    .sidebar a:hover,
    .sidebar a.active {
        background: #0d6efd;
        color: white;
    }

    .content {
        margin-left: 260px;
        padding: 20px;
    }

    .topbar {
        background: white;
        padding: 15px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, .1);
    }

    .card-box {
        background: white;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, .08);
    }
    </style>
</head>

<body>

    <div class="sidebar">
        <h4 class="text-white mb-4">🎓 Student Panel</h4>
        <a class="active">Dashboard</a>
        <a href="#">My Exams</a>
        <a href="#">Results</a>
        <a href="#">Profile</a>
        <a href="../logout.php" class="text-danger">Logout</a>
    </div>

    <div class="content">

        <div class="topbar d-flex justify-content-between align-items-center">
            <h5>Welcome, <?= $_SESSION['fname']; ?></h5>
            <span class="badge bg-primary">Student</span>
        </div>

        <div class="row mt-4">

            <div class="col-md-4 mb-3">
                <div class="card-box text-center">
                    <h6>Total Questions</h6>
                    <h2><?= $total_questions ?></h2>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card-box text-center">
                    <h6>Exam Time</h6>
                    <h2><?= $total_questions ?> mins</h2>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card-box text-center">
                    <h6>Exam Type</h6>
                    <h2>MCQ</h2>
                </div>
            </div>

        </div>

        <div class="card-box mt-4 text-center">
            <h3 class="fw-bold">Website Banaye & Computer Sikhe</h3>
            <p class="text-muted">You can attempt only one exam. Best of luck!</p>

            <?php $n = base64_encode("1"); ?>
            <a href="examsection.php?n=<?= $n ?>" class="btn btn-primary btn-lg px-5 mt-3">
                Start Exam
            </a>
        </div>

    </div>

</body>

</html>