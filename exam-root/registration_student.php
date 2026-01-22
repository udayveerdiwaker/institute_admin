<?php
include 'session.php';

$fname = "";
$phone = "";

if (isset($_GET['sid'])) {
    $sid = intval($_GET['sid']);

    $res = mysqli_query($conn,"SELECT * FROM students WHERE id='$sid'");
    if (mysqli_num_rows($res) == 1) {
        $row = mysqli_fetch_assoc($res);
        $fname = $row['student_name'];
        $phone = $row['phone'];
    }
}



$error = "";

if (isset($_POST['submit'])) {

    $name    = trim($_POST['name']);
    $email   = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $exam_id = $_POST['exam_id'];

    // Basic validation
    if ($name == "" || strlen($name) < 3) {
        $error = "Enter a valid student name";
    }
    elseif ($email == "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Enter a valid email address";
    }
    elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
        $error = "Enter a valid 10-digit phone number";
    }

    elseif ($exam_id == "") {
        $error = "Please select an exam";
    }
    else {

        $name    = mysqli_real_escape_string($conn, $name);
        $email   = mysqli_real_escape_string($conn, $email);
        $phone = mysqli_real_escape_string($conn, $phone);

        // 🔍 CHECK: Is student already registered?
        $check = mysqli_query(
            $conn,
            "SELECT id FROM registered_user WHERE name = '$name' LIMIT 1"
        );

        if (mysqli_num_rows($check) > 0) {

            // ✅ Student already exists
            $_SESSION['student_name'] = $name;

            // redirect to register_students.php (or dashboard)
            header("Location: register_students");
            exit;

        } else {

            // ✅ New student → register
            mysqli_query(
                $conn,
                "INSERT INTO registered_user (name, email, phone, exam_id)
                 VALUES ('$name','$email','$phone','$exam_id')"
            );

            $_SESSION['student_name'] = $name;
            $_SESSION['student_exam'] = $exam_id;

            header("Location: start_exam.php?sid=" . mysqli_insert_id($conn));
            exit;
        }
    }
}

include 'header.php';

?>

<div class="main-content">
    <div class="mt-4">
        <?php if ($error != "") { ?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
        <?php } ?>
        <div class="container mt-4" style="max-width: 500px;">
            <h4 class="mb-4">Student Registration</h4>
            <form method="POST" class="container mt-4">

                <div class="input-group mb-3">
                    <span class="input-group-text">Student Name</span>
                    <input type="text" class="form-control" name="name" value="<?= $fname ?>" required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Email</span>
                    <input type="email" class="form-control" name="email" value="" required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Phone No</span>
                    <input type="number" class="form-control" name="phone" value="<?= $phone ?>" required>
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