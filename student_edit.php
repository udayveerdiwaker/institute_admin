<?php
include 'connection.php';

if (!isset($_GET['id'])) { header('Location: all_students.php'); exit; }
$id = (int) $_GET['id'];

// fetch student & courses
$student_q = mysqli_query($conn, "SELECT * FROM students WHERE id = $id");
if (!$student_q || mysqli_num_rows($student_q) == 0) { header('Location: all_students.php'); exit; }
$student = mysqli_fetch_assoc($student_q);
$courses = mysqli_query($conn, "SELECT * FROM courses");

if (isset($_POST['update'])) {
    // sanitize minimally
    $student_name = mysqli_real_escape_string($conn, $_POST['student_name']);
    $father_name  = mysqli_real_escape_string($conn, $_POST['father_name']);
    $dob          = $_POST['dob'];
    $qualification= mysqli_real_escape_string($conn, $_POST['qualification']);
    $course_id    = (int) $_POST['course_id'];
    $batch_time   = mysqli_real_escape_string($conn, $_POST['batch_time']);
    $duration     = mysqli_real_escape_string($conn, $_POST['duration']);
    $admission_date = $_POST['admission_date'];
    $address      = mysqli_real_escape_string($conn, $_POST['address']);
    $phone        = mysqli_real_escape_string($conn, $_POST['phone']);
    $email        = mysqli_real_escape_string($conn, $_POST['email']);
    $note         = mysqli_real_escape_string($conn, $_POST['note']);

    // photo upload if new
    $photo_path = $student['photo'];
    if (!empty($_FILES['photo']['name'])) {
        $photo_name = time() . "_" . basename($_FILES['photo']['name']);
        $tmp = $_FILES['photo']['tmp_name'];
        $dest = "student_img/" . $photo_name;
        if (move_uploaded_file($tmp, $dest)) {
            $photo_path = $dest;
        }
    }

    $upd = "UPDATE students SET
              student_name='$student_name',
              father_name='$father_name',
              dob='$dob',
              qualification='$qualification',
              photo='$photo_path',
              course_id='$course_id',
              batch_time='$batch_time',
              duration='$duration',
              admission_date='$admission_date',
              address='$address',
              phone='$phone',
              email='$email',
              extra_note='$note'
            WHERE id=$id";
    if (mysqli_query($conn, $upd)) {
        header("Location: student_view.php?id=$id");
        exit;
    } else {
        $err = mysqli_error($conn);
    }
}

include 'sidebar.php';
?>

<div class="main-content">
    <div class="container mt-4">
        <h3>Edit Student</h3>

        <?php if (!empty($err)) echo "<div class='alert alert-danger'>$err</div>"; ?>

        <form method="POST" enctype="multipart/form-data" class="p-4 bg-white shadow-sm rounded">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Student Name</label>
                    <input type="text" name="student_name" class="form-control"
                        value="<?= htmlspecialchars($student['student_name']) ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Father Name</label>
                    <input type="text" name="father_name" class="form-control"
                        value="<?= htmlspecialchars($student['father_name']) ?>" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label>DOB</label>
                    <input type="date" name="dob" class="form-control" value="<?= $student['dob'] ?>">
                </div>

                <div class="col-md-4 mb-3">
                    <label>Qualification</label>
                    <input type="text" name="qualification" class="form-control"
                        value="<?= htmlspecialchars($student['qualification']) ?>">
                </div>

                <div class="col-md-4 mb-3">
                    <label>Photo (leave to keep)</label>
                    <input type="file" name="photo" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Course</label>
                    <select name="course_id" class="form-control" required>
                        <?php while($c = mysqli_fetch_assoc($courses)) {
              $sel = ($student['course_id'] == $c['id']) ? 'selected' : '';
              echo "<option value='{$c['id']}' $sel>{$c['course']}</option>";
            } ?>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Batch Time</label>
                    <input type="text" name="batch_time" class="form-control"
                        value="<?= htmlspecialchars($student['batch_time']) ?>">
                </div>

                <div class="col-md-4 mb-3">
                    <label>Duration</label>
                    <input type="text" name="duration" class="form-control"
                        value="<?= htmlspecialchars($student['duration']) ?>">
                </div>

                <div class="col-md-4 mb-3">
                    <label>Admission Date</label>
                    <input type="date" name="admission_date" class="form-control"
                        value="<?= $student['admission_date'] ?>">
                </div>

                <div class="col-md-4 mb-3">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control"
                        value="<?= htmlspecialchars($student['phone']) ?>">
                </div>

                <div class="col-md-12 mb-3">
                    <label>Address</label>
                    <textarea name="address"
                        class="form-control"><?= htmlspecialchars($student['address']) ?></textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control"
                        value="<?= htmlspecialchars($student['email']) ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Extra Note</label>
                    <input type="text" name="note" class="form-control"
                        value="<?= htmlspecialchars($student['extra_note']) ?>">
                </div>
            </div>

            <button name="update" class="btn btn-primary">Save Changes</button>
            <a href="student_view.php?id=<?= $id ?>" class="btn btn-secondary">Cancel</a>
        </form>

    </div>
</div>

<?php include 'footer.php'; ?>