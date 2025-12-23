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
include 'sidebar.php';

if (!isset($_GET['student_id'])) { header('Location: fees_list.php'); exit; }
$student_id = (int)$_GET['student_id'];

$sq = mysqli_query($conn, "SELECT s.student_name, c.course, c.fees AS course_fee FROM students s LEFT JOIN courses c ON s.course_id = c.id WHERE s.id = $student_id");
$stu = mysqli_fetch_assoc($sq);

// totals
$sumQ = mysqli_query($conn, "SELECT SUM(paid_amount) AS total_paid FROM student_fees WHERE student_id = $student_id");
$sumR = mysqli_fetch_assoc($sumQ);
$total_paid = (float)($sumR['total_paid'] ?? 0);
$total_fee = (float)$stu['course_fee'];
$remaining = $total_fee - $total_paid;

// history rows
$hist = mysqli_query($conn, "SELECT * FROM student_fees WHERE student_id = $student_id ORDER BY fees_date DESC, id DESC");
?>

<div class="main-content">
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Payment History — <?= htmlspecialchars($stu['student_name']) ?></h4>
            <div>
                <a href="fees_remaining.php?student_id=<?= $student_id ?>" class="btn btn-primary btn-sm">Add
                    Payment</a>
                <a href="fees_list.php" class="btn btn-secondary btn-sm">Back</a>
            </div>
        </div>

        <div class="card p-3 mb-3">
            <div class="row">
                <div class="col-md-3"><strong>Course:</strong> <?= htmlspecialchars($stu['course']) ?></div>
                <div class="col-md-3"><strong>Total Fee:</strong> ₹<?= number_format($total_fee,2) ?></div>
                <div class="col-md-3"><strong>Paid:</strong> ₹<?= number_format($total_paid,2) ?></div>
                <div class="col-md-3"><strong>Remaining:</strong> ₹<?= number_format($remaining,2) ?></div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>#</th>
                            <th>Payment Date</th>
                            <th>Paid (₹)</th>
                            <th>Prev Paid (₹)</th>
                            <th>Mode</th>
                            <th>Remarks</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
            $i = 1;
            if ($hist && mysqli_num_rows($hist) > 0) {
              while ($h = mysqli_fetch_assoc($hist)) {
                echo "<tr>
                        <td>{$i}</td>
                        <td>{$h['fees_date']}</td>
                        <td>₹".number_format($h['paid_amount'],2)."</td>
                        <td>₹".number_format($h['prev_fee'] ?? 0,2)."</td>
                        <td>".htmlspecialchars($h['payment_mode'])."</td>
                        <td>".htmlspecialchars($h['remarks'])."</td>
                        <td>
                          <a href='fees_delete.php?id={$h['id']}&student_id={$student_id}' class='btn btn-sm btn-danger' onclick=\"return confirm('Delete this payment?')\">Delete</a>
                        </td>
                      </tr>";
                $i++;
              }
            } else {
              echo "<tr><td colspan='7'>No payments yet</td></tr>";
            }
            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>