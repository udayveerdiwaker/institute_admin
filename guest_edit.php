<?php
include 'connection.php';
$id = $_GET[ 'id' ];
$q = mysqli_query( $conn, "SELECT * FROM guests WHERE id=$id" );
$data = mysqli_fetch_assoc( $q );
?>

<div class='main-content'>
    <h3>Edit Guest Entry</h3>

    <?php
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

    $up = "UPDATE guests SET
                guest_name='$name',
                phone='$phone',
                address='$address',
                purpose='$purpose',
                lead_type='$lead_type',
                visit_date='$date',
                visit_time='$time',
                comments='$comments',
                attended_by='$attended'
               WHERE id=$id";

    if ( mysqli_query( $conn, $up ) ) {
        header( "Location: guest_list.php?id=$id" );
        exit;
    } else {
        $err = mysqli_error( $conn );
    }
}
include 'sidebar.php';

?>

    <form method='POST'>

        <div class='row g-3'>

            <div class='col-md-6'>
                <label>Guest Name</label>
                <input type='text' name='guest_name' value="<?php echo $data['guest_name'] ?>" class='form-control'>
            </div>

            <div class='col-md-6'>
                <label>Phone</label>
                <input type='text' name='phone' value="<?php echo $data['phone'] ?>" class='form-control'>
            </div>

            <div class='col-md-12'>
                <label>Address</label>
                <textarea name='address' class='form-control'><?php echo $data[ 'address' ] ?></textarea>
            </div>

            <div class='col-md-6'>
                <label>Purpose</label>
                <input type='text' name='purpose' value="<?php echo $data['purpose'] ?>" class='form-control'>
            </div>
            <div class="col-md-6">
                <label>Guest Type</label>
                <select name="lead_type" class="form-control" required>
                    <option value="">-- Select --</option>
                    <option value="Hot" style="color:red;">Hot</option>
                    <option value="Cold" style="color:green;">Cold</option>
                </select>
            </div>

            <div class='col-md-3'>
                <label>Date</label>
                <input type='date' name='visit_date' value="<?php echo $data['visit_date'] ?>" class='form-control'>
            </div>

            <div class='col-md-3'>
                <label>Time</label>
                <input type='time' name='visit_time' value="<?php echo $data['visit_time'] ?>" class='form-control'>
            </div>

            <div class='col-md-12'>
                <label>Comments</label>
                <textarea name='comments' class='form-control'><?php echo $data[ 'comments' ] ?></textarea>
            </div>

            <div class='col-md-6'>
                <label>Attended By</label>
                <input type='text' name='attended_by' value="<?php echo $data['attended_by'] ?>" class='form-control'>
            </div>

            <div class='col-md-12'>
                <button class='btn btn-primary' name='submit'>Update</button>
            </div>

        </div>

    </form>

</div>

<?php include 'footer.php';
?>