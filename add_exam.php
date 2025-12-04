<?php

include( 'sidebar.php' );
include( 'exam_sql.php' );

if ( isset( $_POST[ 'submit' ] ) ) {
    addExam( $conn, $_POST );
}
?>

<div class='main-content mt-4'>
    <h2>Add New Exam</h2>

    <form method='POST'>
        <div class='mb-3'>
            <label>Exam Name</label>
            <input type='text' name='exam_name' class='form-control' required>
        </div>

        <div class='mb-3'>
            <label>Date</label>
            <input type='date' name='exam_date' class='form-control' required>
        </div>

        <div class='mb-3'>
            <label>Time</label>
            <input type='time' name='exam_time' class='form-control' required>
        </div>

        <div class='mb-3'>
            <label>Total Marks</label>
            <input type='number' name='total_marks' class='form-control' required>
        </div>

        <div class='mb-3'>
            <label>Pass Marks</label>
            <input type='number' name='pass_marks' class='form-control' required>
        </div>

        <div class='mb-3'>
            <label>Description</label>
            <textarea name='exam_description' class='form-control'></textarea>
        </div>

        <button name='submit' class='btn btn-primary'>Save Exam</button>
    </form>
</div>

<?php include( 'footer.php' );
?>