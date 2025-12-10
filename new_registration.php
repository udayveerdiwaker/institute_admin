<?php

use FontLib\Table\Type\head;

 ?>
<?php include 'connection.php'; 


// Fetch courses
$courses = mysqli_query($conn, "SELECT * FROM courses");

if (isset($_POST['submit'])) {

    // Personal Info
    $student_name = $_POST['student_name'];
    $father_name  = $_POST['father_name'];
    $dob          = $_POST['dob'];
    $qualification = $_POST['qualification'];

    // Photo Upload
    $photo_name = $_FILES['photo']['name'];
    $photo_temp = $_FILES['photo']['tmp_name'];
    $photo_path = "student_img/" . $photo_name;

    move_uploaded_file($photo_temp, $photo_path);

    // Course Info
    $course_id   = $_POST['course_id'];
    $batch_time  = $_POST['batch_time'];
    $duration    = $_POST['duration'];
    $admission_date = $_POST['admission_date'];

    // Contact Info
    $address  = $_POST['address'];
    $phone    = $_POST['phone'];
    $email    = $_POST['email'];
    $note     = $_POST['note'];

    // Fees
    $total_fee  = $_POST['total_fee'];
    $paid_amount = $_POST['paid_amount'];
    $remaining = $total_fee - $paid_amount;
    $payment_mode = $_POST['payment_mode'];
    $remarks = $_POST['remarks'];

    // Insert main student info
    $sql1 = "INSERT INTO students (student_name, father_name, dob, qualification, photo, 
                                   course_id, batch_time, duration, admission_date, 
                                   address, phone, email, extra_note)
             VALUES ('$student_name', '$father_name', '$dob', '$qualification', '$photo_path',
                     '$course_id', '$batch_time', '$duration', '$admission_date',
                     '$address', '$phone', '$email', '$note')";

    if (mysqli_query($conn, $sql1)) {

        $student_id = mysqli_insert_id($conn);

        // Insert fees
        $sql2 = "INSERT INTO student_fees (student_id, course_id, total_fee, paid_amount, remaining, payment_mode, remarks, fees_date)
                 VALUES ('$student_id', '$course_id', '$total_fee', '$paid_amount', '$remaining', '$payment_mode', '$remarks', '$admission_date')";

        mysqli_query($conn, $sql2);

        // echo "<script>alert('Student Registered Successfully'); window.location='all_students.php';</script>";
        header("Location: all_students.php");
        exit;
    }
}
 include 'sidebar.php';
?>

<style>
.section-title {
    background: #f1f1f1;
    padding: 10px;
    border-left: 4px solid #0d6efd;
    margin-bottom: 15px;
    font-weight: bold;
}

.form-card {
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}
</style>

<div class="main-content">
    <div class="container mt-4">
        <div class="form-card">

            <h3 class="mb-4"><i class="bi bi-person-plus"></i> New Student Registration</h3>

            <form method="POST" enctype="multipart/form-data">

                <!-- PERSONAL INFORMATION -->
                <div class="section-title">1. Personal Information</div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Student Name</label>
                        <input type="text" name="student_name" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Father Name</label>
                        <input type="text" name="father_name" class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>D.O.B</label>
                        <input type="date" name="dob" class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Qualification</label>
                        <input type="text" name="qualification" class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Photo</label>
                        <input type="file" name="photo" class="form-control" required>
                    </div>
                </div>

                <!-- COURSE INFORMATION -->
                <div class="section-title">2. Course Information</div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Select Course</label>
                        <select name="course_id" id="courseSelect" class="form-control" required>
                            <option value="">-- Select Course --</option>
                            <?php while ($c = mysqli_fetch_assoc($courses)) { ?>
                            <option value="<?= $c['id'] ?>" data-duration="<?= $c['duration'] ?>"
                                data-fee="<?= $c['fees'] ?>">
                                <?= $c['course'] ?> (₹<?= $c['fees'] ?>)
                            </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Batch Time</label>
                        <input type="text" name="batch_time" class="form-control" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Duration</label>
                        <input type="text" id="duration" name="duration" class="form-control" readonly>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Admission Date</label>
                        <input type="date" name="admission_date" class="form-control" required>
                    </div>
                </div>

                <!-- CONTACT INFORMATION -->
                <div class="section-title">3. Contact Information</div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Address</label>
                        <textarea name="address" class="form-control" rows="2" required></textarea>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Extra Note</label>
                        <input type="text" name="note" class="form-control">
                    </div>
                </div>

                <!-- FEES -->
                <div class="section-title">4. Fees Information</div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label>Total Fees (₹)</label>
                        <input type="number" id="total_fee" name="total_fee" class="form-control" readonly>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Paid Amount (₹)</label>
                        <input type="number" id="paid_amount" name="paid_amount" class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Remaining (₹)</label>
                        <input type="number" id="remaining" class="form-control" readonly>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Payment Mode</label>
                        <select name="payment_mode" class="form-control">
                            <option>Cash</option>
                            <option>Online</option>
                            <option>Cheque</option>
                        </select>
                    </div>

                    <div class="col-md-8 mb-3">
                        <label>Date</label>
                        <input type="date" name="fees_date" class="form-control">
                    </div>

                    <div class="col-md-8 mb-3">
                        <label>Remarks</label>
                        <input type="text" name="remarks" class="form-control">
                    </div>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Register Student
                </button>

            </form>
        </div>
    </div>
</div>

<script>
document.getElementById("courseSelect").addEventListener("change", function() {
    var s = this.options[this.selectedIndex];
    document.getElementById("duration").value = s.getAttribute("data-duration");
    document.getElementById("total_fee").value = s.getAttribute("data-fee");
});

document.getElementById("paid_amount").addEventListener("input", function() {
    let total = parseFloat(document.getElementById('total_fee').value) || 0;
    let paid = parseFloat(this.value) || 0;
    document.getElementById('remaining').value = total - paid;
});
</script>

<?php include 'footer.php'; ?>