<?php
// delete_exam.php
include 'connection.php';
// adjust path if needed
// include '../session.php';
// only if you use session check

if ( !isset( $_GET[ 'id' ] ) || empty( $_GET[ 'id' ] ) ) {
    header( 'Location: list_exam.php?msg=invalid' );
    exit;
}

$exam_id = ( int ) $_GET[ 'id' ];

// Check exam exists
$check = mysqli_query( $conn, "SELECT id FROM exams WHERE id = $exam_id LIMIT 1" );

if ( !$check || mysqli_num_rows( $check ) == 0 ) {
    header( 'Location: list_exam.php?msg=not_found' );
    exit;
}

// Delete exam
$del = mysqli_query( $conn, "DELETE FROM exams WHERE id = $exam_id" );

if ( $del ) {
    header( 'Location: list_exam.php?msg=deleted' );
    exit;
} else {
    header( 'Location: list_exam.php?msg=error' );
    exit;
}
?>