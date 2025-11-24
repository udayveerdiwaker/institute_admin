<?php
// combined_receipt.php
include 'connection.php';

if (!isset($_GET['student_id'])) die("Missing student_id");
$student_id = (int) $_GET['student_id'];

// fetch student
$sq = "SELECT s.*, c.course AS course_name FROM students s LEFT JOIN courses c ON s.course_id = c.id WHERE s.id = $student_id LIMIT 1";
$res = mysqli_query($conn, $sq);
if (!$res || mysqli_num_rows($res) == 0) die("Student not found");
$student = mysqli_fetch_assoc($res);

// fetch all payments
$q = mysqli_query($conn, "SELECT * FROM student_fees WHERE student_id = $student_id ORDER BY created_at ASC");

// totals
$sumQ = mysqli_query($conn, "SELECT SUM(paid_amount) AS total_paid, MAX(total_fee) AS total_fee FROM student_fees WHERE student_id = $student_id");
$sumR = mysqli_fetch_assoc($sumQ);
$total_paid = (float)($sumR['total_paid'] ?? 0);
$total_fee = (float)($sumR['total_fee'] ?? 0);
$remaining = $total_fee - $total_paid;

$institute_name = "Your Institute Name";
$institute_address = "Address line, City";
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Combined Receipt - <?= htmlspecialchars($student['student_name']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f6f9;
            font-family: Arial
        }

        .wrap {
            max-width: 900px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border: 1px solid #eee
        }
    </style>
</head>

<body>
    <div class="wrap">
        <div class="d-flex justify-content-between">
            <div>
                <h3><?= $institute_name ?></h3>
                <div><?= $institute_address ?></div>
            </div>
            <div><strong>Student:</strong> <?= htmlspecialchars($student['student_name']) ?><br><strong>Course:</strong> <?= htmlspecialchars($student['course_name']) ?></div>
        </div>

        <hr>
        <h5>Payments</h5>
        <table class="table table-sm table-bordered">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Paid (₹)</th>
                    <th>Prev Paid (₹)</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                if ($q && mysqli_num_rows($q) > 0) {
                    while ($p = mysqli_fetch_assoc($q)) {
                        echo "<tr>
                <td>{$i}</td>
                <td>" . htmlspecialchars($p['created_at']) . "</td>
                <td>₹" . number_format($p['paid_amount'], 2) . "</td>
                <td>₹" . number_format($p['prev_fee'] ?? 0, 2) . "</td>
                <td>" . htmlspecialchars($p['remarks']) . "</td>
              </tr>";
                        $i++;
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>No payments yet</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <div class="d-flex justify-content-end">
            <div style="width:320px">
                <div><strong>Total Fee:</strong> ₹<?= number_format($total_fee, 2) ?></div>
                <div><strong>Total Paid:</strong> ₹<?= number_format($total_paid, 2) ?></div>
                <div><strong>Remaining:</strong> ₹<?= number_format($remaining, 2) ?></div>
            </div>
        </div>

        <div class="mt-4">
            <a href="combined_receipt_pdf.php?student_id=<?= $student_id ?>" class="btn btn-danger" target="_blank">Download Combined PDF</a>
            <button class="btn btn-primary" onclick="window.print()">Print</button>
            <a href="student_view.php?id=<?= $student_id ?>" class="btn btn-secondary">Back</a>
        </div>
    </div>
</body>

</html>