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

$total_registration = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM registered_user"));
$total_students  = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM students"));
$attempted = mysqli_num_rows(mysqli_query($conn,"SELECT DISTINCT student_name FROM result"));

$students = mysqli_query($conn,"
    SELECT student_name, phone 
    FROM students s
     WHERE s.course_id NOT IN (10,11)
      AND s.student_name NOT IN (
          SELECT name FROM registered_user
      )
    ORDER BY id DESC 
    LIMIT 8
");
?>

<div class="main-content">
    <div class="container-fluid px-3 px-md-4">

        <!-- Header -->
        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
            <div>
                <h4 class="fw-bold mb-0">Exam Dashboard</h4>
                <small class="text-muted">Overview & quick actions</small>
            </div>
            <div class="mt-2 mt-md-0">
                <span class="badge bg-primary px-3 py-2">Exam User</span>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row g-3">

            <div class="col-xl-3 col-md-6 col-12">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3 fs-2 text-primary">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <div>
                            <h5 class="mb-0"><?= number_format($total_students) ?></h5>
                            <small class="text-muted">Total Students</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 col-12">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3 fs-2 text-success">
                            <i class="bi bi-person-check-fill"></i>
                        </div>
                        <div>
                            <h5 class="mb-0"><?= number_format($total_registration) ?></h5>
                            <small class="text-muted">Registrations</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 col-12">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3 fs-2 text-warning">
                            <i class="bi bi-clipboard-check-fill"></i>
                        </div>
                        <div>
                            <h5 class="mb-0"><?= number_format($attempted) ?></h5>
                            <small class="text-muted">Exams Attempted</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 col-12">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3 fs-2 text-danger">
                            <i class="bi bi-bar-chart-fill"></i>
                        </div>
                        <div>
                            <h5 class="mb-0">Reports</h5>
                            <small class="text-muted">Analytics Ready</small>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Quick Actions -->
        <div class="row g-3 mt-4">
            <div class="col-md-4 col-12">
                <a href="all_students.php" class="btn btn-outline-primary w-100 py-3">
                    <i class="bi bi-people me-2"></i> View All Students
                </a>
            </div>
            <div class="col-md-4 col-12">
                <a href="results.php" class="btn btn-outline-success w-100 py-3">
                    <i class="bi bi-award me-2"></i> View Results
                </a>
            </div>
            <div class="col-md-4 col-12">
                <a href="performance.php" class="btn btn-outline-warning w-100 py-3">
                    <i class="bi bi-graph-up-arrow me-2"></i> Performance
                </a>
            </div>
        </div>

        <!-- Recent Students -->
        <div class="card shadow-sm border-0 mt-4">
            <div class="card-header bg-white fw-bold">
                Recently Added Students
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($s = mysqli_fetch_assoc($students)) { ?>
                        <tr>
                            <td><?= htmlspecialchars($s['student_name']) ?></td>
                            <td><?= htmlspecialchars($s['phone']) ?></td>
                        </tr>
                        <?php } ?>
                        <?php if(mysqli_num_rows($students)==0){ ?>
                        <tr>
                            <td colspan="2" class="text-center text-muted">No students found</td>
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