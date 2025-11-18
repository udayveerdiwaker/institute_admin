<?php

use FontLib\Table\Type\head;

include 'connection.php';
include 'sidebar.php';

$msg = '';
// fetch students & courses for convenience
$students = mysqli_query($conn, "SELECT id, student_name FROM students ORDER BY student_name");

if (isset($_POST['submit'])) {
    $student_id = (int)$_POST['student_id'];
    $course_id = (int)$_POST['course_id'];
    $total_fee = (float)$_POST['total_fee'];
    $paid_amount = (float)$_POST['paid_amount'];
    $payment_mode = mysqli_real_escape_string($conn, $_POST['payment_mode']);
    $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);

    // compute prev_fee = total paid so far for that student (sum)
    $sumQ = mysqli_query($conn, "SELECT SUM(paid_amount) AS total_paid FROM student_fees WHERE student_id = $student_id");
    $sumR = mysqli_fetch_assoc($sumQ);
    $prev_fee = (float)($sumR['total_paid'] ?? 0);

    // insert new payment row
    $ins = "INSERT INTO student_fees (student_id, course_id, total_fee, paid_amount, prev_fee, payment_mode, remarks)
            VALUES ('$student_id','$course_id','$total_fee','$paid_amount','$prev_fee','$payment_mode','$remarks')";
    if (mysqli_query($conn, $ins)) {
        // $msg = "<div class='alert alert-success'>Payment recorded.</div>";
        header("Location: fees_list.php?student_id=$student_id");
        exit;
    } else {
        $msg = "<div class='alert alert-danger'>Error: ".mysqli_error($conn)."</div>";
    }
}
?>

<div class="main-content">
  <div class="container mt-4">
    <div class="card shadow-sm p-4">
      <h4 class="mb-3">Add Payment</h4>
      <?= $msg ?>

      <form method="post">
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Student</label>
            <select name="student_id" id="studentSelect" class="form-control" required>
              <option value="">-- Select Student --</option>
              <?php while ($s = mysqli_fetch_assoc($students)) {
                echo "<option value='{$s['id']}'>".htmlspecialchars($s['student_name'])."</option>";
              } ?>
            </select>
          </div>

          <div class="col-md-6">
            <label class="form-label">Course</label>
            <select name="course_id" id="courseSelect" class="form-control" required>
              <option value="">-- Select Course --</option>
              <?php
              $courses = mysqli_query($conn, "SELECT id, course, fees FROM courses ORDER BY course");
              while ($c = mysqli_fetch_assoc($courses)) {
                  echo "<option value='{$c['id']}' data-fee='{$c['fees']}'>{$c['course']} (₹{$c['fees']})</option>";
              }
              ?>
            </select>
          </div>

          <div class="col-md-4">
            <label class="form-label">Total Fee (₹)</label>
            <input type="number" step="0.01" name="total_fee" id="totalFee" class="form-control" required>
          </div>

          <div class="col-md-4">
            <label class="form-label">Paid Amount (₹)</label>
            <input type="number" step="0.01" name="paid_amount" id="paidAmount" class="form-control" required>
          </div>

          <div class="col-md-4">
            <label class="form-label">Remaining (auto)</label>
            <input type="text" id="remaining" class="form-control" readonly>
          </div>

          <div class="col-md-6">
            <label class="form-label">Payment Mode</label>
            <select name="payment_mode" class="form-control">
              <option>Cash</option>
              <option>Online</option>
              <option>Cheque</option>
            </select>
          </div>

          <div class="col-md-6">
            <label class="form-label">Remarks</label>
            <input type="text" name="remarks" class="form-control">
          </div>

          <div class="col-12">
            <button class="btn btn-primary" name="submit"><i class="bi bi-check-circle"></i> Save Payment</button>
            <a href="fees_list.php" class="btn btn-secondary">Back</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
// autofill total fee when course selected
document.getElementById('courseSelect').addEventListener('change', function(){
  const fee = parseFloat(this.options[this.selectedIndex].getAttribute('data-fee')||0);
  document.getElementById('totalFee').value = fee.toFixed(2);
  recalc();
});
document.getElementById('paidAmount').addEventListener('input', recalc);
document.getElementById('totalFee').addEventListener('input', recalc);
function recalc(){
  const total = parseFloat(document.getElementById('totalFee').value)||0;
  const paid = parseFloat(document.getElementById('paidAmount').value)||0;
  document.getElementById('remaining').value = (total - paid).toFixed(2);
}
</script>

<?php include 'footer.php'; ?>
