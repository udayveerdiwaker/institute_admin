<?php
// combined_receipt_pdf.php
require 'dompdf/autoload.inc.php';
include 'connection.php';

use Dompdf\Dompdf;

if (!isset($_GET['student_id'])) die("Missing student_id");
$student_id = (int) $_GET['student_id'];

$sq = "SELECT s.*, c.course AS course_name FROM students s LEFT JOIN courses c ON s.course_id = c.id WHERE s.id = $student_id LIMIT 1";
$res = mysqli_query($conn, $sq);
if (!$res || mysqli_num_rows($res) == 0) die("Student not found");
$student = mysqli_fetch_assoc($res);

$q = mysqli_query($conn, "SELECT * FROM student_fees WHERE student_id = $student_id ORDER BY created_at ASC");

$sumQ = mysqli_query($conn, "SELECT SUM(paid_amount) AS total_paid, MAX(total_fee) AS total_fee FROM student_fees WHERE student_id = $student_id");
$sumR = mysqli_fetch_assoc($sumQ);
$total_paid = (float)($sumR['total_paid'] ?? 0);
$total_fee = (float)($sumR['total_fee'] ?? 0);
$remaining = $total_fee - $total_paid;

$html = '<html><head><style>
body{font-family:Arial,Helvetica,sans-serif;font-size:13px}
.table{width:100%;border-collapse:collapse;margin-top:6px}
.table td,.table th{border:1px solid #ddd;padding:6px}
h3{text-align:center}
</style></head><body>';
$html .= '<h3>Your Institute Name</h3>';
$html .= '<p><strong>Student:</strong> ' . htmlspecialchars($student['student_name']) . ' &nbsp; <strong>Course:</strong> ' . htmlspecialchars($student['course_name']) . '</p>';
$html .= '<table class="table"><thead><tr><th>#</th><th>Date</th><th>Paid (₹)</th><th>Prev Paid (₹)</th><th>Remarks</th></tr></thead><tbody>';
$i = 1;
if ($q && mysqli_num_rows($q) > 0) {
    while ($p = mysqli_fetch_assoc($q)) {
        $html .= '<tr>
                <td>' . $i . '</td>
                <td>' . htmlspecialchars($p['created_at']) . '</td>
                <td>₹' . number_format($p['paid_amount'], 2) . '</td>
                <td>₹' . number_format($p['prev_fee'] ?? 0, 2) . '</td>
                <td>' . htmlspecialchars($p['remarks']) . '</td>
              </tr>';
        $i++;
    }
} else {
    $html .= '<tr><td colspan="5">No payments yet</td></tr>';
}
$html .= '</tbody></table>';
$html .= '<div style="text-align:right;margin-top:12px"><strong>Total Fee:</strong> ₹' . number_format($total_fee, 2) . '<br><strong>Total Paid:</strong> ₹' . number_format($total_paid, 2) . '<br><strong>Remaining:</strong> ₹' . number_format($remaining, 2) . '</div>';
$html .= '</body></html>';

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("combined_receipt_student_" . $student_id . ".pdf", array("Attachment" => 1));
exit;
