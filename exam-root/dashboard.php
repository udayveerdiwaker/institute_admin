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



//$total_questions = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM questions"));

$total_registration = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM registered_user"));

$total_students  = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM students"));
$students = mysqli_query($conn,"SELECT student_name, phone FROM students ORDER BY id DESC LIMIT 10");

// $total_students = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM registered_user"));
$attempted = mysqli_num_rows(mysqli_query($conn,"SELECT DISTINCT student_name FROM result"));
$topper = mysqli_fetch_assoc(mysqli_query($conn,"SELECT student_name, MAX(student_marks) AS m FROM result"));

?>

<div class="main-content">
    <div class="container ">


        <div class="topbar d-flex justify-content-between align-items-center">
            <h5>Welcome, Exam User</h5>
            <!-- <span class="badge bg-primary">Exam Panel</span> -->
        </div>
        <!-- <h3 class="mb-3">Dashboard</h3> -->
        <!-- Stats -->

        <div class="row g-3 mt-2">
            <div class="col-md-3 col-6">
                <div class="card-box text-center">
                    <div class="icon"><i class="bi bi-people-fill"></i></div>
                    <div class="stat-number"><?= number_format($total_students) ?></div>
                    <div class="text-muted">Total Students</div>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="card-box text-center">
                    <div class="icon"><i class="bi bi-people-fill"></i></div>
                    <div class="stat-number"><?= number_format($total_registration) ?></div>
                    <div class="text-muted">Total Registration</div>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="card-box text-center">
                    <div class="icon"><i class="bi bi-people-fill"></i></div>
                    <div class="stat-number"><?= number_format($attempted) ?></div>
                    <div class="text-muted">Students Attempted</div>
                </div>
            </div>

            <!-- <div class="col-md-3 col-6">
                <div class="card-box text-center">
                    <div class="icon"><i class="bi bi-people-fill"></i></div>
                    <div class="stat-number"><?= $topper['student_name'] ?> (<?= $topper['m'] ?>)</div>

                    <div class="text-muted">Topper</div>
                </div>
            </div> -->
        </div>

        <!-- Start Exam -->
        <!-- <div class="card-box mt-4 text-center">
            <h3 class="fw-bold">Website Banaye & Computer Sikhe</h3>
            <p class="text-muted">You can attempt only one exam. Best of luck!</p>
            <?php $n = base64_encode("1"); ?>
            <a href="all_students.php" class="btn btn-dark mt-3">View All Students</a>

        </div> -->

        <!-- Student List -->
        <div class="card-box mt-4">
            <h5 class="mb-3">Recently Registered Students</h5>
            <table class="table table-striped">
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                </tr>
                <?php while($s = mysqli_fetch_assoc($students)) { ?>
                <tr>
                    <td><?= $s['student_name'] ?></td>
                    <td><?= $s['phone'] ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>

        <!-- Future Features -->
        <div class="row mt-4">

            <div class="col-md-4 mb-3">
                <div class="card-box text-center">
                    <h6>View Results</h6>
                    <a href="results.php" class="btn btn-outline-primary mt-2">Open</a>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card-box text-center">
                    <h6>Exam History</h6>
                    <a href="exam_history.php" class="btn btn-outline-success mt-2">Open</a>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card-box text-center">
                    <h6>Student Performance</h6>
                    <a href="performance.php" class="btn btn-outline-warning mt-2">Open</a>
                </div>
            </div>

        </div>
    </div>
</div>


</body>

</html>