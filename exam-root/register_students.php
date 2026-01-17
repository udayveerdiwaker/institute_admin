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
$stu_search = $_GET['stu_search'] ?? '';
$search_sql = "";
if ($stu_search != '') {
    $search_safe = mysqli_real_escape_string($conn, $stu_search);
    $search_sql = "WHERE name LIKE '$search_safe%'";
}

/* Pagination */
$page;     // current page
$total_pages;  // total pages
$search;       // search text (can be empty)

$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $limit;

/* Total records */
$total_q = mysqli_query($conn,"
    SELECT COUNT(*) AS total 
    FROM registered_user 
    $search_sql
");
$total = mysqli_fetch_assoc($total_q)['total'];
$total_pages = ceil($total / $limit);

/* Data query */
$students = mysqli_query($conn,"
    SELECT * FROM registered_user
    $search_sql
    ORDER BY id DESC
    LIMIT $limit OFFSET $offset
");
?>

<div class="main-content">
    <div class="container mt-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>All Registered Students</h4>
            <a href="dashboard.php" class="btn btn-secondary btn-sm">Back</a>
        </div>

        <!-- Search -->
        <!-- <form class="d-flex mb-3 col-4" method="GET">
            <input type="text" name="stu_search" class="form-control me-2" placeholder="Search student"
                value="<?= htmlspecialchars($stu_search) ?>">
            <button class="btn btn-primary">Search</button>
        </form> -->
        <!-- ===== FILTER FORM ===== -->
        <form method="get" class="row g-3 mb-4">
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
                <a href="register_students.php" class="btn btn-secondary w-100">
                    Reset
                </a>
            </div>
        </form>


        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Exam</th>
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
                        <td><?= htmlspecialchars($s['name']) ?></td>
                        <td><?= htmlspecialchars($s['email']) ?></td>
                        <td><?= htmlspecialchars($s['phone']) ?></td>
                        <td>
                            <?php
                        $e = mysqli_fetch_assoc(
                            mysqli_query($conn,"SELECT exam_name FROM exams WHERE id='{$s['exam_id']}'")
                        );
                        echo $e['exam_name'] ?? '-';
                        ?>
                        </td>
                        <td>
                            <a href="start_exam.php?sid=<?= $s['id'] ?>" class="btn btn-primary btn-sm">
                                Start Exam
                            </a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
            ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            No students found
                        </td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
        <style>
        .pagination .page-link {
            border-radius: 20px;
            margin: 0 4px;
        }
        </style>
        <!-- Pagination -->
        <?php if ($total_pages > 1) { ?>
        <div class="d-flex justify-content-center mt-4">
            <nav>
                <ul class="pagination">

                    <!-- First -->
                    <li class="page-item <?= ($page == 1) ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=1&stu_search=<?= urlencode($stu_search) ?>">
                            First
                        </a>
                    </li>

                    <!-- Prev -->
                    <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page-1 ?>&stu_search=<?= urlencode($stu_search) ?>">
                            Prev
                        </a>
                    </li>

                    <!-- Page X / Y -->
                    <li class="page-item disabled">
                        <span class="page-link fw-bold">
                            <?= $page ?> / <?= $total_pages ?>
                        </span>
                    </li>

                    <!-- Next -->
                    <li class="page-item <?= ($page >= $total_pages) ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page+1 ?>&stu_search=<?= urlencode($stu_search) ?>">
                            Next ›
                        </a>
                    </li>

                    <!-- Last -->
                    <li class="page-item <?= ($page == $total_pages) ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $total_pages ?>&stu_search=<?= urlencode($stu_search) ?>">
                            Last
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
        <?php } ?>


    </div>
</div>