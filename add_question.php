<?php
include 'connection.php';
include 'session.php';

$exam_id = ( int )$_GET[ 'exam_id' ];
$msg = '';
if ( isset( $_POST[ 'submit' ] ) ) {
    $question = mysqli_real_escape_string( $conn, $_POST[ 'question_text' ] );
    $qtype = $_POST[ 'q_type' ];
    $marks = ( int )$_POST[ 'marks' ];

    $ins = "INSERT INTO questions (exam_id,question_text,q_type,marks) VALUES ($exam_id,'$question','$qtype',$marks)";
    if ( mysqli_query( $conn, $ins ) ) {
        $qid = mysqli_insert_id( $conn );
        // if MCQ, insert options
        if ( $qtype === 'mcq' || $qtype === 'mcq_multiple' ) {
            // options[] and correct[] arrays
            if ( isset( $_POST[ 'options' ] ) && is_array( $_POST[ 'options' ] ) ) {
                foreach ( $_POST[ 'options' ] as $idx => $opt ) {
                    $opt_text = mysqli_real_escape_string( $conn, $opt );
                    $is_correct = ( isset( $_POST[ 'correct' ] ) && in_array( $idx, $_POST[ 'correct' ] ) ) ? 1 : 0;
                    $oins = "INSERT INTO options (question_id,option_text,is_correct) VALUES ($qid,'$opt_text',$is_correct)";
                    mysqli_query( $conn, $oins );
                }
            }
        }
        header( "Location: manage_question.php?exam_id=$exam_id" );
        exit;
    } else $msg = mysqli_error( $conn );
}
include 'sidebar.php';

?>

<div class='main-content mt-4'>
    <h3>Add Question</h3>
    <?php if ( $msg ) echo "<div class='alert alert-danger'>$msg</div>";
?>
    <form method='post'>
        <div class='mb-3'><label>Question</label><textarea name='question_text' class='form-control'
                required></textarea></div>
        <div class='row'>
            <div class='col'><label>Type</label>
                <select name='q_type' class='form-control'>
                    <option value='mcq'>Single Choice ( MCQ )</option>
                    <option value='mcq_multiple'>Multiple Choice</option>
                    <option value='text'>Text Answer</option>
                </select>
            </div>
            <div class='col'><label>Marks</label><input name='marks' type='number' class='form-control' value='1'></div>
        </div>

        <!-- options block ( admin can add 4 options ) -->
        <div class='mt-3'>
            <label>Options ( for MCQ )</label>
            <?php for ( $i = 0; $i<4; $i++ ): ?>
            <div class='input-group mb-2'>
                <span class='input-group-text'><input type='checkbox' name='correct[]' value="<?=$i?>"></span>
                <input type='text' name='options[]' class='form-control' placeholder="Option <?=$i+1?>">
            </div>
            <?php endfor;
?>
        </div>

        <div class='mt-3'><button class='btn btn-primary' name='submit'>Save Question</button></div>
    </form>
</div>
<?php include 'footer.php';
?>