<?php include 'connection.php'; ?>

<?php include 'sidebar.php'; ?>

<style>
.card-box {
    padding: 25px;
    border-radius: 10px;
    background: white;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    transition: 0.3s;
}
.card-box:hover {
    transform: translateY(-5px);
}
.icon-box {
    font-size: 40px;
    color: #007bff;
}
.quick-btn {
    width: 100%;
    padding: 15px;
    margin-bottom: 15px;
}
@media(max-width: 768px) {
    .card-box { text-align: center; }
}
</style>

<?php
// TOTAL STUDENTS
$students = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM students"))['total'];

// TOTAL COURSES
$courses = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM courses"))['total'];

// TOTAL FEES COLLECTED
$paid = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(paid_amount) AS total FROM student_fees"))['total'];
$paid = $paid ? $paid : 0;

// TOTAL PENDING FEES
$pending = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(remaining) AS total FROM student_fees"))['total'];
$pending = $pending ? $pending : 0;
?>

<div class="main-content">

    <div class="container mt-4">

        <h3 class="mb-4"><i class="bi bi-speedometer2"></i> Dashboard</h3>

        <div class="row g-4">

            <!-- Total Students -->
            <div class="col-md-3 col-6">
                <div class="card-box">
                    <div class="icon-box"><i class="bi bi-people"></i></div>
                    <h4 class="mt-2"><?= $students ?></h4>
                    <p>Total Students</p>
                </div>
            </div>

            <!-- Total Courses -->
            <div class="col-md-3 col-6">
                <div class="card-box">
                    <div class="icon-box"><i class="bi bi-journal-bookmark"></i></div>
                    <h4 class="mt-2"><?= $courses ?></h4>
                    <p>Total Courses</p>
                </div>
            </div>

            <!-- Fees Collected -->
            <div class="col-md-3 col-6">
                <div class="card-box">
                    <div class="icon-box"><i class="bi bi-cash-stack"></i></div>
                    <h4 class="mt-2">₹<?= $paid ?></h4>
                    <p>Total Fees Collected</p>
                </div>
            </div>

            <!-- Pending Fees -->
            <div class="col-md-3 col-6">
                <div class="card-box">
                    <div class="icon-box"><i class="bi bi-exclamation-circle"></i></div>
                    <h4 class="mt-2">₹<?= $pending ?></h4>
                    <p>Pending Fees</p>
                </div>
            </div>

        </div>

        <!-- QUICK ACTIONS -->
        <h4 class="mt-5">Quick Actions</h4>
        <div class="row mt-3">

            <div class="col-md-3 col-6">
                <a href="new_registration.php" class="btn btn-primary quick-btn">
                    <i class="bi bi-person-plus"></i> Add Registration  
                </a>
            </div>

            <div class="col-md-3 col-6">
                <a href="add_course.php" class="btn btn-success quick-btn">
                    <i class="bi bi-plus-circle"></i> Add Course
                </a>
            </div>

            <div class="col-md-3 col-6">
                <a href="student_fees.php" class="btn btn-warning quick-btn">
                    <i class="bi bi-wallet2"></i> Fees Entry
                </a>
            </div>

            <div class="col-md-3 col-6">
                <a href="all_students.php" class="btn btn-dark quick-btn">
                    <i class="bi bi-eye"></i> View Students
                </a>
            </div>

        </div>

    </div>
</div>

<?php include 'footer.php'; ?>
