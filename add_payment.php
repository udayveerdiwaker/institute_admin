<?php include 'connection.php'; ?>
<?php include 'sidebar.php'; ?>


<?php
if (isset($_POST['submit'])) {
  $student_id = $_POST['student_id'];
  $course_id = $_POST['course_id'];
  $total_fee = $_POST['total_fee'];
  $paid_amount = $_POST['paid_amount'];
  $payment_mode = $_POST['payment_mode'];
  $remarks = $_POST['remarks'];

  $sql = "INSERT INTO student_fees (student_id, course_id, total_fee, paid_amount, payment_mode, remarks)
          VALUES ('$student_id', '$course_id', '$total_fee', '$paid_amount', '$payment_mode', '$remarks')";
  if (mysqli_query($conn, $sql)) {
    header("Location: student_fees.php");
    exit;
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
?>

<div class="main-content">
    <div class="container mt-4">
        <div class="card shadow-sm p-4">
            <h4><i class="bi bi-wallet2"></i> Add Student Payment</h4>

            <form method="post">
                <div class="mb-3">
                    <label>Student</label>
                    <select name="student_id" class="form-control" required>
                        <option value="">Select Student</option>
                        <?php
            $students = mysqli_query($conn, "SELECT * FROM students");
            while ($row = mysqli_fetch_assoc($students)) {
              echo "<option value='{$row['id']}'>{$row['name']}</option>";
            }
            ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Course</label>
                    <select name="course_id" class="form-control" required>
                        <option value="">Select Course</option>
                        <?php
            $courses = mysqli_query($conn, "SELECT * FROM courses");
            while ($row = mysqli_fetch_assoc($courses)) {
              echo "<option value='{$row['id']}'>{$row['course']}</option>";
            }
            ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Total Fee (₹)</label>
                    <input type="number" step="0.01" name="total_fee" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Paid Amount (₹)</label>
                    <input type="number" step="0.01" name="paid_amount" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Payment Mode</label>
                    <select name="payment_mode" class="form-control">
                        <option>Cash</option>
                        <option>Online</option>
                        <option>Cheque</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Remarks</label>
                    <textarea name="remarks" class="form-control" rows="2"></textarea>
                </div>

                <button type="submit" name="submit" class="btn btn-primary"><i class="bi bi-check-circle"></i> Save
                    Payment</button>
                <a href="fees.php" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Back</a>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>