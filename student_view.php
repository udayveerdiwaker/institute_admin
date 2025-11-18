<?php
include 'connection.php';
include 'sidebar.php';

if (!isset($_GET['id'])) {
    header('Location: all_students.php');
    exit;
}
$id = (int) $_GET['id'];

// fetch student
$sq = "SELECT s.*, c.course AS course_name FROM students s LEFT JOIN courses c ON s.course_id = c.id WHERE s.id = $id";
$res = mysqli_query($conn, $sq);
if (!$res || mysqli_num_rows($res) == 0) {
    echo "<div class='main-content container mt-4'>Student not found.</div>";
    include 'footer.php';
    exit;
}
$student = mysqli_fetch_assoc($res);

// fees history
$fees_q = "SELECT * FROM student_fees WHERE student_id = $id ORDER BY created_at DESC";
$fees_res = mysqli_query($conn, $fees_q);
?>

<div class="main-content">
    <div class="container mt-4">
        <div class="row">
            <!-- Profile -->
            <div class="col-md-4">
                <div class="card p-3">
                    <div class="text-center">
                        <img src="<?= !empty($student['photo']) ? $student['photo'] : 'student_img/default.png' ?>"
                            style="width:150px;height:150px;object-fit:cover;border-radius:8px" alt="photo">
                    </div>
                    <h4 class="mt-3 text-center"><?= htmlspecialchars($student['student_name']) ?></h4>
                    <p class="text-center"><?= htmlspecialchars($student['course_name']) ?></p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Father:</strong>
                            <?= htmlspecialchars($student['father_name']) ?></li>
                        <li class="list-group-item"><strong>DOB:</strong> <?= $student['dob'] ?></li>
                        <li class="list-group-item"><strong>Phone:</strong> <?= htmlspecialchars($student['phone']) ?>
                        </li>
                        <li class="list-group-item"><strong>Email:</strong> <?= htmlspecialchars($student['email']) ?>
                        </li>
                        <li class="list-group-item"><strong>Address:</strong>
                            <?= nl2br(htmlspecialchars($student['address'])) ?></li>
                    </ul>
                    <div class="mt-3 d-grid">
                        <a href="student_edit.php?id=<?= $student['id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="student_delete.php?id=<?= $student['id'] ?>" class="btn btn-danger"
                            onclick="return confirm('Delete this student?')">Delete</a>
                    </div>
                </div>
            </div>

            <!-- Details & Fees -->
            <div class="col-md-8">
                <div class="card p-3 mb-3">
                    <h5>Course & Admission</h5>
                    <div class="row">
                        <div class="col-md-6"><strong>Course:</strong> <?= htmlspecialchars($student['course_name']) ?>
                        </div>
                        <div class="col-md-6"><strong>Batch Time:</strong>
                            <?= htmlspecialchars($student['batch_time']) ?></div>
                        <div class="col-md-6 mt-2"><strong>Duration:</strong>
                            <?= htmlspecialchars($student['duration']) ?></div>
                        <div class="col-md-6 mt-2"><strong>Admission Date:</strong> <?= $student['admission_date'] ?>
                        </div>
                    </div>
                </div>

                <!-- <div class="card p-3">
                    <h5>Fees History</h5>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Total</th>
                                    <th>Paid</th>
                                    <th>Remaining</th>
                                    <th>Mode</th>
                                    <th>Date</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($fees_res && mysqli_num_rows($fees_res) > 0) {
                                    while ($f = mysqli_fetch_assoc($fees_res)) {
                                        echo "<tr>
                            <td>{$f['id']}</td>
                            <td>₹{$f['total_fee']}</td>
                            <td>₹{$f['paid_amount']}</td>
                            <td>₹{$f['remaining']}</td>
                            <td>{$f['payment_mode']}</td>
                            <td>{$f['created_at']}</td>
                            <td>" . htmlspecialchars($f['remarks']) . "</td>
                          </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='7' class='text-center'>No payments found</td></tr>";
                                } ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        <a href="add_fees.php?student_id=<?= $student['id'] ?>" class="btn btn-primary">Add Payment</a>
                        <a href="remaining.php?id=<?= $student['id'] ?>" class="btn btn-info">Add Remaining</a>

                    </div>
                </div> -->

                <?php
                // Fetch Fees History
                $student_id = $student['id'];

                $hist = mysqli_query($conn, "
    SELECT * FROM student_fees
    WHERE student_id = $student_id
    ORDER BY id DESC
");
                ?>

                <div class="card p-3">
                    <h5>Fees History</h5>

                    <div class="table-responsive">
                        <table class="table table-sm table-bordered">
                            <thead class="table-light text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Total (₹)</th>
                                    <th>Paid (₹)</th>
                                    <th>Prev Paid (₹)</th>
                                    <th>Mode</th>
                                    <th>Remarks</th>
                                    <th>Payment Date</th>

                                    
                                </tr>
                            </thead>

                            <tbody class="text-center">
                                <?php
                                $i = 1;
                                if ($hist && mysqli_num_rows($hist) > 0) {
                                    while ($h = mysqli_fetch_assoc($hist)) {

                                        echo "<tr>
                                <td>{$i}</td>
                                <td>₹" . number_format($h['total_fee'], 2) . "</td>
                                <td>₹" . number_format($h['paid_amount'], 2) . "</td>
                                <td>₹" . number_format($h['prev_fee'] ?? 0, 2) . "</td>
                                <td>" . htmlspecialchars($h['payment_mode']) . "</td>
                                
                                <td>" . htmlspecialchars($h['remarks']) . "</td>
                                <td>{$h['created_at']}</td>
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

                    <div class="mt-3">
                        <a href="add_fees.php?student_id=<?= $student['id'] ?>" class="btn btn-primary">Add Payment</a>
                        <a href="remaining.php?id=<?= $student['id'] ?>" class="btn btn-info">Add Remaining</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>