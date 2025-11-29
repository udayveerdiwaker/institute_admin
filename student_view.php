<?php
// student_view.php
include 'connection.php';
include 'sidebar.php';

if ( !isset( $_GET[ 'id' ] ) ) {
    header( 'Location: all_students.php' );
    exit;
}
$student_id = ( int ) $_GET[ 'id' ];

// Fetch student + course
$sq = "SELECT s.*, c.course AS course_name FROM students s LEFT JOIN courses c ON s.course_id = c.id WHERE s.id = $student_id LIMIT 1";
$res = mysqli_query( $conn, $sq );
if ( !$res || mysqli_num_rows( $res ) == 0 ) {
    echo "<div class='main-content container mt-4'>Student not found.</div>";
    include 'footer.php';
    exit;
}
$student = mysqli_fetch_assoc( $res );

// Fetch payments ( history )
$fees_q = "SELECT * FROM student_fees WHERE student_id = $student_id ORDER BY created_at DESC";
$fees_res = mysqli_query( $conn, $fees_q );

// Compute totals
$sumQ = mysqli_query( $conn, "SELECT SUM(paid_amount) AS total_paid, MAX(total_fee) AS total_fee FROM student_fees WHERE student_id = $student_id" );
$sumR = mysqli_fetch_assoc( $sumQ );
$total_paid = ( float )( $sumR[ 'total_paid' ] ?? 0 );
$total_fee = ( float )( $sumR[ 'total_fee' ] ?? 0 );
$overall_remaining = $total_fee - $total_paid;
?>

<link rel='stylesheet' href='assets/student_view.css'>

<div class='main-content'>
    <div class='row g-4'>

        <!-- LEFT COLUMN -->
        <div class='col-lg-4 col-md-5'>
            <div class='card p-3 text-center'>

                <img src="<?= !empty($student['photo']) ? htmlspecialchars($student['photo']) : 'student_img/default.png' ?>"
                    class='profile-img mx-auto' alt='photo'>

                <h4 class='mt-3'>
                    <?php echo htmlspecialchars( $student[ 'student_name' ] );
?>
                </h4>
                <p class='text-muted'>
                    <?php echo htmlspecialchars( $student[ 'course_name' ] );
?>
                </p>

                <ul class='list-group list-group-flush text-start mt-3'>
                    <li class='list-group-item'><strong>Father:</strong>
                        <?php echo htmlspecialchars( $student[ 'father_name' ] );
?>
                    </li>
                    <li class='list-group-item'><strong>DOB:</strong>
                        <?php echo htmlspecialchars( $student[ 'dob' ] );
?>
                    </li>
                    <li class='list-group-item'><strong>Phone:</strong>
                        <?php echo htmlspecialchars( $student[ 'phone' ] );
?>
                    </li>
                    <li class='list-group-item'><strong>Email:</strong>
                        <?php echo htmlspecialchars( $student[ 'email' ] );
?>
                    </li>
                    <li class='list-group-item'><strong>Address:</strong>
                        <?php echo nl2br( htmlspecialchars( $student[ 'address' ] ) );
?>
                    </li>
                </ul>

                <!-- Buttons -->
                <div class='action-buttons mt-3 d-grid'>
                    <a href="student_edit.php?id=<?= $student['id'] ?>" class='btn btn-warning'>Edit Student</a>
                    <a href="student_delete.php?id=<?= $student['id'] ?>" class='btn btn-danger'
                        onclick="return confirm('Delete this student?')">Delete Student</a>
                </div>

            </div>
        </div>

        <!-- RIGHT COLUMN -->
        <div class='col-lg-8 col-md-7'>

            <!-- Course Details -->
            <div class='card p-3 mb-3'>
                <h5>Course & Admission</h5>
                <div class='row mt-2'>

                    <div class='col-sm-6 summary-box'>
                        <strong>Course:</strong>
                        <?php echo htmlspecialchars( $student[ 'course_name' ] );
