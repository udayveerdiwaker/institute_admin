<?php
session_start();
include '../connection.php';

$student_id = $_SESSION['student_id'];
$course_id  = $_GET['course_id'];

// Prevent re-exam
$chk = mysqli_query($conn,"
    SELECT * FROM exam_results 
    WHERE student_id='$student_id' AND course_id='$course_id'
");

if (mysqli_num_rows($chk) > 0) {
    die("❌ You already attempted this exam.");
}

$q = mysqli_query($conn,"
    SELECT * FROM exam_questions WHERE course_id='$course_id'
");
?>

<form method="post" action="submit_exam.php">
    <input type="hidden" name="course_id" value="<?= $course_id ?>">

    <?php $i=1; while($row=mysqli_fetch_assoc($q)){ ?>
    <p><b><?= $i++; ?>.</b> <?= $row['question']; ?></p>
    <input type="radio" name="ans[<?= $row['id']; ?>]" value="A"> <?= $row['option_a']; ?><br>
    <input type="radio" name="ans[<?= $row['id']; ?>]" value="B"> <?= $row['option_b']; ?><br>
    <input type="radio" name="ans[<?= $row['id']; ?>]" value="C"> <?= $row['option_c']; ?><br>
    <input type="radio" name="ans[<?= $row['id']; ?>]" value="D"> <?= $row['option_d']; ?><br><br>
    <?php } ?>

    <button>Submit Exam</button>
</form>