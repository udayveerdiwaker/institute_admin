<?php
// receipt.php
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

if (!isset($_GET['fee_id'])) die("Missing id");
$fee_id = (int) $_GET['fee_id'];

// fetch payment + student + course
$sql = "SELECT sf.*, s.student_name, s.father_name, s.phone, s.email, s.address, c.course AS course_name
        FROM student_fees sf
        LEFT JOIN students s ON sf.student_id = s.id
        LEFT JOIN courses c ON sf.course_id = c.id
        WHERE sf.id = $fee_id LIMIT 1";
$res = mysqli_query($conn, $sql);
if (!$res || mysqli_num_rows($res) == 0) die("Receipt not found");
$r = mysqli_fetch_assoc($res);

// institute details
$institute_name = "Website Banaye & Computer Shikhe  ";
$institute_address = "Visthapit, A, main road, near hotel, pushpkunj, Nirmal Bag, Rishikesh, Uttarakhand 249202";
$institute_phone = "9814143394";
$institute_email = "websitebanye.com";

$receipt_no = $r['id'];
$student = htmlspecialchars($r['student_name'] ?? '');
$father = htmlspecialchars($r['father_name'] ?? '');
$course = htmlspecialchars($r['course_name'] ?? '');
$total_fee = number_format((float)($r['total_fee'] ?? 0),2);
$paid = number_format((float)($r['paid_amount'] ?? 0),2);
$prev = number_format((float)($r['prev_fee'] ?? 0),2);
$remaining = number_format((float)($r['remaining'] ?? (($r['total_fee'] ?? 0) - ($r['paid_amount'] + $r['prev_fee'] ?? 0))),2);
$mode = htmlspecialchars($r['payment_mode'] ?? '');
$date = date("d M Y", strtotime($r['created_at'] ?? $r['payment_date'] ?? date("Y-m-d")));
$remarks = nl2br(htmlspecialchars($r['remarks'] ?? ''));
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Receipt #<?= $receipt_no ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background: #f4f6f9;
        font-family: Arial, Helvetica, sans-serif
    }

    .receipt {
        max-width: 800px;
        margin: 20px auto;
        background: #fff;
        padding: 24px;
        border: 1px solid #eaeaea
    }

    .muted {
        color: #666
    }

    @media print {
        .no-print {
            display: none
        }
    }
    </style>
</head>

<body>
    <div class="receipt">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h4><?= $institute_name ?></h4>
                <div class="muted"><?= $institute_address ?> | <?= $institute_phone ?> | <?= $institute_email ?></div>
            </div>
            <div style="text-align:right">
                <div><strong>Receipt #</strong> <?= $receipt_no ?></div>
                <div><strong>Date:</strong> <?= $date ?></div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-6">
                <strong>Student:</strong> <?= $student ?><br>
                <strong>Father:</strong> <?= $father ?><br>
                <strong>Phone:</strong> <?= htmlspecialchars($r['phone'] ?? '') ?>
            </div>
            <div class="col-md-6">
                <strong>Course:</strong> <?= $course ?><br>
                <strong>Payment Mode:</strong> <?= $mode ?><br>
                <!-- <strong>Remarks:</strong> <?= $remarks ?> -->
            </div>
        </div>

        <table class="table table-sm mt-3">
            <thead>
                <tr>
                    <th>Description</th>
                    <th class="text-end">Amount (₹)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Total Fee</td>
                    <td class="text-end">₹<?= $total_fee ?></td>
                </tr>
                <tr>
                    <td>Previous Paid</td>
                    <td class="text-end">₹<?= $prev ?></td>
                </tr>
                <tr>
                    <td>Paid Now</td>
                    <td class="text-end">₹<?= $paid ?></td>
                </tr>
                <tr>
                    <td><strong>Remaining</strong></td>
                    <td class="text-end"><strong>₹<?= $remaining ?></strong></td>
                </tr>
            </tbody>
        </table>

        <div class="d-flex justify-content-between mt-4">
            <div class="text-center">
                <div style="height:60px"></div>
                <div>Student / Parent Signature</div>
            </div>
            <div class="text-center">
                <div style="height:60px"></div>
                <div>Authorised Signatory</div>
            </div>
        </div>

        <div class="mt-3 no-print text-center">
            <button class="btn btn-primary" onclick="window.print()">Print</button>
            <!-- <a href="receipt_pdf.php?fee_id=<?= $receipt_no ?>" class="btn btn-danger" target="_blank">Download PDF</a> -->
            <a href="student_view.php?id=<?= $r['student_id'] ?>" class="btn btn-secondary">Back</a>
        </div>
    </div>
</body>

</html>