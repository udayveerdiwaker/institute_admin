<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'exam_user') {
    header("Location: ../login.php");
    exit;
}

ini_set('display_errors', 1);
error_reporting(E_ALL);

include '../connection.php';

/* REQUIRED SESSION */
if (empty($_SESSION['student_name']) || !isset($_SESSION['student_exam'])) {
    header("Location: registration_student.php");
    exit;
}

$student = $_SESSION['student_name'];

/* Fetch latest result */
$result_q = mysqli_query($conn,"
    SELECT student_marks
    FROM result
    WHERE student_name='$student'
    ORDER BY id DESC
    LIMIT 1
");

if (mysqli_num_rows($result_q) !== 1) {
    die("Result not found");
}

$score = (int) mysqli_fetch_assoc($result_q)['student_marks'];

/* CONFIG */
$total_marks = 100;
$percentage  = round(($score / $total_marks) * 100);
$status      = ($percentage >= 33) ? 'PASS' : 'FAIL';
$statusClass = ($status === 'PASS') ? 'success' : 'danger';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Result</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>

    <style>
    body {
        background: linear-gradient(135deg, #e3f2fd, #f8f9fa);
        min-height: 100vh;
    }

    .result-card {
        border-radius: 22px;
        animation: slideUp 0.8s ease;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .score {
        font-size: 4rem;
        font-weight: 800;
        color: #0d6efd;
    }

    .status-badge {
        font-size: 1.1rem;
        padding: 8px 18px;
    }

    /* PASS animation */
    .pass-animate {
        animation: pulse 1.5s infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }

        100% {
            transform: scale(1);
        }
    }

    /* FAIL animation */
    .fail-animate {
        animation: shake 0.6s ease-in-out;
    }

    @keyframes shake {
        0% {
            transform: translateX(0);
        }

        25% {
            transform: translateX(-6px);
        }

        50% {
            transform: translateX(6px);
        }

        75% {
            transform: translateX(-6px);
        }

        100% {
            transform: translateX(0);
        }
    }

    /* Score pop */
    .score-animate {
        animation: pop 0.6s ease;
    }

    @keyframes pop {
        0% {
            transform: scale(0.6);
            opacity: 0;
        }

        100% {
            transform: scale(1);
            opacity: 1;
        }
    }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg result-card p-4 text-center col-lg-6 col-md-8 col-11">

            <h2 class="fw-bold text-<?= $statusClass ?>">
                🎓 Exam Completed
            </h2>

            <p class="mt-3 fs-5">
                Well done, <strong><?= htmlspecialchars($student) ?></strong>
            </p>

            <span class="badge bg-<?= $statusClass ?> status-badge my-2 
<?= ($status === 'PASS') ? 'pass-animate' : 'fail-animate' ?>">
                <?= ($status === 'PASS') ? '🎉 PASS' : '❌ FAIL' ?>
            </span>


            <div class="score my-3 score-animate">
                <?= $score ?>
            </div>


            <p class="text-muted mb-2">
                Percentage: <strong><?= $percentage ?>%</strong>
            </p>

            <!-- Progress Bar -->
            <div class="progress mb-4" style="height: 22px;">
                <div class="progress-bar bg-<?= $statusClass ?>" role="progressbar"
                    style="width: <?= $percentage ?>%; transition: width 1.5s ease;">
                    <?= $percentage ?>%
                </div>
            </div>

            <div class="d-grid gap-2 mt-3">
                <a href="results.php" class="btn btn-primary btn-lg">
                    📄 View Result
                </a>

                <a href="dashboard.php" class="btn btn-outline-secondary">
                    ⬅ Back to Dashboard
                </a>
            </div>

            <hr>
            <small class="text-muted">
                © <?= date("Y") ?> Computer Sikhe & Website Banaye
            </small>
        </div>
    </div>

    <?php if ($status === 'PASS') { ?>
    <script>
    /* Confetti only if PASS */

    let duration = 10 * 1000;
    let end = Date.now() + duration;

    (function frame() {
        confetti({
            particleCount: 10,
            angle: 60,
            spread: 70,
            origin: {
                x: 0
            }
        });
        confetti({
            particleCount: 10,
            angle: 120,
            spread: 70,
            origin: {
                x: 1
            }
        });
        if (Date.now() < end) requestAnimationFrame(frame);
    })();
    </script>
    <?php } ?>



</body>

</html>