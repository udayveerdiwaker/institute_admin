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

$edit_id = $_GET['edit'] ?? '';
$course = $duration = $fees = $monthly_fee = $details = '';


if($edit_id){
    $q = mysqli_query($conn,"SELECT * FROM courses WHERE id='$edit_id'");
    $data = mysqli_fetch_assoc($q);
    $course = $data['course'];
    $duration = $data['duration'];
    $fees = $data['fees'];
    $monthly_fee = $data['monthly_fee'];
    $details = $data['course_details'];
}

/* SAVE */
if(isset($_POST['save'])){
    $course = $_POST['course'];
    $duration = $_POST['duration'];
    $fees = $_POST['fees'];
    $monthly_fee = $_POST['monthly_fee'];
    $details = $_POST['course_details'];

    if($edit_id){
        mysqli_query($conn,"
        UPDATE courses SET
        course='$course',
        duration='$duration',
        fees='$fees',
        monthly_fee='$monthly_fee',
        course_details='$details'
        WHERE id='$edit_id'
        ");
    } else {
        mysqli_query($conn,"
        INSERT INTO courses(course,duration,fees,monthly_fee,course_details)
        VALUES('$course','$duration','$fees','$monthly_fee','$details')
        ");
    }
    header("Location: course_list.php");
    exit;
}
include 'sidebar.php';

?>

<div class="main-content">
    <div class="container mt-4">

        <h4><?= $edit_id?'Edit':'Add' ?> Course</h4>

        <form method="post" class="card p-4 shadow">

            <div class="mb-3">
                <label>Course Name</label>
                <input type="text" name="course" class="form-control" value="<?= htmlspecialchars($course) ?>" required>
            </div>
            <div class="mb-3">
                <label>Duration</label>
                <input type="text" name="duration" class="form-control" value="<?= htmlspecialchars($duration) ?>"
                    required>
            </div>
            <div class="mb-3">
                <label>Total Fees</label>
                <input type="number" name="fees" class="form-control" value="<?= $fees ?>" required>
            </div>

            <div class="mb-3">
                <label>Monthly Fee</label>
                <input type="number" name="monthly_fee" class="form-control" value="<?= $monthly_fee ?>" required>
            </div>

            <div class="mb-3">
                <label>Course Details</label>
                <textarea name="course_details" class="form-control"
                    rows="4"><?= htmlspecialchars($details) ?></textarea>
            </div>

            <button name="save" class="btn btn-success">Save</button>
            <a href="course_list.php" class="btn btn-secondary">Cancel</a>

        </form>
    </div>
</div>

<?php include 'footer.php'; ?>