<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'exam_user') {
    header("Location: ../login.php");
    exit;
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'header.php';
/* Search */
/* Search */
$stu_search = $_GET['stu_search'] ?? '';
$search_sql = "";

if ($stu_search != '') {
    $search_safe = mysqli_real_escape_string($conn, $stu_search);
    $search_sql = " AND student_name LIKE '$search_safe%'";
}

/* Pagination settings */
$limit = 1;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $limit;

/* Total unregistered students */
$total_q = mysqli_query($conn,"
    SELECT COUNT(*) AS total
    FROM students
    WHERE student_name NOT IN (
        SELECT name FROM registered_user
    )
    $search_sql
");

$total = mysqli_fetch_assoc($total_q)['total'];
$total_pages = ceil($total / $limit);

/* Fetch unregistered students */
$students = mysqli_query($conn,"
    SELECT *
    FROM students
    WHERE student_name NOT IN (
        SELECT name FROM registered_user
    )
    $search_sql
    ORDER BY id DESC
    LIMIT $limit OFFSET $offset
");

?>

<div class="main-content">

    <div class="d-flex justify-content-between align-items-center">
        <h5>Unregistered Students</h5>
        <a href="dashboard.php" class="btn btn-secondary btn-sm">Back</a>
    </div>
    <!-- ===== FILTER FORM ===== -->
    <form method="get" class="row g-3 mb-4 mt-2 align-items-center">
        <div class="col-md-4">
            <input type="text" name="stu_search" class="form-control" placeholder="Search Student Name"
                value="<?php echo htmlspecialchars($stu_search); ?>">
        </div>

        <!-- <div class="col-md-4">
                <select name="course_id" class="form-control">
                    <option value="">-- Select Course --</option>
                    <?php while ($c = mysqli_fetch_assoc($courseList)) { ?>
                    <option value="<?php echo $c['id']; ?>" <?php echo ($course_id == $c['id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($c['course']); ?>
                    </option>
                    <?php } ?>
                </select>
            </div> -->

        <div class="col-md-2">
            <button class="btn btn-primary w-100">
                <i class="bi bi-search"></i> Filter
            </button>
        </div>

        <div class="col-md-2">
            <a href="all_students.php" class="btn btn-secondary w-100">
                Reset
            </a>
        </div>
    </form>

    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
            if (mysqli_num_rows($students) > 0) {
                $i = $offset + 1;
                while ($s = mysqli_fetch_assoc($students)) {
            ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= htmlspecialchars($s['student_name']) ?></td>
                    <td><?= htmlspecialchars($s['phone']) ?></td>
                    <td>
                        <span class="badge bg-danger">Not Registered</span>
                    </td>
                    <td>
                        <a href="registration_student.php?sid=<?= $s['id'] ?>" class="btn btn-sm btn-primary">
                            Register
                        </a>
                    </td>
                </tr>
                <?php
                }
            } else {
            ?>
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        All students are registered 🎉
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <?php if ($total_pages > 1) { ?>
    <div class="d-flex justify-content-center mt-4">
        <nav>
            <ul class="pagination">

                <!-- First -->
                <li class="page-item <?= ($page == 1) ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=1&stu_search=<?= urlencode($stu_search) ?>">First</a>
                </li>

                <!-- Prev -->
                <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $page-1 ?>&stu_search=<?= urlencode($stu_search) ?>">Prev</a>
                </li>

                <!-- Page X / Y -->
                <li class="page-item disabled">
                    <span class="page-link fw-bold">
                        <?= $page ?> / <?= $total_pages ?>
                    </span>
                </li>

                <!-- Next -->
                <li class="page-item <?= ($page >= $total_pages) ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $page+1 ?>&stu_search=<?= urlencode($stu_search) ?>">Next ›</a>
                </li>

                <!-- Last -->
                <li class="page-item <?= ($page == $total_pages) ? 'disabled' : '' ?>">
                    <a class="page-link"
                        href="?page=<?= $total_pages ?>&stu_search=<?= urlencode($stu_search) ?>">Last</a>
                </li>

            </ul>
        </nav>
    </div>
    <?php } ?>

</div>