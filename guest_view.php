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
            <?php 
            if ($data['lead_type'] == 'Hot') {
                $badge_class = 'danger';
            } elseif ($data['lead_type'] == 'Cold') {
                $badge_class = 'info';
            } elseif ($data['lead_type'] == 'Close') {
                $badge_class = 'primary';
            } elseif ($data['lead_type'] == 'Success') {
                $badge_class = 'success';
            } else {
                $badge_class = 'secondary';
            }
            ?>
            <p><strong>Guest Type:</strong>
                <span class="badge bg-<?= $badge_class ?>">
                    <?php echo $data[ 'lead_type' ]; ?>
                </span>
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

            <a href='guest_list.php' class='btn btn-secondary mt-3'>Back</a>
        </div>

    </div>
</div>

<?php include 'footer.php';
?>