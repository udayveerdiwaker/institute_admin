<?php

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
include 'sidebar.php';


// helper to run query and surface SQL errors (dev only)
function runQuery($conn, $sql) {
    $res = mysqli_query($conn, $sql);
    if ($res === false) {
        echo "<div class='container mt-3'><div class='alert alert-danger'>SQL Error: "
            . htmlspecialchars(mysqli_error($conn)) . "<br><code>"
            . htmlspecialchars($sql) . "</code></div></div>";
    }
    return $res;
}

/*
  1) TOTAL STUDENTS
     - counts students table rows (one per student)
*/
$row = mysqli_fetch_assoc(runQuery($conn, "SELECT COUNT(*) AS total_students FROM students"));
$total_students = (int)($row['total_students'] ?? 0);

/*
  2) TOTAL COURSES
     - counts courses available
*/
$row = mysqli_fetch_assoc(runQuery($conn, "SELECT COUNT(*) AS total_courses FROM courses"));
$total_courses = (int)($row['total_courses'] ?? 0);

/*
  3) TOTAL AMOUNT (expected fees)
     - sum of each student's course fee (one per student)
     - uses COALESCE to support column name 'fee' or 'fees'
     - this avoids double-counting: join students -> courses returns one row per student
*/
$sql_total_amount = "
    SELECT COALESCE(SUM(COALESCE(c.fees, c.fees, 0)),0) AS total_amount
    FROM students s
    LEFT JOIN courses c ON s.course_id = c.id
";
$row = mysqli_fetch_assoc(runQuery($conn, $sql_total_amount));
$total_amount = (float)($row['total_amount'] ?? 0);

/*
  4) TOTAL PAID (sum of all paid_amount entries in student_fees)
*/
$row = mysqli_fetch_assoc(runQuery($conn, "SELECT COALESCE(SUM(paid_amount),0) AS total_paid FROM student_fees"));
$total_paid = (float)($row['total_paid'] ?? 0);

/*
  5) TOTAL PENDING = total_amount - total_paid
     (calculated instead of trusting 'remaining' column)
*/
$total_pending = $total_amount - $total_paid;
if ($total_pending < 0) $total_pending = 0; // guard

/* ---------------- CHART DATA ---------------- */

/* Monthly income (labels like "Jan 2025") */
$months = [];
$month_income = [];
$month_sql = "
    SELECT DATE_FORMAT(created_at, '%b %Y') AS month_label, COALESCE(SUM(paid_amount),0) AS month_total
    FROM student_fees
    GROUP BY YEAR(created_at), MONTH(created_at)
    ORDER BY YEAR(created_at), MONTH(created_at)
";
$res = runQuery($conn, $month_sql);
if ($res) {
    while ($r = mysqli_fetch_assoc($res)) {
        $months[] = $r['month_label'];
        $month_income[] = (float)$r['month_total'];
    }
}

/* Yearly income */
$years = [];
$year_income = [];
$year_sql = "
    SELECT YEAR(created_at) AS yr, COALESCE(SUM(paid_amount),0) AS year_total
    FROM student_fees
    GROUP BY YEAR(created_at)
    ORDER BY YEAR(created_at)
";
$res = runQuery($conn, $year_sql);
if ($res) {
    while ($r = mysqli_fetch_assoc($res)) {
        $years[] = (string)$r['yr'];
        $year_income[] = (float)$r['year_total'];
    }
}

/* Course-wise student counts */
$course_names = [];
$course_students = [];
$course_sql = "
    SELECT c.course AS cname, COUNT(s.id) AS total_students
    FROM courses c
    LEFT JOIN students s ON s.course_id = c.id
    GROUP BY c.id
    ORDER BY c.course
";
$res = runQuery($conn, $course_sql);
if ($res) {
    while ($r = mysqli_fetch_assoc($res)) {
        $course_names[] = $r['cname'];
        $course_students[] = (int)$r['total_students'];
    }
}

/* Recent payments */
$recent = [];
$recent_sql = "
    SELECT sf.id, sf.paid_amount, sf.payment_mode, sf.created_at, s.student_name, c.course
    FROM student_fees sf
    LEFT JOIN students s ON sf.student_id = s.id
    LEFT JOIN courses c ON sf.course_id = c.id
    ORDER BY sf.created_at DESC
    LIMIT 8
";
$res = runQuery($conn, $recent_sql);
if ($res) {
    while ($r = mysqli_fetch_assoc($res)) $recent[] = $r;
}
?>
<style>
.card-box {
    padding: 18px;
    border-radius: 10px;
    background: #fff;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
}

.icon {
    font-size: 28px;
    color: #0d6efd;
}

.stat-number {
    font-size: 22px;
    font-weight: 700;
    margin-top: 6px;
}

@media (max-width:768px) {
    .stat-number {
        font-size: 18px
    }
}
</style>

