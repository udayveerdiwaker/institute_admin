<?php
// dashboard.php - Full working dashboard (no duplicate student fee counting)
// Shows: Total Students, Total Courses, Total Amount (one fee per student),
// Total Paid (sum of payments), Total Pending (amount-paid), Monthly & Yearly charts.

// DEV: show PHP errors while developing
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// includes - adjust paths if needed
include 'connection.php';
include 'sidebar.php';

// Helper: run query and show SQL error (dev mode)
function runQuery($conn, $sql) {
    $res = mysqli_query($conn, $sql);
    if ($res === false) {
        echo "<div class='container mt-3'><div class='alert alert-danger'>SQL Error: " . htmlspecialchars(mysqli_error($conn)) . "<br><code>" . htmlspecialchars($sql) . "</code></div></div>";
    }
    return $res;
}

/* =================== SUMMARY METRICS =================== */

// Total students
$row = mysqli_fetch_assoc(runQuery($conn, "SELECT COUNT(*) AS total FROM students"));
$total_students = (int)($row['total'] ?? 0);

// Total courses
$row = mysqli_fetch_assoc(runQuery($conn, "SELECT COUNT(*) AS total FROM courses"));
$total_courses = (int)($row['total'] ?? 0);

/*
 Total Amount:
 - Count each student once (do not sum payment rows)
 - Prefer to take course fee from students->course relationship so student is counted once.
   Query: sum course.fees for all current students
 - If your students table stores a custom fee per student instead, replace c.fees with s.custom_fee
*/
$row = mysqli_fetch_assoc(runQuery($conn, "
    SELECT COALESCE(SUM(c.fee),0) AS total_amount
    FROM students s
    LEFT JOIN courses c ON s.course_id = c.id
"));
$total_amount = (float)($row['total_amount'] ?? 0);

// Total paid: sum of all paid_amount in student_fees (this does not double-count)
$row = mysqli_fetch_assoc(runQuery($conn, "SELECT COALESCE(SUM(paid_amount),0) AS total_paid FROM student_fees"));
$total_paid = (float)($row['total_paid'] ?? 0);

// Total pending: compute from total_amount - total_paid, never negative
$total_pending = $total_amount - $total_paid;
if ($total_pending < 0) $total_pending = 0.00;

/* =================== CHART DATA =================== */

// Monthly totals (payments) - shows month label and total paid that month
$months = []; $month_income = [];
$month_sql = "
    SELECT DATE_FORMAT(created_at, '%b %Y') AS month_label, SUM(paid_amount) AS month_total
    FROM student_fees
    WHERE created_at IS NOT NULL
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

// Yearly totals
$years = []; $year_income = [];
$year_sql = "
    SELECT YEAR(created_at) AS yr, SUM(paid_amount) AS year_total
    FROM student_fees
    WHERE created_at IS NOT NULL
    GROUP BY YEAR(created_at)
    ORDER BY YEAR(created_at)
";
$res = runQuery($conn, $year_sql);
if ($res) {
    while ($r = mysqli_fetch_assoc($res)) {
        $years[] = $r['yr'];
        $year_income[] = (float)$r['year_total'];
    }
}

// Course-wise student counts
$course_names = []; $course_students = [];
$course_sql = "
    SELECT c.course AS cname, COUNT(s.id) AS total_students
    FROM courses c
    LEFT JOIN students s ON s.course_id = c.id
    GROUP BY c.id
";
$res = runQuery($conn, $course_sql);
if ($res) {
    while ($r = mysqli_fetch_assoc($res)) {
        $course_names[] = $r['cname'];
        $course_students[] = (int)$r['total_students'];
    }
}

// Recent payments (last 8) - list of actual payments (no aggregation)
$recent = [];
$recent_sql = "
    SELECT sf.id, sf.paid_amount, sf.payment_mode, sf.created_at,
           COALESCE(s.student_name, 'Unknown') AS student_name,
           COALESCE(c.course, '') AS course_name
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

<!-- ======= UI ======= -->
<style>
.card-box {
    padding: 18px;
    border-radius: 10px;
    background: #fff;
    box-shadow: 0 2px 10px rgba(0,0,0,0.06);
    text-align: center;
}
.card-box h3 { margin-top: 8px; font-weight:700; }
.card-row .col { margin-bottom: 16px; }
.icon-lg { font-size: 30px; color: #0d6efd; }
@media(max-width:768px){ .card-box { text-align:center } }
</style>

<div class="main-content">
  <div class="container mt-4">
    <h3 class="mb-3">Dashboard</h3>

    <!-- Top boxes -->
    <div class="row card-row">
      <div class="col-md-3 col-6">
        <div class="card-box">
          <div class="icon-lg"><i class="bi bi-people-fill"></i></div>
          <h3><?= number_format($total_students) ?></h3>
          <div>Students</div>
        </div>
      </div>

      <div class="col-md-3 col-6">
        <div class="card-box">
          <div class="icon-lg"><i class="bi bi-journal-bookmark"></i></div>
          <h3><?= number_format($total_courses) ?></h3>
          <div>Courses</div>
        </div>
      </div>

      <div class="col-md-3 col-6">
        <div class="card-box">
          <div class="icon-lg"><i class="bi bi-cash-stack"></i></div>
          <h3>₹<?= number_format($total_amount, 2) ?></h3>
          <div>Total Amount (one fee per student)</div>
        </div>
      </div>

      <div class="col-md-3 col-6">
        <div class="card-box">
          <div class="icon-lg"><i class="bi bi-wallet2"></i></div>
          <h3>₹<?= number_format($total_paid, 2) ?></h3>
          <div>Total Paid</div>
        </div>
      </div>

      <div class="col-12">
        <div class="card-box mt-2">
          <h4 class="text-danger">Pending: ₹<?= number_format($total_pending, 2) ?></h4>
        </div>
      </div>
    </div>

    <!-- Quick actions -->
    <div class="card mt-4 p-3 shadow-sm">
      <div class="d-flex flex-wrap justify-content-between align-items-center">
        <h5 class="mb-0">Quick Actions</h5>
        <div class="mt-2">
          <a class="btn btn-primary btn-sm" href="new_registration.php">New Registration</a>
          <a class="btn btn-success btn-sm" href="add_course.php">Add Course</a>
          <a class="btn btn-warning btn-sm" href="add_fees.php">Add Payment</a>
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-md-4 text-center">
          <h6>Paid vs Pending</h6>
          <canvas id="paidPendingChart" height="200"></canvas>
        </div>
        <div class="col-md-4 text-center">
          <h6>Monthly Income</h6>
          <canvas id="monthlyIncomeChart" height="200"></canvas>
        </div>
        <div class="col-md-4 text-center">
          <h6>Yearly Income</h6>
          <canvas id="yearlyIncomeChart" height="200"></canvas>
        </div>

        <div class="col-12 mt-4">
          <h6>Course-wise Students</h6>
          <canvas id="courseChart" height="100"></canvas>
        </div>
      </div>
    </div>

    <!-- Recent payments -->
    <div class="card mt-4 p-3 shadow-sm">
      <h5>Recent Payments</h5>
      <div class="table-responsive">
        <table class="table table-sm table-bordered">
          <thead class="table-light text-center">
            <tr><th>#</th><th>Student</th><th>Course</th><th>Paid (₹)</th><th>Mode</th><th>Date</th></tr>
          </thead>
          <tbody class="text-center">
            <?php if (count($recent) === 0) { ?>
              <tr><td colspan="6">No recent payments</td></tr>
            <?php } else {
              $i=1;
              foreach($recent as $r) { ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= htmlspecialchars($r['student_name']) ?></td>
                  <td><?= htmlspecialchars($r['course_name']) ?></td>
                  <td>₹<?= number_format($r['paid_amount'],2) ?></td>
                  <td><?= htmlspecialchars($r['payment_mode']) ?></td>
                  <td><?= htmlspecialchars($r['created_at']) ?></td>
                </tr>
            <?php } } ?>
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
        labels: ['Paid','Pending'],
        datasets: [{
            data: [totalPaid, totalPending],
            backgroundColor: ['#28a745','#dc3545']
        }]
    }
});

// Monthly income bar
new Chart(document.getElementById('monthlyIncomeChart'), {
    type: 'bar',
    data: {
        labels: months,
        datasets: [{ label: 'Income (₹)', data: monthIncome, backgroundColor: '#0d6efd' }]
    },
    options: { scales: { y: { beginAtZero: true } } }
});

// Yearly income bar
new Chart(document.getElementById('yearlyIncomeChart'), {
    type: 'bar',
    data: {
        labels: years,
        datasets: [{ label: 'Income (₹)', data: yearIncome, backgroundColor: '#198754' }]
    },
    options: { scales: { y: { beginAtZero: true } } }
});

// Course-wise students
new Chart(document.getElementById('courseChart'), {
    type: 'bar',
    data: { labels: courseNames, datasets: [{ label: 'Students', data: courseStudents, backgroundColor: '#6f42c1' }] },
    options: { scales: { y: { beginAtZero: true } } }
});
</script>

