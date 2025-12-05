<?php
// submit_exam.php
include 'connection.php';

// ========== SAFETY CHECK ==========
if (!isset($_POST['attempt_id']) || !isset($_POST['exam_id'])) {
    die("Invalid request. attempt_id or exam_id missing");
}

$attempt_id = (int) $_POST['attempt_id'];
$exam_id = (int) $_POST['exam_id'];

// Fetch questions of this exam
$qs = mysqli_query($conn, "SELECT * FROM questions WHERE exam_id = $exam_id");

if (!$qs) {
    die("SQL Error in question loading: " . mysqli_error($conn));
}

$total_score = 0;

while ($q = mysqli_fetch_assoc($qs)) {

    $qid = (int) $q['id'];
    $marks_for_q = (float) $q['marks'];

    $obtained = 0;
    $answer_text = null;
    $selected_option_id = null;

    // --------------------------
    // TEXT TYPE QUESTION
    // --------------------------
    if ($q['q_type'] === 'text') {

        $answer_text = $_POST['answer_text'][$qid] ?? '';
        $answer_text = mysqli_real_escape_string($conn, $answer_text);

        // No auto marking for text questions
        $obtained = 0;
    }

    // --------------------------
    // MCQ SINGLE OPTION
    // --------------------------
    elseif ($q['q_type'] === 'mcq') {

        $selected_option_id = (int) ($_POST['answer_option'][$qid] ?? 0);

        if ($selected_option_id > 0) {
            $optQ = mysqli_query($conn, "SELECT is_correct FROM options WHERE id = $selected_option_id LIMIT 1");
            $opt = mysqli_fetch_assoc($optQ);

            if ($opt && $opt['is_correct'] == 1) {
                $obtained = $marks_for_q;
            }
        }
    }

    // --------------------------
    // MCQ MULTIPLE OPTION
    // --------------------------
    elseif ($q['q_type'] === 'mcq_multiple') {

        $selected = $_POST['answer_option_multi'][$qid] ?? [];

        if (!is_array($selected)) {
            $selected = [$selected];
        }

        // Get correct option IDs
        $correct_opts = [];
        $optQ = mysqli_query($conn, "SELECT id FROM options WHERE question_id = $qid AND is_correct = 1");
        while ($o = mysqli_fetch_assoc($optQ)) {
            $correct_opts[] = (int) $o['id'];
        }

        sort($correct_opts);

        // Convert user selected to int
        $selected_ids = array_map('intval', $selected);
        sort($selected_ids);

        // Full correct match = full marks
        if ($selected_ids == $correct_opts) {
            $obtained = $marks_for_q;
        } else {
            $obtained = 0; // no partial scoring
        }
    }

    // Save answer in DB
    $answer_text_db = $answer_text ? "'" . mysqli_real_escape_string($conn, $answer_text) . "'" : "NULL";
    $sel_opt_db = $selected_option_id ? $selected_option_id : "NULL";

    $sqlInsertAns = "
        INSERT INTO answers (attempt_id, question_id, answer_text, selected_option_id, marks_obtained)
        VALUES ($attempt_id, $qid, $answer_text_db, $sel_opt_db, $obtained)
    ";

    mysqli_query($conn, $sqlInsertAns);
    $total_score += $obtained;
}

// --------------------------
// UPDATE ATTEMPT FINAL SCORE
// --------------------------
$finished = date('Y-m-d H:i:s');

$sqlUpdate = "
    UPDATE exam_attempts 
    SET total_score = $total_score, 
        status = 'completed', 
        finished_at = '$finished'
    WHERE id = $attempt_id
";

mysqli_query($conn, $sqlUpdate);

// --------------------------
// REDIRECT TO RESULT PAGE
// --------------------------
header("Location: view_result.php?attempt_id=$attempt_id");
exit;

?>