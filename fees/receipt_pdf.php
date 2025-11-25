<?php
// receipt_pdf.php
// Requires Dompdf (release), put dompdf/ folder or use composer
require 'dompdf/autoload.inc.php'; // or require 'vendor/autoload.php';
include '../connection.php';

use Dompdf\Dompdf;

if (!isset($_GET['fee_id'])) die("Missing id");
$fee_id = (int) $_GET['fee_id'];

$sql = "SELECT sf.*, s.student_name, s.father_name, s.phone, s.email, s.address, c.course AS course_name
        FROM student_fees sf
        LEFT JOIN students s ON sf.student_id = s.id
        LEFT JOIN courses c ON sf.course_id = c.id
        WHERE sf.id = $fee_id LIMIT 1";
$res = mysqli_query($conn, $sql);
if (!$res || mysqli_num_rows($res) == 0) die("Receipt not found");
$r = mysqli_fetch_assoc($res);

// prepare html
$total_fee = number_format((float)($r['total_fee'] ?? 0), 2);
$paid = number_format((float)($r['paid_amount'] ?? 0), 2);
$prev = number_format((float)($r['prev_fee'] ?? 0), 2);
$remaining = number_format((float)($r['remaining'] ?? (($r['total_fee'] ?? 0) - ($r['paid_amount'] ?? 0))), 2);
$date = date("d M Y", strtotime($r['created_at'] ?? $r['payment_date'] ?? date("Y-m-d")));

$html = '
<html><head><style>
body{font-family:Arial,Helvetica,sans-serif;font-size:14px}
.table{width:100%;border-collapse:collapse;margin-top:10px}
.table td,.table th{border:1px solid #ddd;padding:6px}
.header{display:flex;justify-content:space-between;align-items:center}
</style></head><body>
<div class="header"><div><h2>Your Institute Name</h2><div>Address | Phone</div></div><div>Receipt #' . $r['id'] . '<br>' . $date . '</div></div>
<hr>
<p><strong>Student:</strong> ' . htmlspecialchars($r['student_name']) . ' &nbsp; <strong>Course:</strong> ' . htmlspecialchars($r['course_name']) . '</p>
<table class="table">
<tr><td>Total Fee</td><td>₹' . $total_fee . '</td></tr>
<tr><td>Previous Paid</td><td>₹' . $prev . '</td></tr>
<tr><td>Paid</td><td>₹' . $paid . '</td></tr>
<tr><td><strong>Remaining</strong></td><td><strong>₹' . $remaining . '</strong></td></tr>
<tr><td>Payment Mode</td><td>' . htmlspecialchars($r['payment_mode']) . '</td></tr>
<tr><td>Remarks</td><td>' . htmlspecialchars($r['remarks']) . '</td></tr>
</table>
<div style="margin-top:30px;display:flex;justify-content:space-between"><div>Student Signature</div><div>Authorised Signature</div></div>
</body></html>
';

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("receipt_" . $r['id'] . ".pdf", array("Attachment" => 1));
exit;
