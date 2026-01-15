<?php
include 'header.php';

$res = mysqli_query($conn,"SELECT * FROM result ORDER BY id DESC");
?>

<div class="content">
    <h4>Exam Results</h4>

    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Student</th>
            <th>Marks</th>
        </tr>

        <?php $i=1; while($r=mysqli_fetch_assoc($res)){ ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= $r['student_name'] ?></td>
            <td><?= $r['student_marks'] ?></td>
        </tr>
        <?php } ?>
    </table>
</div>