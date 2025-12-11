<?php
session_start();

if (!isset($_SESSION['admin_logged'])) {
    header("Location: login.php");
    exit;
}
// dashboard.php - full UI + PHP + Charts (monthly & yearly)
// Turn on errors for debugging (remove in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'connection.php';
include 'sidebar.php';
 ?>

<?php
if (isset($_POST['submit'])) {
    $course = $_POST['course'];
    $duration = $_POST['duration'];
    $fees = $_POST['fees'];

    $sql = "INSERT INTO courses (course, duration, fees) VALUES ('$course', '$duration', '$fees')";
    if (mysqli_query($conn, $sql)) {
        header("Location: course_list.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<div class="main-content">

    <div class="container mt-4">
        <div class="card shadow-sm p-4">
            <h4 class="mb-4"><i class="bi bi-journal-bookmark"></i> Add New Course</h4>

            <form action="" method="post">
                <div class="mb-3">
                    <label class="form-label">Course Name</label>
                    <input type="text" name="course" class="form-control" placeholder="Enter course name" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Duration</label>
                    <input type="text" name="duration" class="form-control" placeholder="e.g. 3 Months / 1 Year"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Fees (₹)</label>
                    <input type="number" name="fees" class="form-control" step="0.01" placeholder="Enter course fee"
                        required>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Add Course
                </button>
                <a href="index.php" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>