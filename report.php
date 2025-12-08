<?php
include 'connection.php';
include 'sidebar.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

/* ===== TOTAL SUMMARY ===== */
$sqlTotal = mysqli_query($conn,"
    SELECT 
        COALESCE(SUM(total_fee),0) AS total_amount,
        COALESCE(SUM(discount),0) AS total_discount,
        COALESCE(SUM(paid_amount),0) AS net_amount
    FROM student_fees
");

if (!$sqlTotal) {
    die("Total SQL Error: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($sqlTotal);

/* ===== MONTHLY REPORT ===== */
$months = [];
$monthly_net = [];

$sqlMonthly = mysqli_query($conn,"
    SELECT 
        DATE_FORMAT(created_at,'%b %Y') AS month,
        SUM(paid_amount) AS amount
    FROM student_fees
    GROUP BY YEAR(created_at), MONTH(created_at)
    ORDER BY YEAR(created_at), MONTH(created_at)
");

if ($sqlMonthly) {
    while ($r = mysqli_fetch_assoc($sqlMonthly)) {
        $months[] = $r['month'];
        $monthly_net[] = $r['amount'];
    }
}

/* ===== YEARLY REPORT ===== */
$years = [];
$yearly_net = [];

$sqlYearly = mysqli_query($conn,"
    SELECT 
        YEAR(created_at) AS year,
        SUM(paid_amount) AS amount
    FROM student_fees
    GROUP BY YEAR(created_at)
    ORDER BY YEAR(created_at)
");

if ($sqlYearly) {
    while ($r = mysqli_fetch_assoc($sqlYearly)) {
        $years[] = $r['year'];
        $yearly_net[] = $r['amount'];
    }
}
?>


<div class="main-content">
<div class="container mt-4">

<h3 class="mb-4">Financial Report</h3>

<!-- ================= SUMMARY CARDS ================= -->
<div class="row g-4">
    <div class="col-md-4 col-12">
        <div class="card shadow text-center p-3">
            <h6>Total Amount</h6>
            <h3 class="text-primary">₹<?= number_format($total_amount,2) ?></h3>
        </div>
    </div>

    <div class="col-md-4 col-12">
        <div class="card shadow text-center p-3">
            <h6>Total Discount</h6>
            <h3 class="text-danger">₹<?= number_format($total_discount,2) ?></h3>
        </div>
    </div>

    <div class="col-md-4 col-12">
        <div class="card shadow text-center p-3">
            <h6>Net Amount</h6>
            <h3 class="text-success">₹<?= number_format($net_amount,2) ?></h3>
        </div>
    </div>
</div>

<!-- ================= CHARTS ================= -->
<div class="row mt-4">
    <div class="col-md-6">
        <div class="card shadow p-3">
            <h5 class="text-center">Monthly Income</h5>
            <canvas id="monthlyChart"></canvas>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card shadow p-3">
            <h5 class="text-center">Yearly Income</h5>
            <canvas id="yearlyChart"></canvas>
        </div>
    </div>
</div>

</div>
</div>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
/* ===== MONTHLY CHART ===== */
new Chart(document.getElementById('monthlyChart'), {
    type: 'bar',
    data: {
        labels: <?= json_encode($months) ?>,
        datasets: [{
            label: 'Monthly Net Amount (₹)',
            data: <?= json_encode($monthly_net) ?>,
            backgroundColor: '#0d6efd'
        }]
    },
    options: { responsive:true }
});

/* ===== YEARLY CHART ===== */
new Chart(document.getElementById('yearlyChart'), {
    type: 'bar',
    data: {
        labels: <?= json_encode($years) ?>,
        datasets: [{
            label: 'Yearly Net Amount (₹)',
            data: <?= json_encode($yearly_net) ?>,
            backgroundColor: '#198754'
        }]
    },
    options: { responsive:true }
});
</script>
