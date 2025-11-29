<?php
include 'sidebar.php';
?>

<div class='main-content '>
    <h3>Guest List</h3>

    <a href='add_guest.php' class='btn btn-success mb-3'>+ Add Guest</a>

    <table class='table table-bordered table-striped'>
        <thead>
            <tr>
                <th>#</th>
                <th>Guest Name</th>
                <th>Phone</th>
                <th>Purpose</th>
                <th>Date</th>
                <th>Time</th>
                <th>Attended By</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
$i = 1;
$q = mysqli_query( $conn, 'SELECT * FROM guests ORDER BY id DESC' );
while( $row = mysqli_fetch_assoc( $q ) ) {
    ?>
            <tr>
                <td>
                    <?php echo $i++;
    ?>
                </td>
                <td>
                    <?php echo $row[ 'guest_name' ];
    ?>
                </td>
                <td>
                    <?php echo $row[ 'phone' ];
    ?>
                </td>
                <td>
                    <?php echo $row[ 'purpose' ];
    ?>
                </td>
                <td>
                    <?php echo $row[ 'visit_date' ];
    ?>
                </td>
                <td>
                    <?php echo $row[ 'visit_time' ];
    ?>
                </td>
                <td>
                    <?php echo $row[ 'attended_by' ];
    ?>
                </td>

                <td>
                    <a href="view_guest.php?id=<?= $row['id'] ?>" class='btn btn-info btn-sm'>View</a>
                    <a href="edit_guest.php?id=<?= $row['id'] ?>" class='btn btn-primary btn-sm'>Edit</a>
                    <a href="delete_guest.php?id=<?= $row['id'] ?>" class='btn btn-danger btn-sm '
                        onclick="return confirm('Delete this student?')">Delete</a>
                </td>
            </tr>
            <?php }
    ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php';
    ?>