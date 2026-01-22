<?php
include 'session.php';
include 'header.php';

/* Search */
$stu_search = $_GET['stu_search'] ?? '';
$search_sql = '';
if ($stu_search != '') {
    $safe = mysqli_real_escape_string($conn, $stu_search);
    $search_sql = "WHERE student_name LIKE '$safe%'";
}

/* Pagination */
$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $limit;

/* Total records */
$total_q = mysqli_query($conn,"
    SELECT COUNT(*) AS total 
    FROM result
    $search_sql
");
$total = mysqli_fetch_assoc($total_q)['total'];
$total_pages = ceil($total / $limit);

/* Data */
$res = mysqli_query($conn,"
    SELECT * FROM result
    $search_sql
    ORDER BY id DESC
    LIMIT $limit OFFSET $offset
");
?>

<div class="main-content">
    <div class="container mt-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>All Registered Students</h4>
            <a href="dashboard" class="btn btn-secondary btn-sm">Back</a>
        </div>
        <!-- <form class="d-flex" method="GET">
                <input type="text" name="search" class="form-control me-2" placeholder="Search student"
                    value="<?= htmlspecialchars($stu_search) ?>">
                <button class="btn btn-primary">Search</button>
            </form> -->

        <form method="get" class="row g-3 mb-4 mt-2 align-items-center">
            <div class="col-md-4">
                <input type="text" name="stu_search" class="form-control" placeholder="Search Student Name"
                    value="<?php echo htmlspecialchars($stu_search); ?>">
            </div>


            <div class="col-md-2">
                <button class="btn btn-primary w-100">
                    <i class="bi bi-search"></i> Filter
                </button>
            </div>

            <div class="col-md-2">
                <a href="results" class="btn btn-secondary w-100">
                    Reset
                </a>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Student Name</th>
                        <th>Marks</th>
                        <th>Status</th>
                        <th width="220">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
            if (mysqli_num_rows($res) > 0) {
                $i = $offset + 1;
                while ($r = mysqli_fetch_assoc($res)) {
                    $status = ($r['student_marks'] >= 33) ? 'Pass' : 'Fail';
            ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= htmlspecialchars($r['student_name']) ?></td>
                        <td><?= $r['student_marks'] ?></td>
                        <td>
                            <span class="badge <?= $status=='Pass'?'bg-success':'bg-danger' ?>">
                                <?= $status ?>
                            </span>
                        </td>
                        <td>
                            <a href="view_result?id=<?= $r['id'] ?>" class="btn btn-sm btn-info">View</a>

                            <a href="print_result?id=<?= $r['id'] ?>" target="_blank"
                                class="btn btn-sm btn-secondary">Print</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
            ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            No results found
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

                    <li class="page-item <?= ($page == 1) ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=1&stu_search=<?= urlencode($stu_search) ?>">First</a>
                    </li>

                    <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                        <a class="page-link"
                            href="?page=<?= $page-1 ?>&stu_search=<?= urlencode($stu_search) ?>">Prev</a>
                    </li>

                    <li class="page-item disabled">
                        <span class="page-link fw-bold">
                            <?= $page ?> / <?= $total_pages ?>
                        </span>
                    </li>

                    <li class="page-item <?= ($page >= $total_pages) ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page+1 ?>&stu_search=<?= urlencode($stu_search) ?>">Next
                            ›</a>
                    </li>

                    <li class="page-item <?= ($page == $total_pages) ? 'disabled' : '' ?>">
                        <a class="page-link"
                            href="?page=<?= $total_pages ?>&stu_search=<?= urlencode($stu_search) ?>">Last</a>
                    </li>

                </ul>
            </nav>
        </div>
        <?php } ?>

    </div>
</div>