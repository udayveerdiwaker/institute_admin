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

// date filters via GET
$from = !empty($_GET['from']) ? $_GET['from'] : '';
$to   = !empty($_GET['to']) ? $_GET['to'] : '';
$where = "1";
if ($from) { $from_esc = mysqli_real_escape_string($conn, $from); $where .= " AND expense_date >= '$from_esc'"; }
if ($to)   { $to_esc   = mysqli_real_escape_string($conn, $to);   $where .= " AND expense_date <= '$to_esc'"; }

// totals
$tq = mysqli_query($conn, "SELECT COALESCE(SUM(amount),0) AS total_amount FROM expenses WHERE $where");
$tr = mysqli_fetch_assoc($tq);
$total_amount = (float)$tr['total_amount'];

// monthly aggregation (for chart)
$months = []; $monthly_amount = [];
$mq = mysqli_query($conn, "
    SELECT DATE_FORMAT(expense_date,'%b %Y') AS month, SUM(amount) AS total
    FROM expenses
    WHERE $where
    GROUP BY YEAR(expense_date), MONTH(expense_date)
    ORDER BY YEAR(expense_date), MONTH(expense_date)
");
while ($r = mysqli_fetch_assoc($mq)) { $months[] = $r['month']; $monthly_amount[] = (float)$r['total']; }

// yearly aggregation
$years = []; $yearly_amount = [];
$yq = mysqli_query($conn, "
    SELECT YEAR(expense_date) AS yr, SUM(amount) AS total
    FROM expenses
    WHERE $where
    GROUP BY YEAR(expense_date)
    ORDER BY YEAR(expense_date)
");
while ($r = mysqli_fetch_assoc($yq)) { $years[] = $r['yr']; $yearly_amount[] = (float)$r['total']; }

// list rows
$list_q = mysqli_query($conn, "SELECT * FROM expenses WHERE $where ORDER BY expense_date DESC, id DESC");
?>

<div class="main-content">
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Expenses</h3>
            <a href="expense_add.php" class="btn btn-success">+ Add Expense</a>
        </div>

        <div class="card p-3 mb-3">
            <form method="get" class="row g-2 align-items-end">
                <div class="col-md-3">
                    <label class="form-label">From</label>
                    <input type="date" name="from" class="form-control" value="<?= htmlspecialchars($from) ?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label">To</label>
                    <input type="date" name="to" class="form-control" value="<?= htmlspecialchars($to) ?>">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary w-100">Filter</button>
                </div>
                <div class="col-md-2">
                    <a href="expense_list.php" class="btn btn-secondary w-100">Reset</a>
                </div>
                <div class="col-md-2 text-end">
                    <h5>Total: ₹<?= number_format($total_amount,2) ?></h5>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card p-3 mb-3">
                    <h5 class="mb-3">Monthly</h5>
                    <canvas id="monthlyChart"></canvas>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card p-3 mb-3">
                    <h5 class="mb-3">Yearly</h5>
                    <canvas id="yearlyChart"></canvas>
                </div>
            </div>
        </div>

        <div class="card p-3">
            <div class="table-responsive">
                <table class="table table-sm table-bordered">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Amount (₹)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; while($row = mysqli_fetch_assoc($list_q)) { ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= htmlspecialchars($row['expense_date']) ?></td>
                            <td><?= htmlspecialchars($row['name']) ?></td>
                            <td><?= nl2br(htmlspecialchars($row['description'])) ?></td>
                            <td class="text-end">₹<?= number_format($row['amount'],2) ?></td>
                            <td class="text-center">
                                <a href="expense_edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="expense_delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete this expense?')">Delete</a>
                            </td>
                        </tr>
                        <?php } if ($i===1) echo '<tr><td colspan="6" class="text-center">No expenses found</td></tr>'; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
new Chart(document.getElementById('monthlyChart'), {
    type: 'bar',
    data: {
        labels: <?= json_encode($months) ?>,
        datasets: [{
            label: 'Monthly Expenses (₹)',
            data: <?= json_encode($monthly_amount) ?>,
            backgroundColor: '#dc3545'
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

new Chart(document.getElementById('yearlyChart'), {
    type: 'bar',
    data: {
        labels: <?= json_encode($years) ?>,
        datasets: [{
            label: 'Yearly Expenses (₹)',
            data: <?= json_encode($yearly_amount) ?>,
            backgroundColor: '#198754'
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>