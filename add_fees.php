<?php
include 'connection.php';

include 'sidebar.php';

// fetch students & courses for dropdowns
$students = mysqli_query($conn, "SELECT id, student_name FROM students ORDER BY student_name");
$courses = mysqli_query($conn, "SELECT id, course, fees FROM courses ORDER BY course");

$msg = '';
if (isset($_POST['submit'])) {
    $student_id  = (int) $_POST['student_id'];
    $course_id   = (int) $_POST['course_id'];
    $total_fee   = (float) $_POST['total_fee'];
    $paid_amount = (float) $_POST['paid_amount'];
    $remaining_amount = (float) $_POST['remaining_amount'];
    $payment_mode = mysqli_real_escape_string($conn, $_POST['payment_mode']);
    $remarks     = mysqli_real_escape_string($conn, $_POST['remarks']);

    // If your table uses a generated remaining column, you don't need to set remaining.
    $sql = "INSERT INTO student_fees (student_id, course_id, total_fee, paid_amount, remaining, payment_mode, remarks)
            VALUES ('$student_id', '$course_id', '$total_fee', '$paid_amount', '$remaining_amount', '$payment_mode', '$remarks')";

    if (mysqli_query($conn, $sql)) {
        $msg = "<div class='alert alert-success'>Payment recorded successfully.</div>";
    } else {
        $msg = "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
    }
}
?>

<div class="main-content">
    <div class="container mt-4">
        <div class="card p-4 shadow-sm">
            <h4 class="mb-3"><i class="bi bi-wallet2"></i> Add Payment</h4>

            <?= $msg ?>

            <form method="post">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Student</label>
                        <select name="student_id" id="studentSelect" class="form-control" required>
                            <option value="">-- Select student --</option>
                            <?php while ($s = mysqli_fetch_assoc($students)) { ?>
                            <option value="<?= $s['id'] ?>"><?= htmlspecialchars($s['student_name']) ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Course</label>
                        <select name="course_id" id="courseSelect" class="form-control" required>
                            <option value="">-- Select course --</option>
                            <?php
              // Reset pointer and re-run for options (we used $courses once earlier)
              mysqli_data_seek($courses, 0);
              while ($c = mysqli_fetch_assoc($courses)) { ?>
                            <option value="<?= $c['id'] ?>" data-fee="<?= $c['fees'] ?>">
                                <?= htmlspecialchars($c['course']) ?> (₹<?= $c['fees'] ?>)</option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Total Fee (₹)</label>
                        <input type="number" step="0.01" name="total_fee" id="totalFee" class="form-control" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Paid Amount (₹)</label>
                        <input type="number" step="0.01" name="paid_amount" id="paidAmount" class="form-control"
                            required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Remaining (₹)</label>
                        <input type="number" step="0.01" id="remainingAmount" name="remaining_amount" class="form-control" readonly>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Payment Mode</label>
                        <select name="payment_mode" class="form-control">
                            <option>Cash</option>
                            <option>Online</option>
                            <option>Cheque</option>
                        </select>
                    </div>

                    <div class="col-md-8">
                        <label class="form-label">Remarks</label>
                        <input type="text" name="remarks" class="form-control">
                    </div>

                    <div class="col-12">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="bi bi-check-circle"></i>
                            Save Payment</button>
                        <a href="view_fees.php" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// autofill total fee from selected course
document.getElementById('courseSelect').addEventListener('change', function() {
    const fee = parseFloat(this.options[this.selectedIndex].getAttribute('data-fee') || 0);
    document.getElementById('totalFee').value = fee.toFixed(2);
    recalc();
});
document.getElementById('paidAmount').addEventListener('input', recalc);
document.getElementById('totalFee').addEventListener('input', recalc);

function recalc() {
    const total = parseFloat(document.getElementById('totalFee').value) || 0;
    const paid = parseFloat(document.getElementById('paidAmount').value) || 0;
    document.getElementById('remainingAmount').value = (total - paid).toFixed(2);
}
</script>

<?php include 'footer.php'; ?>