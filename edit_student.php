<?php include 'connection.php'; ?>

<?php
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM students WHERE id = $id");
$student = mysqli_fetch_assoc($result);

$courses = mysqli_query($conn, "SELECT * FROM courses");

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $course = $_POST['course'];
    $duration = $_POST['duration'];
    $fees = $_POST['fees'];
    $date = $_POST['date'];

    $sql = "UPDATE students SET 
                name='$name',
                course='$course',
                duration='$duration',
                fees='$fees',
                date='$date'
            WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: all_students.php");
        exit;
    }
}
?>

<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="container mt-4">
    <h3 class="mb-4">Edit Student</h3>

    <form method="POST" class="p-4 bg-white shadow-sm rounded">

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="<?= $student['name']; ?>" required>
        </div>

        <div class="mb-3">
            <label>Course</label>
            <select name="course" class="form-control" required>
                <?php while($c = mysqli_fetch_assoc($courses)) { ?>
                <option value="<?= $c['id']; ?>"
                    <?= ($student['course'] == $c['id']) ? 'selected' : '' ?>>
                    <?= $c['course']; ?>
                </option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Duration</label>
            <input type="text" name="duration" class="form-control" value="<?= $student['duration']; ?>" required>
        </div>

        <div class="mb-3">
            <label>Fee</label>
            <input type="number" name="fee" class="form-control" value="<?= $student['fee']; ?>" required>
        </div>

        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" class="form-control" value="<?= $student['date']; ?>" required>
        </div>

        <button name="update" class="btn btn-success">Update</button>
        <a href="all_students.php" class="btn btn-secondary">Back</a>
    </form>
</div>

<?php include 'footer.php'; ?>