<div class="main-content">
    <div class="container mt-4">

        <h3 class="mb-3">Dashboard</h3>

        <div class="row g-3">
            <div class="col-md-3 col-6">
                <div class="card-box text-center">
                    <div class="icon"><i class="bi bi-people-fill"></i></div>
                    <div class="stat-number"><?= number_format($total_students) ?></div>
                    <div class="text-muted">Total Students</div>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="card-box text-center">
                    <div class="icon"><i class="bi bi-book"></i></div>
                    <div class="stat-number"><?= number_format($total_courses) ?></div>
                    <div class="text-muted">Total Courses</div>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="card-box text-center">
                    <div class="icon"><i class="bi bi-cash-stack"></i></div>
                    <div class="stat-number">₹<?= number_format($total_amount,2) ?></div>
                    <div class="text-muted">Total Amount</div>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="card-box text-center">
                    <div class="icon"><i class="bi bi-currency-dollar"></i></div>
                    <div class="stat-number">₹<?= number_format($total_paid,2) ?></div>
                    <div class="text-muted">Total Paid</div>
                </div>
            </div>

            <div class="col-12 mt-2">
                <div class="card-box text-center">
                    <div class="stat-number text-danger">Pending: ₹<?= number_format($total_pending,2) ?></div>
                    <div class="text-muted">Total Pending (Expected - Paid)</div>
                </div>
            </div>
        </div>

        <div class="card p-3 mt-4 shadow-sm">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Analytics</h5>
                <div>
                    <a class="btn btn-sm btn-primary" href="new_registration.php">New Registration</a>
                    <a class="btn btn-sm btn-success" href="add_course.php">Add Course</a>
                    <a class="btn btn-sm btn-warning" href="add_fees.php">Add Payment</a>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-4 text-center">
                    <h6>Paid vs Pending</h6>
                    <canvas id="paidPendingChart" height="160"></canvas>
                </div>

                <div class="col-md-4 text-center">
                    <h6>Monthly Income</h6>
                    <canvas id="monthlyIncomeChart" height="160"></canvas>
                </div>

                <div class="col-md-4 text-center">
                    <h6>Yearly Income</h6>
                    <canvas id="yearlyIncomeChart" height="160"></canvas>
                </div>
            </div>

            <div class="mt-4">
                <h6>Course-wise Students</h6>
                <canvas id="courseChart" height="100"></canvas>
            </div>
        </div>

        <div class="card p-3 mt-4 shadow-sm">
            <h5>Recent Payments</h5>
            <div class="table-responsive">
                <table class="table table-sm table-bordered mb-0">
                    <thead class="table-light text-center">
                        <tr>
                            <th>#</th>
                            <th>Student</th>
                            <th>Course</th>
                            <th>Paid (₹)</th>
                            <th>Mode</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php if (count($recent) === 0) echo "<tr><td colspan='6'>No recent payments</td></tr>"; ?>
                        <?php $i=1; foreach($recent as $r){ ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= htmlspecialchars($r['student_name']) ?></td>
                            <td><?= htmlspecialchars($r['course']) ?></td>
                            <td>₹<?= number_format($r['paid_amount'],2) ?></td>
                            <td><?= htmlspecialchars($r['payment_mode']) ?></td>
                            <td><?= htmlspecialchars($r['created_at']) ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const totalPaid = <?= json_encode($total_paid) ?>;
const totalPending = <?= json_encode($total_pending) ?>;
const months = <?= json_encode($months) ?>;
const monthIncome = <?= json_encode($month_income) ?>;
const years = <?= json_encode($years) ?>;
const yearIncome = <?= json_encode($year_income) ?>;
const courseNames = <?= json_encode($course_names) ?>;
const courseStudents = <?= json_encode($course_students) ?>;

// Paid vs Pending pie
new Chart(document.getElementById('paidPendingChart'), {
    type: 'pie',
    data: {
        labels: ['Paid', 'Pending'],
        datasets: [{
            data: [totalPaid, totalPending],
            backgroundColor: ['#28a745', '#dc3545']
        }]
    }
});

// Monthly bar
new Chart(document.getElementById('monthlyIncomeChart'), {
    type: 'bar',
    data: {
        labels: months,
        datasets: [{
            label: 'Income (₹)',
            data: monthIncome,
            backgroundColor: '#0d6efd'
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// Yearly bar
new Chart(document.getElementById('yearlyIncomeChart'), {
    type: 'bar',
    data: {
        labels: years,
        datasets: [{
            label: 'Yearly Income (₹)',
            data: yearIncome,
            backgroundColor: '#198754'
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// Course chart
new Chart(document.getElementById('courseChart'), {
    type: 'bar',
    data: {
        labels: courseNames,
        datasets: [{
            label: 'Students',
            data: courseStudents,
            backgroundColor: '#6f42c1'
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>