?>
                    </div>

                    <div class='col-sm-6 summary-box'>
                        <strong>Batch Time:</strong>
                        <?php echo htmlspecialchars( $student[ 'batch_time' ] );
?>
                    </div>

                    <div class='col-sm-6 summary-box'>
                        <strong>Duration:</strong>
                        <?php echo htmlspecialchars( $student[ 'duration' ] );
?>
                    </div>

                    <div class='col-sm-6 summary-box'>
                        <strong>Admission Date:</strong>
                        <?php echo htmlspecialchars( $student[ 'admission_date' ] );
?>
                    </div>

                </div>
            </div>

            <!-- Fees Summary -->
            <div class='card p-3 mb-3'>
                <div class='d-flex flex-wrap justify-content-between align-items-center'>
                    <h5>Fees Summary</h5>

                    <div class='d-flex flex-wrap gap-2'>
                        <a href="add_fees.php?student_id=<?= $student_id ?>" class='btn btn-sm btn-primary'>Add
                            Payment</a>
                        <a href="remaining.php?student_id=<?= $student_id ?>" class='btn btn-sm btn-info'>Add
                            Remaining</a>
                        <a href="combined_receipt.php?student_id=<?= $student_id ?>" target='_blank'
                            class='btn btn-sm btn-success'>Receipt</a>
                        <a href="combined_receipt_pdf.php?student_id=<?= $student_id ?>" target='_blank'
                            class='btn btn-sm btn-danger'>PDF</a>
                    </div>
                </div>

                <div class='row mt-3'>

                    <div class='col-md-6 summary-box'>
                        <strong>Total Fee:</strong> ₹<?php echo number_format( $total_fee );
?>
                    </div>

                    <div class='col-md-6 summary-box'>
                        <strong>Total Paid:</strong> ₹<?php echo number_format( $total_paid );
?>
                    </div>

                    <div class='col-md-6 summary-box'>
                        <strong>Remaining:</strong> ₹<?php echo number_format( $overall_remaining );
?>
                    </div>

                </div>
            </div>

            <!-- Payment History -->
            <div class='card p-3'>
                <h5>Payments History</h5>

                <div class='table-responsive mt-2'>
                    <table class='table table-bordered table-sm text-center'>
                        <thead class='table-light'>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Paid</th>
                                <th>Previous</th>
                                <th>Remaining</th>
                                <th>Mode</th>
                                <th>Remarks</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$counter = 1;

while ( $fee = mysqli_fetch_assoc( $fees_res ) ) {
    $row_remaining = isset( $fee[ 'remaining' ] ) ? $fee[ 'remaining' ] : ( ( $fee[ 'total_fee' ] ?? 0 ) - ( $fee[ 'paid_amount' ] ?? 0 ) );

    echo "<tr>
        <td>" . $counter++ . "</td>
        <td>" . htmlspecialchars( $fee[ 'created_at' ] ) . "</td>
        <td>₹" . number_format( $fee[ 'paid_amount' ] ) . "</td>
        <td>₹" . number_format( $fee[ 'prev_fee' ] ) . "</td>
        <td>₹" . number_format( $row_remaining, 2 ) . "</td>
        <td>" . htmlspecialchars( $fee[ 'payment_mode' ] ) . "</td>
        <td>" . htmlspecialchars( $fee[ 'remarks' ] ) . "</td>

        <td>
            <a href='edit_fee.php?id=" . $fee[ 'id' ] . "' class='btn btn-sm btn-warning mb-1'><i class='bi bi-pencil-square'></i></a>
            <a href='delete_fee.php?id=" . $fee[ 'id' ] . '&student_id=' . $student_id . "' class='btn btn-sm btn-danger mb-1' onclick=\"return confirm( 'Delete this payment?' )\"><i class='bi bi-trash'></i></a>
        </td>
    </tr>";
}
?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>
</div>

<?php include 'footer.php';
?>