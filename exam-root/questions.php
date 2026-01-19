<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'exam_user') {
    header("Location: ../login.php");
    exit;
}


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once "../connection.php";

if (!isset($_SESSION['student_name'])) {
    header("Location: registration_student.php");
    exit;
}

$n = base64_decode($_GET['n']);
$number = (int)$n;
$n--;

$subject = $_GET['sub'];
$current_question = (int)$_GET['Q'];

/* Question */
$q = mysqli_query($conn,"
    SELECT * FROM questions 
    WHERE sub='$subject'
    ORDER BY id ASC
    LIMIT $n,1
");
$question = mysqli_fetch_assoc($q);

/* Options */
$options = mysqli_query($conn,"
    SELECT * FROM options 
    WHERE question_number='$current_question' 
    AND sub='$subject'
");

/* Total questions */
$total_questions = mysqli_num_rows(
    mysqli_query($conn,"SELECT id FROM questions WHERE sub='$subject'")
);
include 'header.php';
?>

<style>
body {
    background: linear-gradient(135deg, #eef2ff, #f8f9fa);
    min-height: 100vh;
}

.option-card {
    border: 2px solid #dee2e6;
    border-radius: 12px;
    padding: 14px 16px;
    margin-bottom: 12px;
    cursor: pointer;
    transition: .2s;
}

.option-card:hover {
    background: #f1f5ff;
}

input[type=radio]:checked+.option-card {
    background: #0d6efd;
    color: #fff;
    border-color: #0d6efd;
}
</style>

<div class="main-content">
    <div class="container py-4">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h5 class="fw-bold mb-0"><?= htmlspecialchars($_SESSION['student_name']) ?></h5>
                <small class="text-muted"><?= htmlspecialchars($subject) ?> Exam</small>
            </div>
            <span class="badge bg-primary px-3 py-2">
                Question <?= $number ?>/<?= $total_questions ?>
            </span>
        </div>

        <!-- Progress -->
        <div class="progress mb-4" style="height:10px">
            <div class="progress-bar bg-success" style="width: <?= ($number/$total_questions)*100 ?>%">
            </div>
        </div>

        <!-- Question Card -->
        <div class="card shadow-sm border-0">
            <div class="card-body">

                <h5 class="fw-bold mb-4">
                    <?= $number ?>. <?= htmlspecialchars($question['question_text']) ?>
                </h5>
                <form action="process.php" method="POST">

                    <?php while($o=mysqli_fetch_assoc($options)){ ?>
                    <input type="radio" name="choice" id="opt<?= $o['id'] ?>" value="<?= $o['id'] ?>" hidden required>

                    <label for="opt<?= $o['id'] ?>" class="option-card w-100">
                        <?= htmlspecialchars($o['options']) ?>
                    </label>
                    <?php } ?>

                    <!-- Hidden Inputs -->
                    <input type="hidden" name="number" value="<?= $number ?>">
                    <input type="hidden" name="question" value="<?= $current_question ?>">
                    <input type="hidden" name="subject" value="<?= $subject ?>">
                    <input type="hidden" name="student_name" value="<?= $_SESSION['student_name'] ?>">
                    <!-- <?php print_r($current_question); ?> -->

                    <div class="d-grid mt-4">
                        <button class="btn btn-success btn-lg">
                            <?= ($number == $total_questions) ? 'Finish Exam' : 'Next Question' ?>
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>