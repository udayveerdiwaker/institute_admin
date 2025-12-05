<?php
include 'connection.php';
include 'sidebar.php';

function runQuery($conn, $sql) {
    $res = mysqli_query($conn, $sql);
    if (!$res) {
        echo "<div style='background:#fee;padding:10px;border:1px solid #f99'>
                <strong>SQL ERROR:</strong> " . mysqli_error($conn) . "<br>
                <code>$sql</code>
              </div>";
    }
    return $res;
}

// ----------------------------------
// 1) Validate attempt_id
// ----------------------------------
if (!isset($_GET['attempt_id']) || empty($_GET['attempt_id'])) {
    echo "Missing attempt_id.";
    exit;
}

$attempt_id = (int)$_GET['attempt_id'];

// ----------------------------------
// 2) Fetch attempt record
// ----------------------------------
$sqlAttempt = "
    SELECT a.*, 
           s.student_name, 
           e.title AS exam_title,
           e.total_marks AS exam_total
    FROM exam_attempts a
    LEFT JOIN students s ON a.student_id = s.id
    LEFT JOIN exams e ON a.exam_id = e.id
    WHERE a.id = $attempt_id
    LIMIT 1
";

$resAttempt = runQuery($conn, $sqlAttempt);

if (!$resAttempt || mysqli_num_rows($resAttempt) == 0) {
    echo "<h3>No attempt found (ID: $attempt_id)</h3>";
    exit;
}

$attempt = mysqli_fetch_assoc($resAttempt);

// Extract Values
$student_name    = $attempt['student_name'] ?? '';
$exam_title      = $attempt['exam_title'] ?? '';
$score           = $attempt['score'] ?? 0;
$total_marks     = $attempt['exam_total'] ?? 0;
$correct         = $attempt['correct_count'] ?? 0;
$attempted       = $attempt['total_attempted'] ?? 0;
$details_json    = $attempt['details_json'] ?? '';
$created_at      = $attempt['created_at'] ?? '';
?>


<div class="main-content py-4">

    <a href="javascript:history.back()" class="btn btn-secondary btn-sm mb-3">← Back</a>

    <div class="card mb-3">
        <div class="card-body">
            <h4 class="mb-1"><?php echo htmlspecialchars($exam_title); ?> Result</h4>
            <p class="mb-0"><strong>Student:</strong> <?php echo htmlspecialchars($student_name); ?></p>
            <p class="mb-0"><strong>Date:</strong> <?php echo htmlspecialchars($created_at); ?></p>
        </div>
    </div>

    <div class="row gy-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Score</h5>
                    <p class="fs-3 mb-1"><?php echo $score; ?> / <?php echo $total_marks; ?></p>
                    <p><strong>Attempted:</strong> <?php echo $attempted; ?></p>
                    <p><strong>Correct:</strong> <?php echo $correct; ?></p>
                </div>
            </div>
        </div>

        <!-- Question-wise details -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Detailed Answers</h5>
                    <?php
                    if (!empty($details_json)) {
                        $details = json_decode($details_json, true);
                        if (is_array($details)) {
                            echo "<div style='max-height:250px; overflow:auto'>";

                            foreach ($details as $index => $d) {
                                echo "<div class='mb-2'>
                                    <strong>Q".($index+1).":</strong> " . htmlspecialchars($d['question']) . "<br>
                                    <small>Given: " . htmlspecialchars($d['given']) .
                                    " | Correct: " . htmlspecialchars($d['correct']) . "</small>
                                </div>";
                            }

                            echo "</div>";
                        } else {
                            echo "<p>Invalid JSON format</p>";
                        }
                    } else {
                        echo "<p>No detailed data stored</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</div>