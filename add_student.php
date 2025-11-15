<?php include 'sidebar.php'; ?>

<?php
// Fetch courses for dropdown
$courses = mysqli_query($conn, "SELECT * FROM courses");

if (isset($_POST['submit'])) {
    $name       = $_POST['name'];
    $course_id  = $_POST['course'];
    $duration   = $_POST['duration'];
    $total_fee  = $_POST['fees'];
    $paid       = $_POST['paid_amount'];
    $mobile     = $_POST['mobile'];
    $address    = $_POST['address'];
    $date       = $_POST['admission_date'];
    $mode       = $_POST['payment_mode'];
    $remarks    = $_POST['remarks'];

    // INSERT INTO students
    $sql1 = "INSERT INTO students (name, course, duration, fees, date) 
             VALUES ('$name', '$course_id', '$duration', '$total_fee', '$date')";

    if (mysqli_query($conn, $sql1)) {

        // Get newly inserted student ID
        $student_id = mysqli_insert_id($conn);

        // INSERT INTO student_fees
        $sql2 = "INSERT INTO student_fees 
                (student_id, course_id, total_fee, paid_amount, payment_mode, remarks) 
                 VALUES 
                ('$student_id', '$course_id', '$total_fee', '$paid', '$mode', '$remarks')";

        mysqli_query($conn, $sql2);

        header("Location: all_students.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<style>
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

            <h4 class="mb-4"><i class="bi bi-person-plus"></i> Add New Student</h4>

            <form method="POST">

                <!-- Student Name -->
                <div class="mb-3">
                    <label class="form-label">Student Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <!-- Course Dropdown -->
                <div class="mb-3">
                    <label class="form-label">Select Course</label>
                    <select name="course_id" id="courseSelect" class="form-control" required>
                        <option value="">-- Select Course --</option>
                        <?php while ($c = mysqli_fetch_assoc($courses)) { ?>
                            <option value="<?= $c['id']; ?>"
                                data-duration="<?= $c['duration']; ?>"
                                data-fees="<?= $c['fees']; ?>">
                                <?= $c['course']; ?> (₹<?= $c['fees']; ?>)
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <!-- Auto Duration -->
                <div class="mb-3">
                    <label class="form-label">Course Duration</label>
                    <input type="text" id="duration" name="duration" class="form-control" readonly required>
                </div>

                <!-- Auto Total Fees -->
                <div class="mb-3">
                    <label class="form-label">Total Fees (₹)</label>
                    <input type="number" id="total_fee" name="total_fee" class="form-control" readonly required>
                </div>

                <!-- Paid Amount -->
                <div class="mb-3">
                    <label class="form-label">Paid Amount (₹)</label>
                    <input type="number" id="paid_amount" name="paid_amount" class="form-control" required>
                </div>

                <!-- Auto Remaining Amount -->
                <div class="mb-3">
                    <label class="form-label">Remaining Amount (₹)</label>
                    <input type="number" id="remaining" class="form-control" readonly>
                </div>

                <!-- Mobile -->
                <div class="mb-3">
                    <label class="form-label">Mobile Number</label>
                    <input type="text" name="mobile" class="form-control" required>
                </div>

                <!-- Address -->
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control" rows="3" required></textarea>
                </div>

                <!-- Admission Date -->
                <div class="mb-3">
                    <label class="form-label">Admission Date</label>
                    <input type="date" name="admission_date" class="form-control" required>
                </div>

                <!-- Payment Mode -->
                <div class="mb-3">
                    <label class="form-label">Payment Mode</label>
                    <select name="payment_mode" class="form-control">
                        <option>Cash</option>
                        <option>Online</option>
                        <option>Cheque</option>
                    </select>
                </div>

                <!-- Remarks -->
                <div class="mb-3">
                    <label class="form-label">Remarks</label>
                    <textarea name="remarks" class="form-control"></textarea>
                </div>

                <!-- Submit -->
                <button type="submit" name="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Add Student
                </button>

                <a href="index.php" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Back
                </a>

            </form>
        </div>
    </div>
</div>

<script>
    // AUTO FILL DURATION + FEES
    document.getElementById('courseSelect').addEventListener('change', function() {
        var selected = this.options[this.selectedIndex];
        document.getElementById('duration').value = selected.getAttribute('data-duration');
        document.getElementById('total_fee').value = selected.getAttribute('data-fee');
        calculateRemaining();
    });

    // CALCULATE REMAINING AMOUNT
    document.getElementById('paid_amount').addEventListener('input', calculateRemaining);

    function calculateRemaining() {
        let total = parseFloat(document.getElementById('total_fee').value) || 0;
        let paid = parseFloat(document.getElementById('paid_amount').value) || 0;
        document.getElementById('remaining').value = total - paid;
    }
</script>

<?php include 'footer.php'; ?>