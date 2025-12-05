<?php
include 'connection.php';
// ---------------------------
// Check question ID
// ---------------------------
if (!isset($_GET['id'])) {
    die("Error: Question ID missing.");
}

$question_id = $_GET['id'];

// ---------------------------
// Fetch existing question
// ---------------------------
$sql = "SELECT * FROM questions WHERE id = $question_id";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Error: Question not found.");
}

$row = mysqli_fetch_assoc($result);
print_r($row);
// exit;

// ---------------------------
// Update Question
// ---------------------------
if (isset($_POST['update'])) {

    $question = mysqli_real_escape_string($conn, $_POST['question_text']);
    $option_a = mysqli_real_escape_string($conn, $_POST['option_a']);
    $option_b = mysqli_real_escape_string($conn, $_POST['option_b']);
    $option_c = mysqli_real_escape_string($conn, $_POST['option_c']);
    $option_d = mysqli_real_escape_string($conn, $_POST['option_d']);
    $correct_option = $_POST['correct_option'];
    $marks = $_POST['marks'];

    $update = "UPDATE questions SET 
                question_text='$question',
                option_a='$option_a',
                option_b='$option_b',
                option_c='$option_c',
                option_d='$option_d',
                correct_option='$correct_option',
                marks='$marks'
               WHERE id=$question_id";

    if (mysqli_query($conn, $update)) {
        echo "<script>alert('Question updated successfully'); 
        window.location='list_questions.php';</script>";
    } else {
        echo "Error updating question!";
    }
}
?>

<div class="main-content py-4">
    <?php include 'sidebar.php'; ?>
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4>Edit Question</h4>
        </div>

        <div class="card-body">

            <form method="POST">

                <div class="mb-3">
                    <label>Question</label>
                    <textarea name="question" class="form-control"
                        required><?php echo $row['question_text']; ?></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Option A</label>
                        <input type="text" name="option_a" class="form-control" value="<?php echo $row['option_a']; ?>"
                            required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Option B</label>
                        <input type="text" name="option_b" class="form-control"
                            value="<?php echo $row['option_text']; ?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Option C</label>
                        <input type="text" name="option_c" class="form-control" value="<?php echo $row['option_c']; ?>"
                            required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Option D</label>
                        <input type="text" name="option_d" class="form-control" value="<?php echo $row['option_d']; ?>"
                            required>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Correct Option</label>
                    <select name="correct_option" class="form-control" required>
                        <option value="A" <?php if($row['is_correct']=='A') echo 'selected'; ?>>A</option>
                        <option value="B" <?php if($row['is_correct']=='B') echo 'selected'; ?>>B</option>
                        <option value="C" <?php if($row['is_correct']=='C') echo 'selected'; ?>>C</option>
                        <option value="D" <?php if($row['is_correct']=='D') echo 'selected'; ?>>D</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Marks</label>
                    <input type="number" name="marks" class="form-control" value="<?php echo $row['marks']; ?>"
                        required>
                </div>

                <button type="submit" name="update" class="btn btn-success">Update Question</button>
                <a href="list_questions.php" class="btn btn-secondary">Back</a>

            </form>

        </div>
    </div>
</div>