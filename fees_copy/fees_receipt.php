<?php
include 'connection.php';

// Redirect if no ID
if (!isset($_GET['id'])) {
    die("Invalid Receipt ID");
}
$id = (int) $_GET['id'];

// Fetch payment details
$q = mysqli_query(
    $conn,
    "SELECT sf.*, s.student_name, s.phone, s.address, c.course 
     FROM student_fees sf
     LEFT JOIN students s ON sf.student_id = s.id
     LEFT JOIN courses c ON sf.course_id = c.id
     WHERE sf.id = $id"
);

if (!$q || mysqli_num_rows($q) == 0) {
    die("Receipt Not Found");
}

$r = mysqli_fetch_assoc($q);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Student Fees Receipt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .receipt-box {
            max-width: 750px;
            margin: auto;
            padding: 30px;
            border: 2px solid #000;
            background: #fff;
        }

        .title {
            text-align: center;
            font-size: 26px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .sub-title {
            text-align: center;
            font-size: 16px;
            margin-bottom: 10px;
        }

        hr {
            border-top: 2px solid #000;
        }

        .info-table td {
            padding: 5px;
        }

        .print-btn {
            margin: 20px auto;
            text-align: center;
        }

        @media print {
            .print-btn {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="receipt-box">

        <div class="title">Your Institute Name</div>
        <div class="sub-title">Full Address Line, City, Pincode | Mobile: 9876543210</div>
        <hr>

        <h5 class="text-center mb-3"><strong>FEE RECEIPT</strong></h5>

        <table class="table table-bordered info-table">
            <tr>
                <td><strong>Receipt No:</strong></td>
                <td><?= $r['id']; ?></td>
                <td><strong>Date:</strong></td>
                <td><?= $r['created_at']; ?></td>
            </tr>

            <tr>
                <td><strong>Student Name:</strong></td>
                <td><?= $r['student_name']; ?></td>
                <td><strong>Mobile:</strong></td>
                <td><?= $r['phone']; ?></td>
            </tr>

            <tr>
                <td><strong>Address:</strong></td>
                <td colspan="3"><?= $r['address']; ?></td>
            </tr>

            <tr>
                <td><strong>Course:</strong></td>
                <td><?= $r['course']; ?></td>
                <td><strong>Mode:</strong></td>
                <td><?= $r['payment_mode']; ?></td>
            </tr>

            <tr>
                <td><strong>Total Fees:</strong></td>
                <td>₹<?= $r['total_fee']; ?></td>
                <td><strong>Paid Amount:</strong></td>
                <td>₹<?= $r['paid_amount']; ?></td>
            </tr>

            <tr>
                <td><strong>Remaining:</strong></td>
                <td colspan="3">₹<?= $r['remaining']; ?></td>
            </tr>

            <tr>
                <td><strong>Remarks:</strong></td>
                <td colspan="3"><?= nl2br($r['remarks']); ?></td>
            </tr>
        </table>

        <br><br>

        <div class="d-flex justify-content-between">
            <div><strong>Student Signature</strong></div>
            <div><strong>Authorized Signature</strong></div>
        </div>

    </div>

    <div class="print-btn">
        <button onclick="window.print()" class="btn btn-primary">
            <i class="bi bi-printer"></i> Print Receipt
        </button>
    </div>

</body>

</html> 