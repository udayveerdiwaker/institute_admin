<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'exam_user') {
    header("Location: ../login.php");
    exit;
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$student = $_SESSION['student_name'];
$score   = $_SESSION['score'];

/* Save score only once */
if (isset($_POST['save'])) {

    $check = mysqli_query($conn,"
        SELECT id FROM result 
        WHERE student_name='$student'
        LIMIT 1
    ");

    if (mysqli_num_rows($check) == 0) {
        mysqli_query($conn,"
            INSERT INTO result (student_name, student_marks)
            VALUES ('$student','$score')
        ");
    }
     header("Location: results.php");
    exit;
}
// if ($number >= $total_q) {

//     mysqli_query($conn,"
//         INSERT INTO result (student_name, student_marks)
//         VALUES ('$student','{$_SESSION['score']}')
//     ");

   

// }

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
        border-radius: 20px;
    }

    .score {
        font-size: 4rem;
        font-weight: 800;
        color: #0d6efd;
    }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <div class="card shadow-lg result-card p-4 text-center col-lg-6 col-md-8 col-11">

            <h2 class="fw-bold text-success">🎉 Exam Completed!</h2>

            <p class="mt-3 fs-5">
                Congratulations <strong><?= htmlspecialchars($student) ?></strong>
            </p>

            <div class="score my-3">
                <?= $score ?>
            </div>

            <p class="text-muted">Your Final Score</p>

            <form method="POST" class="d-grid gap-2">
                <button name="save" class="btn btn-primary btn-lg">
                    Save Result
                </button>
            </form>

            <a href="logout.php" class="btn btn-outline-danger btn-lg mt-3">
                Logout
            </a>

            <hr>

            <small class="text-muted">
                © <?= date("Y") ?> Computer Sikhe & Website Banaye
            </small>

        </div>

    </div>

    <script>
    /* Confetti */
    var duration = 8 * 1000;
    var end = Date.now() + duration;

    (function frame() {
        confetti({
            particleCount: 4,
            angle: 60,
            spread: 55,
            origin: {
                x: 0
            }
        });
        confetti({
            particleCount: 4,
            angle: 120,
            spread: 55,
            origin: {
                x: 1
            }
        });

        if (Date.now() < end) {
            requestAnimationFrame(frame);
        }
    })();
    </script>

</body>

</html>