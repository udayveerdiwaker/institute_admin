<?php
include 'session.php';
include 'sidebar.php';

// Filters
$guest_name = $_GET['guest_name'] ?? '';
$phone      = $_GET['phone'] ?? '';
$date       = $_GET['date'] ?? '';

/* ================= PAGINATION ================= */
$limit  = 10;
$page   = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$offset = ($page - 1) * $limit;

/* ================= BASE QUERY ================= */
$sql = "SELECT * FROM guests WHERE 1=1";

/* ================= APPLY FILTERS ================= */
if (!empty($guest_name)) {
    $guest_name = mysqli_real_escape_string($conn, $guest_name);
    $sql .= " AND guest_name LIKE '$guest_name%'";
}

if (!empty($phone)) {
    $phone = mysqli_real_escape_string($conn, $phone);
    $sql .= " AND phone LIKE '$phone%'";
}

if (!empty($date)) {
    $date = mysqli_real_escape_string($conn, $date);
    $sql .= " AND visit_date = '$date'";
}

/* ================= COUNT QUERY ================= */
$count_sql = "SELECT COUNT(*) AS total FROM guests WHERE 1=1";

if (!empty($guest_name)) {
    $count_sql .= " AND guest_name LIKE '$guest_name%'";
}
if (!empty($phone)) {
    $count_sql .= " AND phone LIKE '$phone%'";
}
if (!empty($date)) {
    $count_sql .= " AND visit_date = '$date'";
}

$count_q = mysqli_query($conn, $count_sql);
$total_records = mysqli_fetch_assoc($count_q)['total'] ?? 0;
$total_pages   = ceil($total_records / $limit);

/* ================= FINAL QUERY ================= */
$sql .= " ORDER BY visit_date DESC, id DESC LIMIT $offset, $limit";
$q = mysqli_query($conn, $sql);
?>

<div class="main-content">
    <h3>Guest List</h3>

    <!-- ========= FILTER FORM ========= -->
    <form method="get" class="row g-2 mb-3">
        <div class="col-md-3">
            <input type="text" name="guest_name" class="form-control" placeholder="Guest Name"
                value="<?= htmlspecialchars($guest_name) ?>">
        </div>

        <div class="col-md-6 d-flex gap-2">
            <button class="btn btn-primary">Search</button>
            <a href="guest_list" class="btn btn-secondary">Reset</a>
            <a href="guest_add" class="btn btn-success">+ Add Guest</a>
        </div>
    </form>

    <!-- ========= TABLE ========= -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Guest Name</th>
                <th>Phone</th>
                <th>Purpose</th>
                <th>Lead Type</th>
                <th>Date</th>
                <th>Time</th>
                <th>Attended By</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php
        $i = $offset + 1;
        if ($q && mysqli_num_rows($q) > 0) {
            while ($row = mysqli_fetch_assoc($q)) {

                $color = 'secondary';
                if ($row['lead_type'] === 'Hot') $color = 'danger';
                elseif ($row['lead_type'] === 'Cold') $color = 'info';
                elseif ($row['lead_type'] === 'Close') $color = 'primary';
                elseif ($row['lead_type'] === 'Success') $color = 'success';
        ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= htmlspecialchars($row['guest_name']) ?></td>
                <td><?= htmlspecialchars($row['phone']) ?></td>
                <td><?= htmlspecialchars($row['purpose']) ?></td>
                <td><span class="badge bg-<?= $color ?>"><?= htmlspecialchars($row['lead_type']) ?></span></td>
                <td><?= htmlspecialchars($row['visit_date']) ?></td>
                <td><?= htmlspecialchars($row['visit_time']) ?></td>
                <td><?= htmlspecialchars($row['attended_by']) ?></td>
                <td>
                    <a href="guest_view?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">View</a>
                    <a href="guest_edit?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                </td>
            </tr>
            <?php
            }
        } else {
            echo "<tr><td colspan='9' class='text-center'>No records found</td></tr>";
        }
        ?>
        </tbody>
    </table>


    <!-- PAGINATION -->
    <?php if ($total_pages > 1): ?>
    <div class="d-flex justify-content-center mt-4">
        <ul class="pagination">

            <li class="page-item <?= ($page==1)?'disabled':'' ?>">
                <a class="page-link" href="?page=1">First</a>
            </li>

            <li class="page-item <?= ($page==1)?'disabled':'' ?>">
                <a class="page-link" href="?page=<?= $page-1 ?>">Prev</a>
            </li>

            <li class="page-item active">
                <span class="page-link"><?= $page ?> / <?= $total_pages ?></span>
            </li>

            <li class="page-item <?= ($page==$total_pages)?'disabled':'' ?>">
                <a class="page-link" href="?page=<?= $page+1 ?>">Next</a>
            </li>

            <li class="page-item <?= ($page==$total_pages)?'disabled':'' ?>">
                <a class="page-link" href="?page=<?= $total_pages ?>">Last</a>
            </li>

        </ul>
    </div>
    <?php endif; ?>


</div>

<?php include 'footer.php'; ?>