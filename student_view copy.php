<?php
// student_view.php
include 'connection.php';
include 'sidebar.php';

if (!isset($_GET['id'])) {
    header('Location: all_students.php');
    exit;
}
$student_id = (int) $_GET['id'];

// Fetch student + course
$sq = "SELECT s.*, c.course AS course_name FROM students s LEFT JOIN courses c ON s.course_id = c.id WHERE s.id = $student_id LIMIT 1";
$res = mysqli_query($conn, $sq);
if (!$res || mysqli_num_rows($res) == 0) {
    echo "<div class='main-content container mt-4'>Student not found.</div>";
    include 'footer.php';
    exit;
}
$student = mysqli_fetch_assoc($res);

// Fetch payments (history)
$fees_q = "SELECT * FROM student_fees WHERE student_id = $student_id ORDER BY created_at DESC";
$fees_res = mysqli_query($conn, $fees_q);

// Compute totals
$sumQ = mysqli_query($conn, "SELECT SUM(paid_amount) AS total_paid, MAX(total_fee) AS total_fee FROM student_fees WHERE student_id = $student_id");
$sumR = mysqli_fetch_assoc($sumQ);
$total_paid = (float)($sumR['total_paid'] ?? 0);
$total_fee = (float)($sumR['total_fee'] ?? 0);
$overall_remaining = $total_fee - $total_paid;
?>

<div class="main-content">
    <div class="container mt-4">
        <div class="row">
            <!-- Profile -->
            <div class="col-md-4">
                <div class="card p-3">
                    <div class="text-center">
                        <img src="<?= !empty($student['photo']) ? htmlspecialchars($student['photo']) : 'student_img/default.png' ?>"
                            style="width:150px;height:150px;object-fit:cover;border-radius:8px" alt="photo">
                    </div>
                    <h4 class="mt-3 text-center"><?= htmlspecialchars($student['student_name']) ?></h4>
                    <p class="text-center"><?= htmlspecialchars($student['course_name']) ?></p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Father:</strong> <?= htmlspecialchars($student['father_name']) ?></li>
                        <li class="list-group-item"><strong>DOB:</strong> <?= htmlspecialchars($student['dob']) ?></li>
                        <li class="list-group-item"><strong>Phone:</strong> <?= htmlspecialchars($student['phone']) ?></li>
                        <li class="list-group-item"><strong>Email:</strong> <?= htmlspecialchars($student['email']) ?></li>
                        <li class="list-group-item"><strong>Address:</strong> <?= nl2br(htmlspecialchars($student['address'])) ?></li>
                    </ul>

                    <div class="mt-3 d-grid">
                        <a href="student_edit.php?id=<?= $student['id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="student_delete.php?id=<?= $student['id'] ?>" class="btn btn-danger" onclick="return confirm('Delete this student?')">Delete</a>
                    </div>
                </div>
            </div>

            <!-- Details & Fees -->
            <div class="col-md-8">
                <div class="card p-3 mb-3">
                    <h5>Course & Admission</h5>
                    <div class="row">
                        <div class="col-md-6"><strong>Course:</strong> <?= htmlspecialchars($student['course_name']) ?></div>
                        <div class="col-md-6"><strong>Batch Time:</strong> <?= htmlspecialchars($student['batch_time']) ?></div>
                        <div class="col-md-6 mt-2"><strong>Duration:</strong> <?= htmlspecialchars($student['duration']) ?></div>
                        <div class="col-md-6 mt-2"><strong>Admission Date:</strong> <?= htmlspecialchars($student['admission_date']) ?></div>
                    </div>
                </div>

                <div class="card p-3 mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Fees Summary</h5>
                        <div>
                            <a href="add_fees.php?student_id=<?= $student_id ?>" class="btn btn-sm btn-primary">Add Payment</a>
                            <a href="remaining.php?student_id=<?= $student_id ?>" class="btn btn-sm btn-info">Add Remaining</a>
                            <a href="combined_receipt.php?student_id=<?= $student_id ?>" class="btn btn-sm btn-success">Combined Receipt</a>
                            <a href="combined_receipt_pdf.php?student_id=<?= $student_id ?>" class="btn btn-sm btn-danger" target="_blank">Combined PDF</a>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4"><strong>Total Fee:</strong> ₹<?= number_format($total_fee, 2) ?></div>
                        <div class="col-md-4"><strong>Total Paid:</strong> ₹<?= number_format($total_paid, 2) ?></div>
                        <div class="col-md-4"><strong>Remaining:</strong> ₹<?= number_format($overall_remaining, 2) ?></div>
                    </div>
                </div>

                <!-- Payments Table -->
                <div class="card p-3">
                    <h5>Payments History</h5>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered">
                            <thead class="table-light text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Payment Date</th>
                                    <th>Paid (₹)</th>
                                    <th>Prev Paid (₹)</th>
                                    <th>Remaining (₹)</th>
                                    <th>Mode</th>
                                    <th>Remarks</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                if ($fees_res && mysqli_num_rows($fees_res) > 0) {
                                    $i = 1;
                                    while ($f = mysqli_fetch_assoc($fees_res)) {
                                        // compute remaining for that row defensively
                                        $row_remaining = isset($f['remaining']) ? $f['remaining'] : (($f['total_fee'] ?? 0) - ($f['paid_amount'] ?? 0));
                                        echo "<tr>
                                <td>{$i}</td>
                                <td>" . htmlspecialchars($f['created_at'] ?? $f['payment_date']) . "</td>
                                <td>₹" . number_format($f['paid_amount'], 2) . "</td>
                                <td>₹" . number_format($f['prev_fee'] ?? 0, 2) . "</td>
                                <td>₹" . number_format($row_remaining, 2) . "</td>
                                <td>" . htmlspecialchars($f['payment_mode']) . "</td>
                                <td>" . htmlspecialchars($f['remarks']) . "</td>
                                <td>
                                  <a href='receipt.php?fee_id={$f['id']}' class='btn btn-sm btn-success' target='_blank'>Receipt</a>
                                  <a href='receipt_pdf.php?fee_id={$f['id']}' class='btn btn-sm btn-danger' target='_blank'>PDF</a>
                                  <a href='edit_fee.php?id={$f['id']}&student_id={$student_id}' class='btn btn-sm btn-warning'>Edit</a>
                                  <a href='delete_fee.php?id={$f['id']}&student_id={$student_id}' class='btn btn-sm btn-outline-danger' onclick=\"return confirm('Delete this payment?')\">Delete</a>
                                </td>
                              </tr>";
                                        $i++;
                                    }
                                } else {
                                    echo "<tr><td colspan='8' class='text-center'>No payments yet</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>