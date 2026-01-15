<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $name = $_POST['student_name'];
    $phone = $_POST['phone'];
    $exam_id = $_POST['exam_id'];

    mysqli_query($conn,"INSERT INTO students (student_name, phone, exam_id)
                        VALUES ('$name','$phone','$exam_id')");
    header("Location: students_list.php");
}
?>

<form method="post" class="container mt-4">
    <h4>Register Student</h4>

    <input type="text" name="student_name" class="form-control mb-3" placeholder="Student Name" required>
    <input type="text" name="phone" class="form-control mb-3" placeholder="Phone" required>

    <select name="exam_id" class="form-control mb-3" required>
        <option value="">Select Exam</option>
        <?php
        $exams = mysqli_query($conn,"SELECT * FROM exams");
        while($e=mysqli_fetch_assoc($exams)){
            echo "<option value='{$e['id']}'>{$e['exam_name']}</option>";
        }
        ?>
    </select>

    <button name="submit" class="btn btn-primary">Register Student</button>
</form>