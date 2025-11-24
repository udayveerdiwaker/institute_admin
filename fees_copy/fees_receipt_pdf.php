<?php
include 'connection.php';
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

// Check receipt ID
if (!isset($_GET['id'])) { 
    die("Invalid Receipt ID"); 
}

$id = (int) $_GET['id'];

// Fetch payment details
$q = mysqli_query($conn,
    "SELECT sf.*, s.student_name, s.phone, s.address, c.course 
     FROM student_fees sf
     LEFT JOIN students s ON sf.student_id = s.id
     LEFT JOIN courses c ON sf.course_id = c.id
     WHERE sf.id = $id"
);

if (mysqli_num_rows($q) == 0) {
    die("Receipt Not Found");
}

$r = mysqli_fetch_assoc($q);

// Prepare HTML for PDF
$html = '
<style>
.receipt-box {
    padding: 10px;
    border: 2px solid #000;
    font-family: Arial, sans-serif;
    font-size: 14px;
}
.title {
    text-align: center;
    font-size: 22px;
    font-weight: bold;
    text-transform: uppercase;
}
.sub-title {
    text-align: center;
    font-size: 14px;
}
.table { width: 100%; border-collapse: collapse; margin-top: 10px; }
.table td { border: 1px solid #000; padding: 6px; }
.footer-sign {
    margin-top: 40px;
    display: flex;
    justify-content: space-between;
}
</style>

<div class="receipt-box">
    <div class="title">Your Institute Name</div>
    <div class="sub-title">Full Address | Mobile: 9876543210</div>
    <hr>

    <h3 style="text-align:center;">FEE RECEIPT</h3>

    <table class="table">
        <tr>
            <td><strong>Receipt No:</strong></td><td>'.$r['id'].'</td>
            <td><strong>Date:</strong></td><td>'.$r['created_at'].'</td>
        </tr>

        <tr>
            <td><strong>Student:</strong></td><td>'.$r['student_name'].'</td>
            <td><strong>Mobile:</strong></td><td>'.$r['phone'].'</td>
        </tr>

        <tr>
            <td><strong>Address:</strong></td><td colspan="3">'.$r['address'].'</td>
        </tr>

        <tr>
            <td><strong>Course:</strong></td><td>'.$r['course'].'</td>
            <td><strong>Mode:</strong></td><td>'.$r['payment_mode'].'</td>
        </tr>

        <tr>
            <td><strong>Total Fee:</strong></td><td>₹'.$r['total_fee'].'</td>
            <td><strong>Paid:</strong></td><td>₹'.$r['paid_amount'].'</td>
        </tr>

        <tr>
            <td><strong>Remaining:</strong></td><td colspan="3">₹'. $r['remaining'].'</td>
        </tr>

        <tr>
            <td><strong>Remarks:</strong></td><td colspan="3">'.$r['remarks'].'</td>
        </tr>
    </table>

    <div class="footer-sign">
        <div><strong>Student Signature</strong></div>
        <div><strong>Authorized Signature</strong></div>
    </div>
</div>
';

// Create PDF object
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// Paper size + orientation
$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

// Download file
$dompdf->stream("receipt_".$r['student_name'].".pdf", array("Attachment" => true));
?>
