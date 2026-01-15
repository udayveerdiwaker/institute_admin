<?php
include 'header.php';

$students = mysqli_query($conn,"SELECT * FROM registered_user ORDER BY id DESC");
?>

<div class="main-content">
    <div class="container mt-4">
        <h4>All Registered Students</h4>

        <table class="table table-bordered table-striped">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Exam</th>
                <th>Action</th>
            </tr>

            <?php $i=1; while($s=mysqli_fetch_assoc($students)){ ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $s['name'] ?></td>
                <td><?= $s['email'] ?></td>
                <td><?= $s['contact'] ?></td>
                <td>
                    <?php
                    $exam = mysqli_query($conn,"SELECT * FROM exams WHERE id={$s['exam_id']}");
                    $e = mysqli_fetch_assoc($exam);
                    echo $e['exam_name'];
                    ?>
                </td>
                <td>
                    <?php $n = base64_encode($s['id']); ?>
                    <a href="start_exam.php" class="btn btn-primary btn-sm">
                        Start Exam
                    </a>
                </td>

            </tr>
            <?php } ?>
        </table>
    </div>