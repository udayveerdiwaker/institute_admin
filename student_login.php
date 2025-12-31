<?php
session_start();
include 'connection.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $q = mysqli_query($conn,"
        SELECT * FROM students 
        WHERE email='$email' AND phone='$phone'
    ");

    if(mysqli_num_rows($q)==1){
        $row = mysqli_fetch_assoc($q);
        $_SESSION['student_id'] = $row['id'];
        header("Location: student_dashboard.php");
    } else {
        echo "Invalid Login";
    }
}
include 'sidebar.php';
?>
<div class="main-content">
    <div class="container mt-4">
        <h2>Student Login</h2>
        <form method="post">
            <input name="email" placeholder="Email">
            <input name="phone" placeholder="Phone">
            <button name="login">Login</button>
        </form>
    </div>
</div>