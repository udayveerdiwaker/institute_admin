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
$search = $_GET['search'] ?? '';

$res = mysqli_query($conn,"
    SELECT * FROM result 
    WHERE student_name LIKE '$search%'
    ORDER BY id DESC
");
?>

<div class="main-content">
    <div class="container mt-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Exam Results</h4>

            <form class="d-flex" method="GET">
                <input type="text" name="search" class="form-control me-2" placeholder="Search student"
                    value="<?= htmlspecialchars($search) ?>">
                <button class="btn btn-primary">Search</button>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Student Name</th>
                        <th>Marks</th>
                        <th>Status</th>
                        <th width="280">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i=1; while($r=mysqli_fetch_assoc($res)){ 
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
                            <a href="view_result.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-info">View</a>
                            <a href="print_result.php?id=<?= $r['id'] ?>" target="_blank"
                                class="btn btn-sm btn-secondary">
                                Print
                            </a>


                            <!-- <a href="delete_result.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-danger"
                                onclick="return confirm('Delete this result?')">
                                Delete
                            </a> -->
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        </>