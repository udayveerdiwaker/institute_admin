<?php
include 'session.php';
include 'sidebar.php';

// list exams
$res = mysqli_query( $conn, 'SELECT * FROM exams ORDER BY created_at DESC' );
?>
<div class='main-content'>
    <div class='d-flex justify-content-between align-items-center mb-3'>
        <h3>Manage Exams</h3>
        <a href='add_exam.php' class='btn btn-primary'>Add Exam</a>
    </div>

    <div class='card p-3'>
        <div class='table-responsive'>
            <table class='table table-striped'>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Total Marks</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ( $res && mysqli_num_rows( $res ) ): $i = 1;
while( $r = mysqli_fetch_assoc( $res ) ): ?>
                    <tr>
                        <td>
                            <?php echo $i++;
?>
                        </td>
                        <td>
                            <?php echo htmlspecialchars( $r[ 'title' ] );
?>
                        </td>
                        <td>
                            <?php echo $r[ 'total_marks' ];
?>
                        </td>
                        <td>
                            <?php echo $r[ 'duration_minutes' ];
?> mins
                        </td>
                        <td>
                            <?php echo $r[ 'status' ];
?>
                        </td>
                        <td>
                            <a href="edit_exam.php?id=<?php echo $r['id']; ?>" class='btn btn-sm btn-warning'>Edit</a>
                            <a href="manage_question.php?exam_id=<?php echo $r['id']; ?>"
                                class='btn btn-sm btn-info'>Questions</a>
                            <a href="delete_exam.php?id=<?php echo $r['id']; ?>" class='btn btn-sm btn-danger'
                                onclick="return confirm('Delete exam?')">Delete</a>
                            <a href="take_exam.php?exam_id=<?php echo $r['id']; ?>"
                                class='btn btn-sm btn-success'>Take</a>
                        </td>
                    </tr>
                    <?php endwhile;
else: ?>
                    <tr>
                        <td colspan='6' class='text-center'>No exams found</td>
                    </tr>
                    <?php endif;
?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include 'footer.php';
?>