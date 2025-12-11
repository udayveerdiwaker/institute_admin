<?php
include 'connection.php';
include 'sidebar.php';

// Filters
$guest_name = $_GET['guest_name'] ?? '';
$phone      = $_GET['phone'] ?? '';
$date       = $_GET['date'] ?? '';

// Base query
$sql = "SELECT * FROM guests WHERE 1=1";

// Apply filters
if (!empty($guest_name)) {
    $sql .= " AND guest_name LIKE '%" . mysqli_real_escape_string($conn, $guest_name) . "%'";
}

if (!empty($phone)) {
    $sql .= " AND phone LIKE '%" . mysqli_real_escape_string($conn, $phone) . "%'";
}

if (!empty($date)) {
    $sql .= " AND visit_date = '" . mysqli_real_escape_string($conn, $date) . "'";
}

$sql .= " ORDER BY id DESC";
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

        <!-- <div class="col-md-3">
            <input type="text" name="phone" class="form-control" placeholder="Phone"
                value="<?= htmlspecialchars($phone) ?>">
        </div>

        <div class="col-md-3">
            <input type="date" name="date" class="form-control" value="<?= htmlspecialchars($date) ?>">
        </div> -->

        <div class="col-md-6 d-flex gap-2">
            <button class="btn btn-primary">Search</button>
            <a href="list_guest.php" class="btn btn-secondary">Reset</a>
            <a href="guest_add.php" class="btn btn-success">+ Add Guest</a>
        </div>
    </form>

    <!-- ========= TABLE ========= -->
    <table class='table table-bordered table-striped'>
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Guest Name</th>
                <th>Phone</th>
                <th>Purpose</th>
                <th>Date</th>
                <th>Time</th>
                <th>Attended By</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $i = 1;
            if ($q && mysqli_num_rows($q) > 0) {
                while ($row = mysqli_fetch_assoc($q)) {
            ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= htmlspecialchars($row['guest_name']) ?></td>
                <td><?= htmlspecialchars($row['phone']) ?></td>
                <td><?= htmlspecialchars($row['purpose']) ?></td>
                <td><?= htmlspecialchars($row['visit_date']) ?></td>
                <td><?= htmlspecialchars($row['visit_time']) ?></td>
                <td><?= htmlspecialchars($row['attended_by']) ?></td>
                <td>
                    <a href="guest_view.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">View</a>
                    <a href="guest_edit.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="guest_delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm"
                        onclick="return confirm('Delete this guest?')">Delete</a>
                </td>
            </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='8' class='text-center'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>