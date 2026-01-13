<?php
include '../connection.php';
include 'includes/sidebar.php';

$students = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM students"))[0];
$courses  = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM courses"))[0];
$exams    = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM exams"))[0];
$fees     = mysqli_fetch_row(mysqli_query($conn,"SELECT SUM(paid_amount) FROM student_fees"))[0];
?>
<style>
.card-box {
    padding: 18px;
    border-radius: 10px;
    background: #fff;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
}

.icon {
    font-size: 28px;
    color: #0d6efd;
}

.stat-number {
    font-size: 22px;
    font-weight: 700;
    margin-top: 6px;
}

@media (max-width:768px) {
    .stat-number {
        font-size: 18px
    }
}
</style>

<div class="main-content">
    <div class="container mt-4">

        <h3 class="mb-3">Dashboard</h3>

        <div class="row g-3">
            <div class="col-md-3 col-6">
                <div class="card-box text-center">
                    <div class="icon"><i class="bi bi-people-fill"></i></div>
                    <div class="stat-number"><?= number_format($students) ?></div>
                    <div class="text-muted">Total Students</div>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="card-box text-center">
                    <div class="icon"><i class="bi bi-book"></i></div>
                    <div class="stat-number"><?= number_format($courses) ?></div>
                    <div class="text-muted">Total Courses</div>
                </div>
            </div>
            <!-- 
            <div class="col-md-3 col-6">
                <div class="card-box text-center">
                    <div class="icon"><i class="bi bi-cash-stack"></i></div>
                    <div class="stat-number">₹<?= number_format($fees   ,2) ?></div>
                    <div class="text-muted">Total Amount</div>
                </div>
            </div> -->

            <div class="col-md-3 col-6">
                <div class="card-box text-center">
                    <div class="icon"><i class="bi bi-clipboard2"></i></div>
                    <div class="stat-number text-danger"><?= number_format($exams) ?></div>
                    <div class="text-muted">Total Exams</div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>