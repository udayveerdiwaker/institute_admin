<?php
include 'connection.php';


$limit = 10;

// Get page number correctly
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

$offset = ($page - 1) * $limit;

// Search
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

// WHERE condition
$where = "1";
if ($search !== '') {
    $search = mysqli_real_escape_string($conn, $search);
    $where .= " AND (
        s.student_name LIKE '$search%' OR
        s.phone LIKE '$search%' OR
        c.course LIKE '$search%'
    )";
}


$count_sql = "
    SELECT COUNT(*) AS total
    FROM students s
    LEFT JOIN courses c ON s.course_id = c.id
    WHERE $where
";
$count_res = mysqli_query($conn, $count_sql);
$total_row = mysqli_fetch_assoc($count_res);

$total_records = (int)$total_row['total'];
$total_pages   = ceil($total_records / $limit);
$sql = "
    SELECT s.*, c.course AS course_name
    FROM students s
    LEFT JOIN courses c ON s.course_id = c.id
    WHERE $where
    ORDER BY s.id DESC
    LIMIT $limit OFFSET $offset
";
$res = mysqli_query($conn, $sql);
                        
// $sql = "
//     SELECT s.*, c.course AS course_name 
//     FROM students s 
//     LEFT JOIN courses c ON s.course_id = c.id 
//     WHERE $where
//     ORDER BY s.id DESC
// ";

// $res = mysqli_query($conn, $sql);

/* ===== FILTER LOGIC ===== */
$where = "1";

$name = '';
$course_id = '';

if (!empty($_GET['student_name'])) {
    $name = mysqli_real_escape_string($conn, $_GET['student_name']);
    $where .= " AND s.student_name LIKE '$name%'";
}

if (!empty($_GET['course_id'])) {
    $course_id = (int)$_GET['course_id'];
    $where .= " AND s.course_id = $course_id";
}

/* ===== FETCH COURSES FOR FILTER ===== */
$courseList = mysqli_query($conn, "SELECT id, course FROM courses ORDER BY course");
?>
<?php
include 'sidebar.php';
?>
<div class="main-content">

    <div class="container mt-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>All Students</h3>
            <a href="new_registration.php" class="btn btn-success">
                <i class="bi bi-person-plus"></i> New Registration
            </a>
        </div>

        <!-- ===== FILTER FORM ===== -->
        <form method="get" class="row g-3 mb-4">
            <div class="col-md-4">
                <input type="text" name="student_name" class="form-control" placeholder="Search Student Name"
                    value="<?php echo htmlspecialchars($name); ?>">
            </div>

            <div class="col-md-4">
                <select name="course_id" class="form-control">
                    <option value="">-- Select Course --</option>
                    <?php while ($c = mysqli_fetch_assoc($courseList)) { ?>
                    <option value="<?php echo $c['id']; ?>" <?php echo ($course_id == $c['id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($c['course']); ?>
                    </option>
                    <?php } ?>
                </select>
            </div>

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

        <!-- ===== TABLE ===== -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Phone</th>
                        <th>Admission Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php



$i = 1;


if ($res && mysqli_num_rows($res) > 0) {
    while ($r = mysqli_fetch_assoc($res)) {

        $photo = !empty($r['photo']) ? $r['photo'] : 'student_img/default.png';

        echo "<tr>
                <td>{$i}</td>
                <td>
                    <img src='{$photo}' style='width:48px;height:48px;object-fit:cover;border-radius:6px;'>
                </td>
                <td>" . htmlspecialchars($r['student_name']) . "</td>
                <td>" . htmlspecialchars($r['course_name'] ?? '-') . "</td>
                <td>" . htmlspecialchars($r['phone']) . "</td>
                <td>" . htmlspecialchars($r['admission_date']) . "</td>
                <td>
                    <a href='student_view.php?id={$r['id']}' class='btn btn-sm btn-info'>View</a>
                    <a href='student_edit.php?id={$r['id']}' class='btn btn-sm btn-warning'>Edit</a>
                   
                </td>
              </tr>";

        $i++;
 
                    ?>
                    <!-- <a href='student_delete.php?id={$r['id']}' 
                       class='btn btn-sm btn-danger' 
                       onclick=\"return confirm('Delete this student?')\">
                       Delete
                    </a> -->
                    <!-- <tr>
                        <td><?= $r['id'] ?></td>
                        <td>
                            <img src="<?= $photo ?>" style="width:48px;height:48px;
                                object-fit:cover;border-radius:6px">
                        </td>
                        <td><?= htmlspecialchars($r['student_name']) ?></td>
                        <td><?= htmlspecialchars($r['course_name'] ?? '-') ?></td>
                        <td><?= htmlspecialchars($r['phone']) ?></td>
                        <td><?= htmlspecialchars($r['admission_date']) ?></td>
                        <td>
                            <a href="student_view.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-info">View</a>
                            <a href="student_edit.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="student_delete.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-danger"
                                onclick="return confirm('Delete this student?')">Delete</a>
                        </td>
                    </tr> -->
                    <?php
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>No students found</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
        <?php if ($total_pages > 1): ?>
        <div class="d-flex justify-content-center mt-4">
            <ul class="pagination">

                <li class="page-item <?= ($page == 1) ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=1&search=<?= urlencode($search) ?>">First</a>
                </li>

                <li class="page-item <?= ($page == 1) ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $page - 1 ?>&search=<?= urlencode($search) ?>">‹ Prev</a>
                </li>

                <li class="page-item active">
                    <span class="page-link"><?= $page ?> / <?= $total_pages ?></span>
                </li>

                <li class="page-item <?= ($page == $total_pages) ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $page + 1 ?>&search=<?= urlencode($search) ?>">Next ›</a>
                </li>

                <li class="page-item <?= ($page == $total_pages) ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $total_pages ?>&search=<?= urlencode($search) ?>">Last</a>
                </li>

            </ul>
        </div>
        <?php endif; ?>

    </div>
</div>

<?php include 'footer.php'; ?>