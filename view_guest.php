<?php
include 'sidebar.php';

$id = $_GET[ 'id' ];
$q = mysqli_query( $conn, "SELECT * FROM guests WHERE id=$id" );
$data = mysqli_fetch_assoc( $q );
?>

<div class='main-content'>
    <div class='container mt-4'>

        <div class='card p-4 shadow-lg'>
            <h4>Guest Details</h4>
            <hr>

            <p><strong>Name:</strong>
                <?php echo $data[ 'guest_name' ];
?>
            </p>
            <p><strong>Phone:</strong>
                <?php echo $data[ 'phone' ];
?>
            </p>
            <p><strong>Address:</strong>
                <?php echo $data[ 'address' ];
?>
            </p>
            <p><strong>Purpose:</strong>
                <?php echo $data[ 'purpose' ];
?>
            </p>
            <p><strong>Date:</strong>
                <?php echo $data[ 'visit_date' ];
?>
            </p>
            <p><strong>Time:</strong>
                <?php echo $data[ 'visit_time' ];
?>
            </p>
            <p><strong>Final Comments:</strong>
                <?php echo $data[ 'comments' ];
?>
            </p>
            <p><strong>Attended By:</strong>
                <?php echo $data[ 'attended_by' ];
?>
            </p>

            <a href='list_guest.php' class='btn btn-secondary mt-3'>Back</a>
        </div>

    </div>
</div>

<?php include 'footer.php';
?>