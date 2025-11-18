<?php
// receipt_pdf.php
include 'connection.php';

// Dompdf
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

if (!isset($_GET['id'])) die("Missing id");
$id = (int) $_GET['id'];

// fetch same as receipt.php
$sql = "
SELECT sf.*,
       COALESCE(sf.payment_date, sf.created_at) AS payment_date,
       COALESCE(sf.remaining_amount, sf.remaining) AS remaining_amount,
       COALESCE(sf.prev_fee, sf.fees_prev, 0) AS prev_fee,
       s.student_name, s.father_name, s.phone AS student_phone, s.address AS student_address, s.email AS student_email,
       c.course AS course_name, c.fee AS course_fee
FROM student_fees sf
LEFT JOIN students s ON sf.student_id = s.id
LEFT JOIN courses c ON sf.course_id = c.id
WHERE sf.id = $id
LIMIT 1
";

$res = mysqli_query($conn, $sql);
if (!$res || mysqli_num_rows($res) == 0) die("Receipt not found");
$r = mysqli_fetch_assoc($res);

// prepare html (same layout but minimal styles)
$html = '<html><head><style>
body{font-family:Arial,Helvetica,sans-serif;font-size:14px}
.header{display:flex;align-items:center}
.logo{width:80px;height:80px;background:#eee;display:inline-block;margin-right:12px}
.table{width:100%;border-collapse:collapse;margin-top:10px}
.table td,.table th{border:1px solid #ddd;padding:6px}
.title{text-align:center}
.small{font-size:12px;color:#555}
</style></head><body>';

$html .= '<div class="header"><div class="logo"></div><div><h2>Your Institute Name</h2><div class="small">Address | Phone</div></div></div>';
$html .= '<hr>';
$html .= '<h3 style="text-align:center">FEE RECEIPT</h3>';
$html .= '<table class="table"><tr><td><strong>Receipt No:</strong> ' . $r['id'] . '</td><td><strong>Date:</strong> ' . date("d M Y", strtotime($r['payment_date'])) . '</td></tr>';
$html .= '<tr><td><strong>Student:</strong> ' . htmlspecialchars($r['student_name']) . '</td><td><strong>Course:</strong> ' . htmlspecialchars($r['course_name']) . '</td></tr>';
$html .= '<tr><td><strong>Total Fee:</strong> ₹' . number_format($r['total_fee'], 2) . '</td><td><strong>Paid:</strong> ₹' . number_format($r['paid_amount'], 2) . '</td></tr>';
$html .= '<tr><td><strong>Remaining:</strong> ₹' . number_format($r['remaining_amount'], 2) . '</td><td><strong>Mode:</strong> ' . htmlspecialchars($r['payment_mode']) . '</td></tr>';
$html .= '<tr><td colspan="2"><strong>Remarks:</strong> ' . htmlspecialchars($r['remarks']) . '</td></tr>';
$html .= '</table>';
$html .= '<div style="margin-top:40px;display:flex;justify-content:space-between"><div>Student Signature</div><div>Authorized Signature</div></div>';
$html .= '</body></html>';

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$filename = 'receipt_' . $r['id'] . '.pdf';
$dompdf->stream($filename, array("Attachment" => 1));
