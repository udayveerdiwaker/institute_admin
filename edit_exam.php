<?php

include( 'sidebar.php' );
include( 'exam_sql.php' );

$id = $_GET[ 'id' ];
$exam = getExam( $conn, $id );

if ( isset( $_POST[ 'update' ] ) ) {
    updateExam( $conn, $_POST, $id );
}
?>

<div class='main-content mt-4'>
    <h2>Edit Exam</h2>

    <form method='POST'>
        <input type='hidden' name='id' value="<?= $exam['id']; ?>">

        <div class='mb-3'>
            <label>Exam Name</label>
            <input type='text' name='exam_name' class='form-control' value="<?php echo $exam['exam_name']; ?>" required>
        </div>

        <div class='mb-3'>
            <label>Date</label>
            <input type='date' name='exam_date' class='form-control' value="<?php echo $exam['exam_date']; ?>" required>
        </div>

        <div class='mb-3'>
            <label>Time</label>
            <input type='time' name='exam_time' class='form-control' value="<?php echo $exam['exam_time']; ?>" required>
        </div>

        <div class='mb-3'>
            <label>Total Marks</label>
            <input type='number' name='total_marks' class='form-control' value="<?php echo $exam['total_marks']; ?>"
                required>
        </div>

        <div class='mb-3'>
            <label>Pass Marks</label>
            <input type='number' name='pass_marks' class='form-control' value="<?php echo $exam['pass_marks']; ?>"
                required>
        </div>

        <div class='mb-3'>
            <label>Description</label>
            <textarea name='exam_description' class='form-control'><?php echo $exam[ 'exam_description' ];
?></textarea>
        </div>

        <button name='update' class='btn btn-warning'>Update Exam</button>
    </form>
</div>

<?php include( 'footer.php' );
?>