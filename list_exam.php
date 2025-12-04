<?php
include( 'sidebar.php' );
include( 'exam_sql.php' );

$exams = listExams( $conn );
?>

<div class = 'main-content '>
<h2>All Examinations</h2>

<table class = 'table table-bordered table-striped mt-3'>
<thead class = 'table-dark'>
<tr>
<th>ID</th>
<th>Exam Name</th>
<th>Date</th>
<th>Time</th>
<th>Total Marks</th>
<th>Pass Marks</th>
<th>Action</th>
</tr>
</thead>

<tbody>
<?php foreach ( $exams as $exam ): ?>
<tr>
<td>
<?php echo $exam[ 'id' ];
?>
</td>
<td>
<?php echo $exam[ 'exam_name' ];
?>
</td>
<td>
<?php echo $exam[ 'exam_date' ];
?>
</td>
<td>
<?php echo $exam[ 'exam_time' ];
?>
</td>
<td>
<?php echo $exam[ 'total_marks' ];
?>
</td>
<td>
<?php echo $exam[ 'pass_marks' ];
?>
</td>
<td>
<a href = "edit_exam.php?id=<?= $exam['id']; ?>" class = 'btn btn-warning btn-sm'>Edit</a>
<a href = "delete_exam.php?id=<?= $exam['id']; ?>" class = 'btn btn-danger btn-sm'>Delete</a>
</td>
</tr>
<?php endforeach;
?>
</tbody>

</table>
</div>

<?php include( 'footer.php' );
?>