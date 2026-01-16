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


// $students = mysqli_query($conn,"SELECT * FROM students ORDER BY id DESC");
// $students = mysqli_query($conn,"SELECT * FROM students ORDER BY id DESC");
$students = mysqli_query($conn,"
    SELECT *
    FROM students
    WHERE student_name NOT IN (
        SELECT name FROM registered_user
    )
    ORDER BY id DESC
");


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
    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php 
            if(mysqli_num_rows($students) > 0){
                $i=1;
                while($s=mysqli_fetch_assoc($students)){ 
            ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= htmlspecialchars($s['student_name']) ?></td>
                    <td><?= htmlspecialchars($s['phone']) ?></td>
                    <td>
                        <span class="badge bg-danger">Not Registered</span>
                    </td>
                    <td>
                        <a href="registration_student.php?sid=<?= $s['id'] ?>" class="btn btn-sm btn-primary">
                            Register
                        </a>
                    </td>
                </tr>
                <?php 
                }
            } else { 
            ?>
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        All students are registered 🎉
                    </td>
                </tr>
                <?php } ?>
            </tbody>

        </table>
    </div>

</div>