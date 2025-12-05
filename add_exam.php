<?php
include 'session.php';
include 'connection.php';

$msg = '';
if ( isset( $_POST[ 'submit' ] ) ) {
    $title = mysqli_real_escape_string( $conn, $_POST[ 'title' ] );
    $desc = mysqli_real_escape_string( $conn, $_POST[ 'description' ] );
    $total_marks = ( int )$_POST[ 'total_marks' ];
    $passing = ( int )$_POST[ 'passing_marks' ];
    $duration = ( int )$_POST[ 'duration_minutes' ];
    $status = $_POST[ 'status' ] == 'active'?'active':'inactive';

    $ins = "INSERT INTO exams (title,description,total_marks,passing_marks,duration_minutes,status) VALUES ('$title','$desc',$total_marks,$passing,$duration,'$status')";
    if ( mysqli_query( $conn, $ins ) ) {
        header( 'Location: manage_exam.php' );
        exit;
    } else $msg = 'Error: '.mysqli_error( $conn );
}
include 'sidebar.php';

?>
<div class='main-content '>
    <h3>Add Exam</h3>
    <?php if ( $msg ) echo "<div class='alert alert-danger'>$msg</div>";
?>
    <div class='card p-3'>
        <form method='post'>
            <div class='mb-3'><label>Title</label><input name='title' class='form-control' required></div>
            <div class='mb-3'><label>Description</label><textarea name='description' class='form-control'></textarea>
            </div>
            <div class='row'>
                <div class='col'><label>Total Marks</label><input name='total_marks' type='number' class='form-control'
                        value='100'></div>
                <div class='col'><label>Passing Marks</label><input name='passing_marks' type='number'
                        class='form-control' value='33'></div>
                <div class='col'><label>Duration ( mins )</label><input name='duration_minutes' type='number'
                        class='form-control' value='30'></div>
                <div class='col'><label>Status</label><select name='status' class='form-control'>
                        <option value='active'>Active</option>
                        <option value='inactive'>Inactive</option>
                    </select></div>
            </div>
            <div class='mt-3'><button class='btn btn-primary' name='submit'>Create Exam</button></div>
        </form>
    </div>
</div>
<?php include 'footer.php';
?>