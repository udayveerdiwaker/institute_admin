<?php
include 'connection.php';
include 'sidebar.php';
// no admin session required for students

$exam_id = ( int )$_GET[ 'exam_id' ];
$exam = mysqli_fetch_assoc( mysqli_query( $conn, "SELECT * FROM exams WHERE id=$exam_id AND status='active'" ) );
if ( !$exam ) {
    echo 'Exam not available';
    exit;
}

// On first load, show a small form to collect student name/email and then show questions
if ( !isset( $_POST[ 'start' ] ) ) {
    // show start form
    ?>
<div class='main-content mt-4'>
    <h3>Start Exam: <?php echo htmlspecialchars( $exam[ 'title' ] ) ?>
    </h3>
    <form method='post'>
        <input type='hidden' name='start' value='1'>
        <div class='mb-3'><label>Name</label><input name='student_name' class='form-control' required></div>
        <div class='mb-3'><label>Email</label><input name='student_email' type='email' class='form-control'></div>
        <div class='mb-3'><label>Phone</label><input name='student_phone' class='form-control'></div>
        <button class='btn btn-primary'>Start Exam</button>
    </form>
</div>
<?php
    exit;
}

// POST start: create student and attempt then render questions form
$student_name = mysqli_real_escape_string( $conn, $_POST[ 'student_name' ] );
$student_email = mysqli_real_escape_string( $conn, $_POST[ 'student_email' ] );
$student_phone = mysqli_real_escape_string( $conn, $_POST[ 'student_phone' ] );

mysqli_query( $conn, "INSERT INTO exam_students (student_name, student_email, student_phone) VALUES ('$student_name','$student_email','$student_phone')" );
$student_id = mysqli_insert_id( $conn );

mysqli_query( $conn, "INSERT INTO exam_attempts (exam_id, student_id, status) VALUES ($exam_id,$student_id,'in_progress')" );
$attempt_id = mysqli_insert_id( $conn );

// fetch questions
$questions = mysqli_query( $conn, "SELECT * FROM questions WHERE exam_id=$exam_id" );
?>
<div class='main-content mt-4'>
    <h3><?php echo htmlspecialchars( $exam[ 'title' ] ) ?> — Questions</h3>
    <form method='post' action='submit_exam.php'>
        <input type='hidden' name='attempt_id' value="<?php echo $attempt_id ?>">
        <input type='hidden' name='exam_id' value="<?php echo $exam_id ?>">
        <?php $i = 1;
while( $q = mysqli_fetch_assoc( $questions ) ): ?>
        <div class='card p-3 mb-3'>
            <h5>Q<?php echo $i ?>. <?php echo htmlspecialchars( $q[ 'question_text' ] ) ?> <small class='text-muted'> (
                    <?php echo $q[ 'marks' ] ?> )</small></h5>
            <?php if ( $q[ 'q_type' ] == 'text' ): ?>
            <textarea name="answer_text[<?php echo $q['id'] ?>]" class='form-control'></textarea>
            <?php else:
    $opts = mysqli_query( $conn, "SELECT * FROM options WHERE question_id={$q['id']}" );
    while( $opt = mysqli_fetch_assoc( $opts ) ):
    ?>
            <div class='form-check'>
                <input class='form-check-input' type="<?php echo $q['q_type']=='mcq' ? 'radio' : 'checkbox' ?>"
                    name="
                <?php echo $q['q_type']=='mcq' ? "answer_option[ {$q[ 'id' ]}]" : "answer_option_multi[ {$q[ 'id' ]}][]"; ?>'value = " <?php echo $opt[ 'id' ] ?>' id='opt<?php echo $opt[ 'id' ] ?>">
<label class=' form-check-label'
                    for="opt<?php echo $opt[ 'id' ] ?>"><?php echo htmlspecialchars( $opt[ 'option_text' ] ) ?></label>
            </div>
            <?php endwhile;
    endif;
    ?>
        </div>
        <?php $i++;
    endwhile;
    ?>
        <button class='btn btn-success'>Submit Exam</button>
    </form>
</div>
<?php include 'footer.php';
    ?>