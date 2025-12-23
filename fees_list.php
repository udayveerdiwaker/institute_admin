<?php
session_start();
if (!isset($_SESSION['admin_logged'])) {
    header("Location: login.php");
    exit;
}

ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'connection.php';
include 'sidebar.php';

/* ================= DATE FILTER ================= */
$from_date = $_GET['from_date'] ?? '';
$to_date   = $_GET['to_date'] ?? '';

$dateWhere = '';
if (!empty($from_date) && !empty($to_date)) {
    $dateWhere = " AND DATE(sf.fees_date) BETWEEN '$from_date' AND '$to_date'";
}


/* ================= PAID / UNPAID FILTER ================= */
$paid_check   = isset($_GET['paid']);
$unpaid_check = isset($_GET['unpaid']);

/* ================= THIS MONTH COUNTS ================= */
$year  = date('Y');
$month = date('m');

$paid_students = mysqli_fetch_assoc(mysqli_query($conn,"
    SELECT COUNT(DISTINCT student_id) AS total
    FROM student_fees
    WHERE YEAR(fees_date)='$year' AND MONTH(fees_date)='$month'
"))['total'] ?? 0;

$total_students = mysqli_fetch_assoc(mysqli_query($conn,"
    SELECT COUNT(*) total FROM students
"))['total'] ?? 0;

$unpaid_students = $total_students - $paid_students;

/* ================= FILTER LOGIC ================= */
$where = "1";
$student_name = '';
$course_id = '';

if (!empty($_GET['student_name'])) {
    $student_name = mysqli_real_escape_string($conn,$_GET['student_name']);
    $where .= " AND s.student_name LIKE '$student_name%'";
}

if (!empty($_GET['course_id'])) {
    $course_id = (int)$_GET['course_id'];
    $where .= " AND s.course_id=$course_id";
}

/* ================= COURSE LIST ================= */
$courses = mysqli_query($conn,"SELECT id, course FROM courses ORDER BY course");
?>

<div class="main-content">
    <div class="container mt-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3><i class="bi bi-cash-coin"></i> Fees / Students</h3>
            <a href="fees_add.php" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Add Payment
            </a>
        </div>
        <!-- ================= FILTER FORM ================= -->
        <form method="get" class="row g-3 mb-4">

            <div class="col-md-2">
                <input type="date" name="from_date" class="form-control" value="<?= htmlspecialchars($from_date) ?>">
            </div>

            <div class="col-md-2">
                <input type="date" name="to_date" class="form-control" value="<?= htmlspecialchars($to_date) ?>">
            </div>

            <div class="col-md-3">
                <input type="text" name="student_name" class="form-control" placeholder="Search Student Name"
                    value="<?= htmlspecialchars($student_name) ?>">
            </div>

            <div class="col-md-3">
                <select name="course_id" class="form-control">
                    <option value="">-- Select Course --</option>
                    <?php while ($c = mysqli_fetch_assoc($courses)) { ?>
                    <option value="<?= $c['id'] ?>" <?= ($course_id == $c['id']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($c['course']) ?>
                    </option>
                    <?php } ?>
                </select>
            </div>

            <!-- PAID / UNPAID -->
            <div class="col-md-2 d-flex align-items-center gap-2">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status[]" value="paid"
                        <?= (isset($_GET['status']) && in_array('paid', $_GET['status'])) ? 'checked' : '' ?>>
                    <label class="form-check-label">Paid</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status[]" value="unpaid"
                        <?= (isset($_GET['status']) && in_array('unpaid', $_GET['status'])) ? 'checked' : '' ?>>
                    <label class="form-check-label">Unpaid</label>
                </div>
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary w-100">
                    <i class="bi bi-search"></i> Filter
                </button>
            </div>

            <div class="col-md-2">
                <a href="fee_list.php" class="btn btn-secondary w-100">Reset</a>
            </div>
        </form>


        <!-- ================= MONTH SUMMARY ================= -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card p-3 text-center">
                    <h6>This Month Paid</h6>
                    <h3 class="text-success"><?= $paid_students ?></h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-3 text-center">
                    <h6>This Month Unpaid</h6>
                    <h3 class="text-danger"><?= $unpaid_students ?></h3>
                </div>
            </div>
        </div>

        <!-- ================= TABLE ================= -->
        <div class="card shadow">
            <div class="card-body table-responsive">

                <table class="table table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Student</th>
                            <th>Course</th>
                            <th>Total Fee</th>
                            <th>Paid</th>
                            <th>Remaining</th>
                            <th>Paid / Unpaid</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
$i=1;
$statusFilter = $_GET['status'] ?? [];

$q = mysqli_query($conn, "
    SELECT 
        s.id AS student_id,
        s.student_name,
        c.course,
        c.fees AS course_fee,
        IFNULL(SUM(sf.paid_amount),0) AS paid_in_range,
        COUNT(sf.id) AS payment_count
    FROM students s
    LEFT JOIN courses c ON s.course_id = c.id
    LEFT JOIN student_fees sf 
        ON sf.student_id = s.id $dateWhere
    WHERE $where
    GROUP BY s.id
    ORDER BY s.id DESC
");


if ($q && mysqli_num_rows($q) > 0) {
   while ($row = mysqli_fetch_assoc($q)) {

    $paid_in_range = (float)$row['paid_in_range'];
    $payment_count = (int)$row['payment_count'];

    // STATUS FILTER (DATE-WISE)
    if (!empty($statusFilter)) {

        // PAID → must have payment in date range
        if (in_array('paid', $statusFilter) && $payment_count == 0) {
            continue;
        }

        // UNPAID → no payment in date range
        if (in_array('unpaid', $statusFilter) && $payment_count > 0) {
            continue;
        }
    }

       $total_fee = (float)$row['course_fee'];

echo "<tr>
    <td>{$i}</td>
    <td>".htmlspecialchars($row['student_name'])."</td>
    <td>".htmlspecialchars($row['course'])."</td>
    <td>₹".number_format($total_fee,2)."</td>
    <td class='text-success'>₹".number_format($paid_in_range,2)."</td>
    <td class='".($total_fee - $paid_in_range > 0 ? 'text-danger' : 'text-success')."'>
        ₹".number_format($total_fee - $paid_in_range,2)."
    <td>
        <span class='".($payment_count>0?'text-success':'text-danger')."'>
            ".($payment_count>0?'Paid':'Unpaid')."
        </span>
    </td>
    <td>
        <a href='fees_view.php?student_id={$row['student_id']}'
           class='btn btn-sm btn-info'>
           <i class='bi bi-eye'></i>
        </a>
    </td>
</tr>";
$i++;

    }
} else {
    echo "<tr><td colspan='7'>No students found</td></tr>";
}

?>

                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>