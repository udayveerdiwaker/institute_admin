<?php
// edit_fee.php
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

if (!isset($_GET['id'])) {
    header("Location: fees_list.php");
    exit;   
}
$id = (int) $_GET['id'];

// fetch row
$q = mysqli_query($conn, "SELECT sf.*, s.student_name, c.course FROM student_fees sf
    LEFT JOIN students s ON sf.student_id = s.id
    LEFT JOIN courses c ON sf.course_id = c.id
    WHERE sf.id = $id LIMIT 1");

if (!$q || mysqli_num_rows($q) == 0) {
    echo "<div class='main-content container mt-4'><div class='alert alert-danger'>Record not found.</div></div>";
    include 'footer.php';
    exit;
}
$row = mysqli_fetch_assoc($q);
$student_id = (int)$row['student_id'];

$msg = '';
if (isset($_POST['update'])) {
    // Basic sanitization
    $paid_amount = (float) $_POST['paid_amount'];
    $prev_fee = (float) $_POST['prev_fee'];
    $payment_mode = mysqli_real_escape_string($conn, $_POST['payment_mode']);
    $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);
    $date  = mysqli_real_escape_string($conn, $_POST['fees_date']);

    // Update
    $upd = "UPDATE student_fees SET paid_amount='$paid_amount', prev_fee='$prev_fee', payment_mode='$payment_mode', remarks='$remarks', fees_date='$date' WHERE id=$id";
    if (mysqli_query($conn, $upd)) {
        $msg = "<div class='alert alert-success'>Payment updated successfully.</div>";
        // refresh row
        $q = mysqli_query($conn, "SELECT sf.*, s.student_name, c.course FROM student_fees sf
            LEFT JOIN students s ON sf.student_id = s.id
            LEFT JOIN courses c ON sf.course_id = c.id
            WHERE sf.id = $id LIMIT 1");
        $row = mysqli_fetch_assoc($q);
        $student_id = (int)$row['student_id'];
        header("Location: view_fees.php?student_id=$student_id");
        exit;
    } else {
        $msg = "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
    }
}
include 'sidebar.php';
?>

<div class="main-content">
    <div class="container mt-4">
        <div class="card shadow-sm p-4">
            <h4>Edit Payment — <?= htmlspecialchars($row['student_name']) ?></h4>

            <?= $msg ?>

            <form method="post" class="row g-3 mt-2">
                <div class="col-md-4">
                    <label class="form-label">Paid Amount (₹)</label>
                    <input type="number" step="0.01" name="paid_amount" class="form-control"
                        value="<?= htmlspecialchars($row['paid_amount']) ?>" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Prev Paid (₹)</label>
                    <input type="number" step="0.01" name="prev_fee" class="form-control"
                        value="<?= htmlspecialchars($row['prev_fee'] ?? 0) ?>">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Payment Mode</label>
                    <select name="payment_mode" class="form-control">
                        <option <?= $row['payment_mode']=='Cash' ? 'selected' : '' ?>>Cash</option>
                        <option <?= $row['payment_mode']=='Online' ? 'selected' : '' ?>>Online</option>
                        <option <?= $row['payment_mode']=='Cheque' ? 'selected' : '' ?>>Cheque</option>
                        <option <?= $row['payment_mode']=='UPI' ? 'selected' : '' ?>>UPI</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Date</label>
                    <input type="date" name="fees_date" class="form-control"
                        value="<?= htmlspecialchars($row['fees_date']) ?>" required>
                </div>

                <div class="col-12">
                    <label class="form-label">Remarks</label>
                    <textarea name="remarks" class="form-control"><?= htmlspecialchars($row['remarks']) ?></textarea>
                </div>

                <div class="col-12">
                    <button name="update" class="btn btn-primary">Save Changes</button>
                    <a href="view_fees.php?student_id=<?= $student_id ?>" class="btn btn-secondary">Back</a>
                </div>
            </form>

        </div>
    </div>
</div>

<?php include 'footer.php'; ?>