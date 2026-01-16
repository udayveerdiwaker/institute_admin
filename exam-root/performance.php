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

/* Stats */
$total_results = mysqli_num_rows(mysqli_query($conn,"SELECT id FROM result"));
$passed = mysqli_num_rows(mysqli_query($conn,"SELECT id FROM result WHERE student_marks >= 40"));
$failed = mysqli_num_rows(mysqli_query($conn,"SELECT id FROM result WHERE student_marks < 40"));

$topper = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT student_name, MAX(student_marks) AS marks FROM result")
);

/* Student performance */
$results = mysqli_query($conn,"SELECT * FROM result ORDER BY student_marks DESC");
?>

<div class="main-content">
    <div class="container-fluid px-3 px-md-4">

        <!-- Header -->
        <div class="mb-4">
            <h4 class="fw-bold mb-1">Student Performance</h4>
            <small class="text-muted">Exam performance overview</small>
        </div>

        <!-- Stats Cards -->
        <div class="row g-3 mb-4">

            <div class="col-md-3 col-6">
                <div class="card shadow-sm border-0 text-center h-100">
                    <div class="card-body">
                        <h6 class="text-muted">Total Results</h6>
                        <h3 class="fw-bold"><?= $total_results ?></h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="card shadow-sm border-0 text-center h-100">
                    <div class="card-body">
                        <h6 class="text-muted">Passed</h6>
                        <h3 class="fw-bold text-success"><?= $passed ?></h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="card shadow-sm border-0 text-center h-100">
                    <div class="card-body">
                        <h6 class="text-muted">Failed</h6>
                        <h3 class="fw-bold text-danger"><?= $failed ?></h3>
                    </div>
                </div>
            </div>

            <!-- <div class="col-md-3 col-12">
                <div class="card shadow-sm border-0 text-center h-100">
                    <div class="card-body">
                        <h6 class="text-muted">Top Performer</h6>
                        <h5 class="fw-bold text-primary">
                            <?= $topper['student_name'] ?? 'N/A' ?>
                        </h5>
                        <small class="text-muted">
                            <?= $topper['marks'] ?? 0 ?> Marks
                        </small>
                    </div>
                </div>
            </div> -->

        </div>

        <!-- Performance Table -->
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white fw-bold">
                Student Performance List
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Student Name</th>
                            <th>Marks</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; while($r=mysqli_fetch_assoc($results)){ 
                        $status = ($r['student_marks'] >= 33) ? 'Pass' : 'Fail';
                    ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= htmlspecialchars($r['student_name']) ?></td>
                            <td><?= $r['student_marks'] ?></td>
                            <td>
                                <span class="badge <?= $status=='Pass' ? 'bg-success' : 'bg-danger' ?>">
                                    <?= $status ?>
                                </span>
                            </td>
                        </tr>
                        <?php } ?>

                        <?php if(mysqli_num_rows($results)==0){ ?>
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                No performance data available
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

</body>

</html>