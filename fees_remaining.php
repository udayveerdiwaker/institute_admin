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

if ( !isset( $_GET[ 'student_id' ] ) ) {
    header( 'Location: fees_list.php' );
    exit;
}
$student_id = ( int )$_GET[ 'student_id' ];

// fetch student and course info
$sq = mysqli_query( $conn, "SELECT s.*, c.course, c.fees AS course_fee FROM students s LEFT JOIN courses c ON s.course_id = c.id WHERE s.id = $student_id" );
$student = mysqli_fetch_assoc( $sq );

// compute total paid so far
$sumQ = mysqli_query( $conn, "SELECT SUM(paid_amount) AS total_paid FROM student_fees WHERE student_id = $student_id" );
$sumR = mysqli_fetch_assoc( $sumQ );
$total_paid = ( float )( $sumR[ 'total_paid' ] ?? 0 );
$total_fee = ( float )$student[ 'course_fee' ];
$remaining = $total_fee - $total_paid;

$msg = '';
if ( isset( $_POST[ 'submit' ] ) ) {
    $new_pay = ( float )$_POST[ 'new_payment' ];
    $date = mysqli_real_escape_string( $conn, $_POST[ 'fees_date' ] );
    $mode = mysqli_real_escape_string( $conn, $_POST[ 'payment_mode' ] );
    $remarks = mysqli_real_escape_string( $conn, $_POST[ 'remarks' ] );

    if ( $new_pay <= 0 ) {
        $msg = "<div class='alert alert-danger'>Enter a valid amount</div>";
    } elseif ( $new_pay > $remaining ) {
        $msg = "<div class='alert alert-danger'>Cannot pay more than remaining</div>";
    } else {
        // prev_fee = total paid before this new payment
        $prev_fee = $total_paid;

        // ❗ FIX: calculate NEW remaining ( remaining after this payment )
        $new_remaining = $remaining - $new_pay;

        $ins = "INSERT INTO student_fees 
                (student_id, course_id, total_fee, paid_amount, prev_fee, remaining, payment_mode, remarks, fees_date)
                VALUES 
                ('$student_id','{$student['course_id']}','$total_fee','$new_pay','$prev_fee','$new_remaining','$mode','$remarks','{$date}')";

        mysqli_query( $conn, $ins );

        header( "Location: fees_view.php?student_id=$student_id" );
        exit;
    }
}
include 'sidebar.php';

?>

<div class='main-content'>
    <div class='container mt-4'>
        <div class='card shadow-sm p-4'>
            <h4>Add Payment — <?php echo htmlspecialchars( $student[ 'student_name' ] );
?>
            </h4>
            <?php echo $msg;
?>

            <div class='row mb-3'>
                <div class='col-md-4'><strong>Course:</strong>
                    <?php echo htmlspecialchars( $student[ 'course' ] );
?>
                </div>
                <div class='col-md-4'><strong>Total Fee:</strong> ₹<?php echo number_format( $total_fee, 2 );
?>
                </div>
                <div class='col-md-4'><strong>Already Paid:</strong> ₹<?php echo number_format( $total_paid, 2 );
?>
                </div>
            </div>

            <form method='post'>
                <div class='row g-3'>
                    <div class='col-md-4'>
                        <label class='form-label'>New Payment ( ₹ )</label>
                        <input type='number' step='0.01' name='new_payment' class='form-control' required>
                    </div>

                    <div class='col-md-4'>
                        <label class='form-label'>Payment Mode</label>
                        <select name='payment_mode' class='form-control'>
                            <option>Cash</option>
                            <option>Online</option>
                            <option>Cheque</option>
                        </select>
                    </div>

                    <div class='col-md-4'>
                        <label class='form-label'>Remarks</label>
                        <input type='text' name='remarks' class='form-control'>
                    </div>
                    <div class='col-md-4'>
                        <label class='form-label'>Date</label>
                        <input type='date' name='fees_date' class='form-control'>
                    </div>

                    <div class='col-12 mt-3'>
                        <button class='btn btn-primary' name='submit'>Add Payment</button>
                        <a href='fees_list.php' class='btn btn-secondary'>Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php';
?>