<div class='main-content'>
    <h3>Add Guest Entry</h3>

    <?php

    session_start();

if (!isset($_SESSION['admin_logged'])) {
    header("Location: login.php");
    exit;
}
// dashboard.php - full UI + PHP + Charts (monthly & yearly)
// Turn on errors for debugging (remove in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include 'connection.php';

if ( isset( $_POST[ 'submit' ] ) ) {
    $name = $_POST[ 'guest_name' ];
    $phone = $_POST[ 'phone' ];
    $address = $_POST[ 'address' ];
    $purpose = $_POST[ 'purpose' ];
    $date = $_POST[ 'visit_date' ];
    $time = $_POST[ 'visit_time' ];
    $comments = $_POST[ 'comments' ];
    $attended = $_POST[ 'attended_by' ];

    $insert = "INSERT INTO guests (guest_name, phone, address, purpose, visit_date, visit_time, comments, attended_by)
                   VALUES ('$name','$phone','$address','$purpose','$date','$time','$comments','$attended')";

    if ( mysqli_query( $conn, $insert ) ) {
        header( 'Location: guest_list.php' );
        exit;
    } else {
        echo "<div class='alert alert-danger'>Error Adding Guest</div>";
    }
}
include 'sidebar.php';

?>

    <form method='POST'>
        <div class='row g-3'>

            <div class='col-md-6'>
                <label>Guest Name</label>
                <input type='text' name='guest_name' class='form-control' required>
            </div>

            <div class='col-md-6'>
                <label>Phone</label>
                <input type='text' name='phone' class='form-control' required>
            </div>

            <div class='col-md-12'>
                <label>Address</label>
                <textarea name='address' class='form-control'></textarea>
            </div>

            <div class='col-md-6'>
                <label>Purpose of Visit</label>
                <input type='text' name='purpose' class='form-control' required>
            </div>

            <div class='col-md-3'>
                <label>Date</label>
                <input type='date' name='visit_date' class='form-control' required>
            </div>

            <div class='col-md-3'>
                <label>Time</label>
                <input type='time' name='visit_time' class='form-control' required>
            </div>

            <div class='col-md-12'>
                <label>Final Comments</label>
                <textarea name='comments' class='form-control'></textarea>
            </div>

            <div class='col-md-6'>
                <label>Attended By</label>
                <input type='text' name='attended_by' class='form-control' required>
            </div>

            <div class='col-md-12 mt-3'>
                <button class='btn btn-primary' name='submit'>Save Entry</button>
            </div>
        </div>
    </form>
</div>

<?php include 'footer.php';
?>