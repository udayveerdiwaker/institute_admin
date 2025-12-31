<?php
include '../connection.php';
include 'includes/header.php';
include 'includes/sidebar.php';

// Counts
$students = mysqli_fetch_row(
    mysqli_query($conn, "SELECT COUNT(*) FROM students")
)[0];


$exams = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM exams"))[0];
$questions = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM questions"))[0];
?>

<div style="margin-left:240px; padding:20px;">
    <!-- <h3>Welcome, <?= $_SESSION['admin_name']; ?></h3> -->

    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card text-center shadow">
                <div class="card-body">
                    <h5>Total Students</h5>
                    <h2><?= $students ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center shadow">
                <div class="card-body">
                    <h5>Total Exams</h5>
                    <h2><?= $exams ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center shadow">
                <div class="card-body">
                    <h5>Total Questions</h5>
                    <h2><?= $questions ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>