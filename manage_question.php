<?php
include 'connection.php';
include 'session.php';
include 'sidebar.php';

$exam_id = ( int )$_GET[ 'exam_id' ];
$exam = mysqli_fetch_assoc( mysqli_query( $conn, "SELECT * FROM exams WHERE id=$exam_id" ) );
$res = mysqli_query( $conn, "SELECT q.*, (SELECT COUNT(*) FROM options o WHERE o.question_id=q.id) AS opt_count FROM questions q WHERE exam_id=$exam_id" );
?>
<div class='main-content mt-4'>
    <div class='d-flex justify-content-between'>
        <h3>Questions: <?php echo  htmlspecialchars( $exam[ 'title' ] ) ?>
        </h3>
        <div>
            <a href='list_exam.php' class='btn btn-secondary'>Back</a>
            <a href="add_question.php?exam_id=<?= $exam_id ?>" class='btn btn-primary'>Add Question</a>
        </div>
    </div>

    <div class='card p-3 mt-3'>
        <table class='table table-sm'>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>Type</th>
                    <th>Marks</th>
                    <th>Options</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ( $res && mysqli_num_rows( $res ) ): $i = 1;
while( $q = mysqli_fetch_assoc( $res ) ): ?>
                <tr>
                    <td>
                        <?php echo $i++ ?>
                    </td>
                    <td>
                        <?php echo htmlspecialchars( $q[ 'question_text' ] ) ?>
                    </td>
                    <td>
                        <?php echo $q[ 'q_type' ] ?>
                    </td>
                    <td>
                        <?php echo $q[ 'marks' ] ?>
                    </td>
                    <td>
                        <?php echo $q[ 'opt_count' ] ?>
                    </td>
                    <td>
                        <a href="edit_question.php?id=<?= $q['id'] ?>&exam_id=<?= $exam_id ?>"
                            class='btn btn-sm btn-warning'>Edit</a>
                        <a href="delete_question.php?id=<?= $q['id']; ?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('Delete this question?');">
                            Delete
                        </a>

                        <!-- <a href="delete_question.php?id=<?= $q['id'] ?>&exam_id=<?= $exam_id ?>"
                            class='btn btn-sm btn-danger' onclick="return confirm('Delete?')">Delete</a> -->
                    </td>
                </tr>
                <?php endwhile;
else: ?>
                <tr>
                    <td colspan='6'>No questions</td>
                </tr>
                <?php endif;
?>
            </tbody>
        </table>
    </div>
</div>
<?php include 'footer.php';
?>