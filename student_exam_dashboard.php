<?php
session_start();
include 'connection.php';

/* -------------------------
   STUDENT LOGIN CHECK
--------------------------*/
if (!isset($_SESSION['student_id'])) {
    header("Location: student_login.php");
    exit;
}

$student_id = $_SESSION['student_id'];

/* -------------------------
   FETCH STUDENT + COURSE
--------------------------*/
$student = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT * FROM students WHERE id='$student_id'")
);

$course = mysqli_fetch_assoc(
    mysqli_query($conn,"
        SELECT * FROM courses WHERE id='{$student['course_id']}'
    ")
);
include 'sidebar.php';
?>


<body class="bg-light">
    <div class="main-content">

        <div class="container my-4">

            <!-- HEADER -->
            <div class="card shadow mb-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="mb-0">Welcome, <?= $student['student_name']; ?></h4>
                        <small class="text-muted">
                            Course / Exam: <b><?= $course['course']; ?></b>
                        </small>
                    </div>
                    <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
                </div>
            </div>

            <!-- ACTION BUTTONS -->
            <div class="row g-3 mb-4">

                <div class="col-md-3">
                    <a href="start_exam.php?course_id=<?= $course['id']; ?>" class="btn btn-success w-100 py-3">
                        📝 Start Exam
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="../admin/add_question.php" class="btn btn-primary w-100 py-3">
                        ➕ Add Questions
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="my_result.php" class="btn btn-warning w-100 py-3">
                        📊 View Result
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="../admin/show_students.php" class="btn btn-dark w-100 py-3">
                        👨‍🎓 All Students
                    </a>
                </div>

            </div>

            <!-- STUDENT TABLE -->
            <div class="card shadow">
                <div class="card-header bg-secondary text-white">
                    <h6 class="mb-0">All Students (Course Wise)</h6>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Student Name</th>
                                <th>Course</th>
                                <th>Phone</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                $i = 1;
                $sql = "
                    SELECT s.student_name, s.phone, s.email, c.course
                    FROM students s
                    JOIN courses c ON s.course_id = c.id
                    ORDER BY s.id DESC
                ";
                $res = mysqli_query($conn, $sql);

                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo "
                        <tr>
                            <td>{$i}</td>
                            <td>{$row['student_name']}</td>
                            <td>
                                <span class='badge bg-info text-dark'>
                                    {$row['course']}
                                </span>
                            </td>
                            <td>{$row['phone']}</td>
                            <td>{$row['email']}</td>
                        </tr>";
                        $i++;
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>No Students Found</td></tr>";
                }
                ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>