<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'exam_user') {
    header("Location: login.php");
    exit;
}


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'header.php';

$students = mysqli_query($conn,"SELECT * FROM registered_user ORDER BY id DESC");
/* Search */
$search = $_GET['search'] ?? '';

$res = mysqli_query($conn,"
    SELECT * FROM registered_user 
    WHERE name LIKE '$search%'
    ORDER BY id DESC
");
?>

<div class="main-content">

    <div class="container mt-4">

        <div class="d-flex justify-content-between align-items-center">
            <h4>All Registered Students</h4>
            <a href="dashboard.php" class="btn btn-secondary btn-sm">Back</a>
        </div>

        <div class="card-box mt-4 text-center">
            <h3 class="fw-bold">Website Banaye & Computer Sikhe</h3>
            <p class="text-muted">You can attempt only one exam. Best of luck!</p>
            <?php $n = base64_encode("1"); ?>
            <!-- <a href="all_students.php" class="btn btn-dark mt-3">View All Students</a> -->
            <form class="d-flex" method="GET">
                <input type="text" name="search" class="form-control me-2" placeholder="Search student"
                    value="<?= htmlspecialchars($search) ?>">
                <button class="btn btn-primary">Search</button>
            </form>
        </div>
        <div class="table-responsive mt-3">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Exam</th>
                            <th>Action</th>
                        </tr>

                        <?php $i=1; while($s=mysqli_fetch_assoc($students)){ ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $s['name'] ?></td>
                            <td><?= $s['email'] ?></td>
                            <td><?= $s['phone'] ?></td>
                            <td>
                                <?php
                    $exam = mysqli_query($conn,"SELECT * FROM exams WHERE id={$s['exam_id']}");
                    $e = mysqli_fetch_assoc($exam);
                    echo $e['exam_name'];
                    ?>
                            </td>
                            <td>
                                <?php $n = base64_encode($s['id']); ?>
                                <a href="start_exam.php?sid=<?= $s['id'] ?>" class="btn btn-primary btn-sm">
                                    Start Exam
                                </a>

                            </td>

                        </tr>
                        <?php } ?>
                    </table>
        </div>