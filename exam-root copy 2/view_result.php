<?php
session_start();
/* Only exam user can start exam */
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'exam_user') {
    header("Location: ../login.php");
    exit;
}


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'header.php';

/* Validate result id */
if (!isset($_GET['id'])) {
    die("Result not found");
}

$id = (int)$_GET['id'];

$res = mysqli_query($conn,"SELECT * FROM result WHERE id='$id' LIMIT 1");

if (mysqli_num_rows($res) != 1) {
    die("Invalid result");
}

$r = mysqli_fetch_assoc($res);
$status = ($r['student_marks'] >= 33) ? 'Pass' : 'Fail';
?>

<div class="main-content">
    <div class="container mt-4">

        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-bold mb-0">Student Result</h4>
            <a href="results.php" class="btn btn-outline-secondary btn-sm">
                ← Back to Results
            </a>
        </div>

        <!-- Result Card -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-12">
                <div class="card shadow-sm border-0">

                    <div class="card-header bg-white text-center">
                        <h5 class="mb-0 fw-bold">
                            <?= htmlspecialchars($r['student_name']) ?>
                        </h5>
                        <span class="badge <?= $status=='Pass'?'bg-success':'bg-danger' ?> mt-2">
                            <?= $status ?>
                        </span>
                    </div>

                    <div class="card-body">

                        <div class="row text-center">
                            <div class="col-6 border-end">
                                <small class="text-muted">Marks Obtained</small>
                                <h3 class="fw-bold text-primary">
                                    <?= $r['student_marks'] ?>
                                </h3>
                            </div>
                            <div class="col-6">
                                <small class="text-muted">Result Status</small>
                                <h3 class="fw-bold <?= $status=='Pass'?'text-success':'text-danger' ?>">
                                    <?= $status ?>
                                </h3>
                            </div>
                        </div>

                        <hr>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Exam Date</span>
                                <strong><?= date("d M Y") ?></strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Exam Type</span>
                                <strong>MCQ</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Passing Marks</span>
                                <strong>33</strong>
                            </li>
                        </ul>

                    </div>

                    <!-- Actions -->
                    <div class="card-footer bg-white text-center">
                        <a href="print_result.php?id=<?= $r['id'] ?>" target="_blank"
                            class="btn btn-outline-primary me-2">
                            🖨 Print Result
                        </a>

                        <a href="results.php" class="btn btn-outline-dark">
                            Close
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>