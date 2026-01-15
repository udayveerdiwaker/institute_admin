<?php
include '../connection.php';

$found = false;
$student_name = "";
$student_phone = "";

if (isset($_GET['phone'])) {
    $phone = mysqli_real_escape_string($conn, $_GET['phone']);

    $res = mysqli_query($conn,"SELECT * FROM students WHERE phone='$phone'");

    if (mysqli_num_rows($res) == 1) {
        $row = mysqli_fetch_assoc($res);
        $student_name = $row['student_name'];
        $student_phone = $row['phone'];
        $found = true;
    }
}
session_start();



$error = "";

if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $contact = trim($_POST['contact']);
    $exam_id = $_POST['exam_id'];

    if ($name == "" || strlen($name) < 3) {
        $error = "Enter a valid student name";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Enter a valid email address";
    }
    elseif (!preg_match("/^[0-9]{10}$/", $contact)) {
        $error = "Enter a valid 10-digit contact number";
    }
    elseif ($exam_id == "") {
        $error = "Please select an exam";
    }
    else {

        $name = mysqli_real_escape_string($conn, $name);
        $contact = mysqli_real_escape_string($conn, $contact);
        $email = mysqli_real_escape_string($conn, $email);
        mysqli_query($conn,"
            INSERT INTO registered_user (name, contact, email, exam_id)
            VALUES ('$name','$contact','$email','$exam_id')
        ");

        $_SESSION['student_name'] = $name;
        $_SESSION['student_exam'] = $exam_id;


        header("Location: start_exam.php");
        exit;
    }
}
include 'header.php';

?>

<div class="main-comtent">
    <div class="container mt-4" style="max-width: 500px;">
        <h4 class="mb-4">Student Registration</h4>
        <form method="POST" class="container mt-4">

            <?php if($error!=""){ ?>
            <div class="alert alert-danger"><?= $error ?></div>
            <?php } ?>

            <div class="input-group mb-3">
                <span class="input-group-text">Student Name</span>
                <input type="text" name="name" class="form-control" value="<?= $student_name ?>" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Student Name</span>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Contact No</span>
                <input type="text" name="contact" class="form-control" value="<?= $student_phone ?>" required>
            </div>


            <div class="input-group mb-3">
                <span class="input-group-text">Select Exam</span>
                <select name="exam_id" class="form-control" required>
                    <option value="">Select Exam</option>
                    <?php
        $exams = mysqli_query($conn,"SELECT * FROM exams");
        while($e=mysqli_fetch_assoc($exams)){
            echo "<option value='{$e['id']}'>{$e['exam_name']}</option>";
        }
        ?>
                </select>
            </div>

            <button name="submit" class="btn btn-primary w-100">
                Register & Start Exam
            </button>

        </form>