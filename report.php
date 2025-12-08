<?php
include 'connection.php';
include 'sidebar.php';

/* ================= FILTERS ================= */
$from = $_GET['from'] ?? '';
$to   = $_GET['to'] ?? '';
$type = $_GET['type'] ?? 'all'; // all | monthly | yearly
$year = $_GET['year'] ?? date('Y');
$month = $_GET['month'] ?? date('m');

$where = "1";
if ($from && $to) {
    $where .= " AND DATE(sf.created_at) BETWEEN '$from' AND '$to'";
}
if ($type == 'monthly') {
    $where .= " AND YEAR(sf.created_at)='$year' AND MONTH(sf.created_at)='$month'";
}
if ($type == 'yearly') {
    $where .= " AND YEAR(sf.created_at)='$year'";
}

/* ================= paid AMOUNT ================= */
$sql_total = "
    SELECT COALESCE(SUM(sf.paid_amount),0) AS total_amount
    FROM student_fees sf
    WHERE $where
";
$total_amount = mysqli_fetch_assoc(mysqli_query($conn,$sql_total))['total_amount'];

/* ================= CHEQUE (DISCOUNT) ================= */
$sql_cheque = "
    SELECT COALESCE(SUM(sf.paid_amount),0) AS cheque
    FROM student_fees sf
    WHERE LOWER(sf.payment_mode)='cheque' AND $where
";
$cheque = mysqli_fetch_assoc(mysqli_query($conn,$sql_cheque))['cheque'];

$net_amount = $total_amount - $cheque;

/* ================= PAYMENT MODE SUMMARY ================= */
$sql_modes = "
    SELECT payment_mode, SUM(paid_amount) AS amount
    FROM student_fees sf
    WHERE $where
    GROUP BY payment_mode
";
$mode_q = mysqli_query($conn,$sql_modes);
$modes = ['Cash'=>0,'Online'=>0,'Cheque'=>0];
while($r = mysqli_fetch_assoc($mode_q)){
    $modes[$r['payment_mode']] = $r['amount'];
}

/* ================= STUDENT-WISE CHEQUE ================= */
$sql_student_cheque = "
    SELECT st.student_name, SUM(sf.paid_amount) AS amount
    FROM student_fees sf
    JOIN students st ON sf.student_id=st.id
    WHERE LOWER(sf.payment_mode)='cheque' AND $where
    GROUP BY st.id
    ORDER BY amount DESC
";
$student_q = mysqli_query($conn,$sql_student_cheque);

/* ================= MONTHLY ================= */
$sql_month = "
    SELECT DATE_FORMAT(sf.created_at,'%b %Y') AS m, SUM(sf.paid_amount) AS amt
    FROM student_fees sf
    WHERE LOWER(sf.payment_mode)='cheque'
    GROUP BY YEAR(sf.created_at),MONTH(sf.created_at)
";
$mq = mysqli_query($conn,$sql_month);
$months=[];$month_amt=[];
while($r=mysqli_fetch_assoc($mq)){ $months[]=$r['m']; $month_amt[]=$r['amt']; }

/* ================= YEARLY ================= */
$sql_year = "
    SELECT YEAR(sf.created_at) y, SUM(sf.paid_amount) amt
    FROM student_fees sf
    WHERE LOWER(sf.payment_mode)='cheque'
    GROUP BY YEAR(sf.created_at)
";
$yq = mysqli_query($conn,$sql_year);
$years=[];$year_amt=[];
while($r=mysqli_fetch_assoc($yq)){ $years[]=$r['y']; $year_amt[]=$r['amt']; }
?>

<div class="main-content">
    <div class="container mt-4">

        <h4 class="mb-3">Fees Reporting</h4>

        <!-- ================= FILTER ================= -->
        <form class="row g-2 mb-4">
            <div class="col-md-2">
                <input type="date" name="from" class="form-control" value="<?php echo $from ?>">
            </div>
            <div class="col-md-2">
                <input type="date" name="to" class="form-control" value="<?php echo $to ?>">
            </div>
            <div class="col-md-2">
                <select name="type" class="form-control">
                    <option value="all">All</option>
                    <option value="monthly" <?php echo $type=='monthly'?'selected':'' ?>>Monthly</option>
                    <option value="yearly" <?php echo $type=='yearly'?'selected':'' ?>>Yearly</option>
                </select>
            </div>
            <div class="col-md-2">
                <input type="number" name="year" class="form-control" value="<?php echo $year ?>">
            </div>
            <div class="col-md-2">
                <input type="number" name="month" class="form-control" min="1" max="12" value="<?php echo $month ?>">
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary w-100">Filter</button>
            </div>
        </form>

        <!-- ================= SUMMARY ================= -->
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card p-3 text-center">
                    <h6>Total Amount</h6>
                    <h4 class="text-primary">₹<?php echo number_format($total_amount,2) ?></h4>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3 text-center">
                    <h6>Cheque (Discount)</h6>
                    <h4 class="text-danger">₹<?php echo number_format($cheque,2) ?></h4>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3 text-center">
                    <h6>Net Amount</h6>
                    <h4 class="text-success">₹<?php echo number_format($net_amount,2) ?></h4>
                </div>
            </div>
        </div>

        <!-- ================= CHARTS ================= -->
        <div class="row mb-4">
            <div class="col-md-6"><canvas id="modeChart"></canvas></div>
            <div class="col-md-6"><canvas id="monthChart"></canvas></div>
        </div>

        <!-- ================= STUDENT CHEQUE TABLE ================= -->
        <div class="card shadow">
            <div class="card-body">
                <h5>Student-wise Cheque (Discount)</h5>
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Student</th>
                        <th>Cheque Amount</th>
                    </tr>
                    <?php $i=1; while($r=mysqli_fetch_assoc($student_q)){ ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo htmlspecialchars($r['student_name']) ?></td>
                        <td>₹<?php echo number_format($r['amount'],2) ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
new Chart(document.getElementById('modeChart'), {
    type: 'pie',
    data: {
        labels: ['Cash', 'Online', 'Cheque (Discount)'],
        datasets: [{
            data: [
                <?php echo $modes['Cash'] ?>,
                <?php echo $modes['Online'] ?>,
                <?php echo $modes['Cheque'] ?>
            ]
        }]
    }
});

new Chart(document.getElementById('monthChart'), {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($months) ?>,
        datasets: [{
            label: 'Cheque (Discount)',
            data: <?php echo json_encode($month_amt) ?>
        }]
    }
});
</script>

<?php include 'footer.php'; ?>