<?php
session_start();
include 'connection.php';

$student_id = $_SESSION['student_id'];

$res = mysqli_query($conn,"
    SELECT r.*, c.course
    FROM exam_results r
    JOIN courses c ON r.course_id = c.id
    WHERE r.student_id='$student_id'
");
?>
<div class="main-content">
    <div class="container mt-4">
        <h3>My Results</h3>

        <table border="1">
            <tr>
                <th>Course</th>
                <th>Total</th>
                <th>Correct</th>
                <th>Wrong</th>
                <th>Score</th>
            </tr>

            <?php while($r=mysqli_fetch_assoc($res)){ ?>
            <tr>
                <td><?= $r['course']; ?></td>
                <td><?= $r['total']; ?></td>
                <td><?= $r['correct']; ?></td>
                <td><?= $r['wrong']; ?></td>
                <td><?= $r['score']; ?></td>
            </tr>
            <?php } ?>
        </table>

    </div>
</div>