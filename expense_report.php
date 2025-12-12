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

/* MONTHLY EXPENSE */
$m = mysqli_query($conn, "
    SELECT DATE_FORMAT(expense_date,'%b %Y') AS month, SUM(amount) AS total
    FROM expenses
    GROUP BY YEAR(expense_date), MONTH(expense_date)
    ORDER BY YEAR(expense_date), MONTH(expense_date)
");

$months = [];
$monthly_total = [];
while ($r = mysqli_fetch_assoc($m)) {
    $months[] = $r['month'];
    $monthly_total[] = $r['total'];
}

/* YEARLY EXPENSE */
$y = mysqli_query($conn, "
    SELECT YEAR(expense_date) AS year, SUM(amount) AS total
    FROM expenses
    GROUP BY YEAR(expense_date)
    ORDER BY YEAR(expense_date)
");

$years = [];
$yearly_total = [];
while ($r = mysqli_fetch_assoc($y)) {
    $years[] = $r['year'];
    $yearly_total[] = $r['total'];
}
include 'sidebar.php';
?>

<div class="main-content">
    <div class="container mt-4">
        <h3>Expense Report</h3>

        <div class="row mt-4">

            <div class="col-md-6">
                <div class="card p-3 shadow">
                    <h5>Monthly Expenses</h5>
                    <canvas id="monthlyChart"></canvas>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card p-3 shadow">
                    <h5>Yearly Expenses</h5>
                    <canvas id="yearlyChart"></canvas>
                </div>
            </div>

        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
new Chart(document.getElementById("monthlyChart"), {
    type: "bar",
    data: {
        labels: <?= json_encode($months) ?>,
        datasets: [{
            label: "Monthly Expense (₹)",
            data: <?= json_encode($monthly_total) ?>,
            backgroundColor: "#dc3545"
        }]
    }
});

new Chart(document.getElementById("yearlyChart"), {
    type: "bar",
    data: {
        labels: <?= json_encode($years) ?>,
        datasets: [{
            label: "Yearly Expense (₹)",
            data: <?= json_encode($yearly_total) ?>,
            backgroundColor: "#0d6efd"
        }]
    }
});
</script>

<?php include 'footer.php'; ?>