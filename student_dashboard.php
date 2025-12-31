<?php
session_start();
include 'connection.php';

if (!isset($_SESSION['student_id'])) {
    header("Location: student_login.php");
    exit;
}

$student_id = $_SESSION['student_id'];

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
<div class="main-content">
    <div class="container mt-4">


        <h3>Welcome <?= $student['student_name']; ?></h3>

        <div>
            <h4>Course / Exam: <?= $course['course']; ?></h4>
            <p>Duration: <?= $course['duration']; ?></p>

            <a href="start_exam.php?course_id=<?= $course['id']; ?>">
                <button>Start Exam</button>
            </a>

            <a href="my_result.php">
                <button>View Result</button>
            </a>
        </div>
    </div>