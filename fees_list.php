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

/* ========= FILTER LOGIC ========= */
$where = "1";
$student_name = '';
$course_id = '';

if (!empty($_GET['student_name'])) {
    $student_name = mysqli_real_escape_string($conn, $_GET['student_name']);
    $where .= " AND s.student_name LIKE '$student_name%'";
}

// if (!empty($_GET['student_name'])) {
//     $student_name = mysqli_real_escape_string($conn, $_GET['student_name']);
//     $where .= " AND s.student_name LIKE '$student_name%'";
// }


if (!empty($_GET['course_id'])) {
    $course_id = (int)$_GET['course_id'];
    $where .= " AND s.course_id = $course_id";
}

/* ========= COURSE LIST ========= */
$courses = mysqli_query($conn, "SELECT id, course FROM courses ORDER BY course");
?>

<div class="main-content">
    <div class="container mt-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3><i class="bi bi-cash-coin"></i> Fees / Students</h3>
            <a href="fees_add.php" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Add Payment
            </a>
        </div>

        <!-- ========= FILTER FORM ========= -->
        <form method="get" class="row g-3 mb-4">
            <div class="col-md-4">
                <input type="text" name="student_name" class="form-control" placeholder="Search Student Name"
                    value="<?= htmlspecialchars($student_name) ?>">
            </div>

            <div class="col-md-4">
                <select name="course_id" class="form-control">
                    <option value="">-- Select Course --</option>
                    <?php while ($c = mysqli_fetch_assoc($courses)) { ?>
                    <option value="<?= $c['id'] ?>" <?= ($course_id == $c['id']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($c['course']) ?>
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
                <a href="fees_list.php" class="btn btn-secondary w-100">
                    Reset
                </a>
            </div>
        </form>

        <!-- ========= TABLE ========= -->
        <div class="card shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>#</th>
                            <th>Student</th>
                            <th>Course</th>
                            <th>Total Fee (₹)</th>
                            <th>Paid (₹)</th>
                            <th>Remaining (₹)</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody class="text-center">
                        <?php
            $i = 1;

            $q = mysqli_query($conn,"
              SELECT 
                  s.id AS student_id,
                  s.student_name,
                  c.course,
                  c.fees AS course_fee
              FROM students s
              LEFT JOIN courses c ON s.course_id = c.id
              WHERE $where
              ORDER BY s.id DESC
            ");

            if ($q && mysqli_num_rows($q) > 0) {
              while ($row = mysqli_fetch_assoc($q)) {
                $student_id = $row['student_id'];
                $total_fee = (float)$row['course_fee'];

                // Sum paid fees
                $sumQ = mysqli_query(
                  $conn,
                  "SELECT SUM(paid_amount) AS total_paid FROM student_fees WHERE student_id = $student_id"
                );
                $sumR = mysqli_fetch_assoc($sumQ);
                $paid = (float)($sumR['total_paid'] ?? 0);

                $remaining = $total_fee - $paid;

                echo "<tr>
                        <td>{$i}</td>
                        <td>".htmlspecialchars($row['student_name'])."</td>
                        <td>".htmlspecialchars($row['course'])."</td>
                        <td>₹".number_format($total_fee,2)."</td>
                        <td class='text-success'>₹".number_format($paid,2)."</td>
                        <td class='".($remaining>0?'text-danger':'text-success')."'>
                            ₹".number_format($remaining,2)."
                        </td>
                        <td>
                          <a href='fees_view.php?student_id={$student_id}' 
                             class='btn btn-sm btn-info'>
                             <i class='bi bi-eye'></i>
                          </a>
                          <a href='fees_remaining.php?student_id={$student_id}' 
                             class='btn btn-sm btn-primary'>
                             Remaining
                          </a>
                        </td>
                      </tr>";
                $i++;
              }
            } else {
              echo "<tr><td colspan='7'>No students found</td></tr>";
            }
            ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>