<div class='main-content'>
    <h3>Add Guest Entry</h3>

    <?php
include 'session.php';

if ( isset( $_POST[ 'submit' ] ) ) {
    $name = $_POST[ 'guest_name' ];
    $phone = $_POST[ 'phone' ];
    $address = $_POST[ 'address' ];
    $purpose = $_POST[ 'purpose' ];
    $lead_type = $_POST[ 'lead_type' ];
    $date = $_POST[ 'visit_date' ];
    $time = $_POST[ 'visit_time' ];
    $comments = $_POST[ 'comments' ];
    $attended = $_POST[ 'attended_by' ];

    $insert = "INSERT INTO guests (guest_name, phone, address, purpose, lead_type, visit_date, visit_time, comments, attended_by)
                   VALUES ('$name','$phone','$address','$purpose','$lead_type','$date','$time','$comments','$attended')";

    if ( mysqli_query( $conn, $insert ) ) {
        header( 'Location: guest_list' );
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

            <div class="col-md-6">
                <label>Guest Type</label>
                <select name="lead_type" class="form-control" required>
                    <option value="">-- Select --</option>
                    <option value="Hot" class="text-danger">Hot</option>
                    <option value="Cold" class="text-info">Cold</option>
                    <option value="Close" class="text-primary">Close</option>
                    <option value="Success" class="text-success">Success</option>
                </select>
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