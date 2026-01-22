<?php
include 'session.php';
include 'header.php';

/* Validate result id */
if (!isset($_GET['id'])) {
    die("Result not found");
}

$id = (int)$_GET['id'];

$res = mysqli_query($conn,"SELECT * FROM result WHERE id='$id' LIMIT 1");
if (mysqli_num_rows($res) != 1) {
    die("Invalid result");
}

$r = mysqli_fetch_assoc($res);

$marks = (int)$r['student_marks'];
$passMarks = 33;
$status = ($marks >= $passMarks) ? 'PASS' : 'FAIL';
$statusClass = ($status === 'PASS') ? 'success' : 'danger';
?>

<style>
.result-card {
    border-radius: 22px;
    animation: slideUp .7s ease;
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

/* PASS pulse */
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

/* FAIL shake */
.fail-animate {
    animation: shake .6s;
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

.score {
    font-size: 3.8rem;
    font-weight: 800;
}

.progress {
    height: 22px;
}
</style>

<div class="main-content">
    <div class="container mt-4">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-bold">Student Result</h4>
            <a href="results.php" class="btn btn-outline-secondary btn-sm">
                ← Back
            </a>
        </div>

        <!-- Result Card -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-12">

                <div class="card shadow-lg border-0 result-card text-center">

                    <div class="card-body p-4">

                        <h5 class="fw-bold mb-1">
                            <?= htmlspecialchars($r['student_name']) ?>
                        </h5>

                        <span class="badge bg-<?= $statusClass ?> my-2 
                        <?= ($status=='PASS')?'pass-animate':'fail-animate' ?>">
                            <?= ($status=='PASS')?'🎉 PASS':'❌ FAIL' ?>
                        </span>

                        <div class="score text-<?= $statusClass ?> my-3">
                            <?= $marks ?>
                        </div>

                        <p class="text-muted mb-1">Marks Obtained</p>

                        <!-- Progress -->
                        <?php
                        $percent = min(100, round(($marks / 100) * 100));
                        ?>
                        <div class="progress my-3">
                            <div class="progress-bar bg-<?= $statusClass ?>"
                                style="width: <?= $percent ?>%; transition: width 1.5s ease;">
                                <?= $percent ?>%
                            </div>
                        </div>

                        <hr>

                        <div class="row text-start">
                            <div class="col-6 mb-2">
                                <small class="text-muted">Exam Type</small><br>
                                <strong>MCQ</strong>
                            </div>
                            <div class="col-6 mb-2">
                                <small class="text-muted">Passing Marks</small><br>
                                <strong><?= $passMarks ?></strong>
                            </div>
                            <div class="col-6">
                                <small class="text-muted">Exam Date</small><br>
                                <strong><?= date("d M Y", strtotime($r['created_at'] ?? date('Y-m-d'))) ?></strong>
                            </div>
                            <div class="col-6">
                                <small class="text-muted">Status</small><br>
                                <strong class="text-<?= $statusClass ?>"><?= $status ?></strong>
                            </div>
                        </div>

                    </div>

                    <!-- Footer -->
                    <div class="card-footer bg-white text-center">
                        <a href="print_result.php?id=<?= $r['id'] ?>" target="_blank"
                            class="btn btn-outline-primary me-2">
                            🖨 Print
                        </a>

                        <a href="results.php" class="btn btn-outline-dark">
                            Close
                        </a>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>