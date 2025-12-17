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

/* ===== PAGINATION SETTINGS ===== */
$limit = 10; // records per page
$page = isset($_GET['page']) && $_GET['page'] > 0 ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

/* ===== TOTAL RECORDS ===== */
$count_q = mysqli_query($conn, "SELECT COUNT(*) AS total FROM courses");
$count_r = mysqli_fetch_assoc($count_q);
$total_records = $count_r['total'];

$total_pages = ceil($total_records / $limit);

/* ===== FETCH COURSES ===== */
$sql = "SELECT * FROM courses ORDER BY id DESC LIMIT $offset, $limit";
$res = mysqli_query($conn, $sql);
?>

<div class="main-content">
    <div class="container mt-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Course List</h3>
            <a href="course_add.php" class="btn btn-success">+ Add Course</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Course Name</th>
                            <th>Fees (₹)</th>
                            <th>Duration</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($res && mysqli_num_rows($res) > 0) {
                            $i = $offset + 1;
                            while ($row = mysqli_fetch_assoc($res)) {
                                echo "<tr>
                                    <td>{$i}</td>
                                    <td>".htmlspecialchars($row['course'])."</td>
                                    <td>₹".number_format($row['fees'],2)."</td>
                                    <td>".htmlspecialchars($row['duration'])."</td>
                                    <td>
                                        <a href='course_edit.php?id={$row['id']}' class='btn btn-sm btn-warning'><i class='bi bi-pencil-square'></i></a>
                                        <a href='course_delete.php?id={$row['id']}' 
                                           class='btn btn-sm btn-danger'
                                           onclick=\"return confirm('Delete this course?')\"><i class='bi bi-trash'></i></a>
                                    </td>
                                </tr>";
                                $i++;
                            }
                        } else {
                            echo "<tr><td colspan='5'>No courses found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ===== PAGINATION UI ===== -->
        <?php if ($total_pages > 1): ?>
        <div class="d-flex justify-content-center mt-4">
            <ul class="pagination">

                <!-- First -->
                <li class="page-item <?= ($page == 1) ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=1">First</a>
                </li>

                <!-- Prev -->
                <li class="page-item <?= ($page == 1) ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $page - 1 ?>">Prev</a>
                </li>

                <!-- Current Page -->
                <li class="page-item active">
                    <span class="page-link">
                        <?= $page ?> / <?= $total_pages ?>
                    </span>
                </li>

                <!-- Next -->
                <li class="page-item <?= ($page == $total_pages) ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $page + 1 ?>">Next ›</a>
                </li>

                <!-- Last -->
                <li class="page-item <?= ($page == $total_pages) ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $total_pages ?>">Last</a>
                </li>

            </ul>
        </div>
        <?php endif; ?>

    </div>
</div>

<?php include 'footer.php'; ?>