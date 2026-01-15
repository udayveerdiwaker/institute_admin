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

include 'header.php';


$students = mysqli_query($conn,"SELECT * FROM students ORDER BY id DESC");


?>

<div class="main-content">

    <div class="d-flex justify-content-between align-items-center">
        <h5>All Registered Students</h5>
        <a href="dashboard.php" class="btn btn-secondary btn-sm">Back</a>
    </div>
    <!-- Start Exam -->
    <div class="card-box mt-4 text-center">
        <h3 class="fw-bold">Website Banaye & Computer Sikhe</h3>
        <p class="text-muted">You can attempt only one exam. Best of luck!</p>
        <?php $n = base64_encode("1"); ?>
        <!-- <a href="all_students.php" class="btn btn-dark mt-3">View All Students</a> -->

    </div>
    <div class="card-box mt-4">
        <table class="table table-bordered table-striped">
            <tr>
                <th>#</th>
                <th>Student Name</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>

            <?php $i=1; while($s=mysqli_fetch_assoc($students)){ ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $s['student_name'] ?></td>
                <td><?= $s['phone'] ?></td>
                <td>
                    <?php $n = base64_encode($s['id']); ?>
                    <a href="registration_student.php?n=<?= $n ?>" class="btn btn-primary btn-sm">
                        Start Exam
                    </a>
                </td>
            </tr>
            <?php } ?>

        </table>
    </div>

</div>