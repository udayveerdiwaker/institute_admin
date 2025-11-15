<?php
include 'connection.php';
include 'header.php';
include 'sidebar.php';

if (!isset($_GET['id'])) { header('Location: view_fees.php'); exit; }
$id = (int) $_GET['id'];

// fetch record
$q = mysqli_query($conn, "SELECT sf.*, s.student_name, c.course, c.fee AS course_fee
                          FROM student_fees sf
                          LEFT JOIN students s ON sf.student_id = s.id
                          LEFT JOIN courses c ON sf.course_id = c.id
                          WHERE sf.id = $id");
if (!$q || mysqli_num_rows($q) == 0) { echo "<div class='main-content container mt-4'>Record not found.</div>"; include 'footer.php'; exit; }
$row = mysqli_fetch_assoc($q);

// fetch students and courses
$students = mysqli_query($conn, "SELECT id, student_name FROM students ORDER BY student_name");
$courses = mysqli_query($conn, "SELECT id, course, fee FROM courses ORDER BY course");

$msg = '';
if (isset($_POST['update'])) {
    $student_id  = (int) $_POST['student_id'];
    $course_id   = (int) $_POST['course_id'];
    $total_fee   = (float) $_POST['total_fee'];
    $paid_amount = (float) $_POST['paid_amount'];
    $payment_mode = mysqli_real_escape_string($conn, $_POST['payment_mode']);
    $remarks     = mysqli_real_escape_string($conn, $_POST['remarks']);

    $sql = "UPDATE student_fees SET student_id='$student_id', course_id='$course_id', total_fee='$total_fee',
            paid_amount='$paid_amount', payment_mode='$payment_mode', remarks='$remarks' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        $msg = "<div class='alert alert-success'>Payment updated.</div>";
        // refresh row
        $q = mysqli_query($conn, "SELECT sf.*, s.student_name, c.course, c.fee AS course_fee
                          FROM student_fees sf
                          LEFT JOIN students s ON sf.student_id = s.id
                          LEFT JOIN courses c ON sf.course_id = c.id
                          WHERE sf.id = $id");
        $row = mysqli_fetch_assoc($q);
    } else {
        $msg = "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
    }
}
?>

<div class="main-content">
    <div class="container mt-4">
        <div class="card p-4 shadow-sm">
            <h4 class="mb-3"><i class="bi bi-pencil-square"></i> Edit Payment</h4>

            <?= $msg ?>

            <form method="post">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Student</label>
                        <select name="student_id" class="form-control" required>
                            <?php while ($s = mysqli_fetch_assoc($students)) {
                $sel = ($s['id'] == $row['student_id']) ? 'selected' : '';
                echo "<option value='{$s['id']}' $sel>" . htmlspecialchars($s['student_name']) . "</option>";
              } ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Course</label>
                        <select name="course_id" id="courseSelectEdit" class="form-control" required>
                            <?php
              mysqli_data_seek($courses, 0);
              while ($c = mysqli_fetch_assoc($courses)) {
                $sel = ($c['id'] == $row['course_id']) ? 'selected' : '';
                echo "<option value='{$c['id']}' data-fee='{$c['fee']}' $sel>" . htmlspecialchars($c['course']) . " (₹{$c['fee']})</option>";
              }
              ?>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Total Fee (₹)</label>
                        <input type="number" step="0.01" name="total_fee" id="totalFeeEdit" class="form-control"
                            value="<?= $row['total_fee'] ?>" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Paid Amount (₹)</label>
                        <input type="number" step="0.01" name="paid_amount" id="paidAmountEdit" class="form-control"
                            value="<?= $row['paid_amount'] ?>" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Remaining (₹)</label>
                        <input type="number" step="0.01" id="remainingEdit" class="form-control" readonly>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Payment Mode</label>
                        <select name="payment_mode" class="form-control">
                            <option <?= $row['payment_mode']=='Cash' ? 'selected' : '' ?>>Cash</option>
                            <option <?= $row['payment_mode']=='Online' ? 'selected' : '' ?>>Online</option>
                            <option <?= $row['payment_mode']=='Cheque' ? 'selected' : '' ?>>Cheque</option>
                        </select>
                    </div>

                    <div class="col-md-8">
                        <label class="form-label">Remarks</label>
                        <input type="text" name="remarks" class="form-control"
                            value="<?= htmlspecialchars($row['remarks']) ?>">
                    </div>

                    <div class="col-12">
                        <button type="submit" name="update" class="btn btn-primary">Update Payment</button>
                        <a href="view_fees.php" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function recalcEdit() {
    const total = parseFloat(document.getElementById('totalFeeEdit').value) || 0;
    const paid = parseFloat(document.getElementById('paidAmountEdit').value) || 0;
    document.getElementById('remainingEdit').value = (total - paid).toFixed(2);
}
document.getElementById('courseSelectEdit').addEventListener('change', function() {
    const fee = parseFloat(this.options[this.selectedIndex].getAttribute('data-fee') || 0);
    document.getElementById('totalFeeEdit').value = fee.toFixed(2);
    recalcEdit();
});
document.getElementById('paidAmountEdit').addEventListener('input', recalcEdit);
window.addEventListener('load', recalcEdit);
</script>

<?php include 'footer.php'; ?>