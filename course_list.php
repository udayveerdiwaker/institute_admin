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

$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page,1);
$offset = ($page - 1) * $limit;

/* TOTAL COUNT */
$count_sql = "SELECT COUNT(*) AS total FROM courses";
$count_res = mysqli_fetch_assoc(mysqli_query($conn,$count_sql));
$total_records = $count_res['total'];
$total_pages = ceil($total_records / $limit);

/* FETCH DATA */
$sql = "SELECT * FROM courses ORDER BY id DESC LIMIT $offset, $limit";
$res = mysqli_query($conn,$sql);
?>

<div class="main-content">
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Course List</h3>
            <a href="course_add.php" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Add Course
            </a>
        </div>

        <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Course Name</th>
                    <th>Duration</th>
                    <th>Fees</th>
                    <th>Monthly Fee</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=$offset+1; while($row=mysqli_fetch_assoc($res)){ ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= htmlspecialchars($row['course']) ?></td>
                    <td><?= htmlspecialchars($row['duration']) ?></td>
                    <td>₹<?= number_format($row['fees'],2) ?></td>
                    <td>₹<?= number_format($row['monthly_fee'],2) ?></td>
                    <td>
                        <a href="course_view.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-info">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="course_add.php?edit=<?= $row['id'] ?>" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <a href="course_delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure you want to delete this course?');">
                            <i class="bi bi-trash"></i>
                    </td>
                </tr>
                <?php } ?>
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
</div>

<?php include 'footer.php'; ?>