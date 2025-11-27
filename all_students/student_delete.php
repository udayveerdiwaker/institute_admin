<?php
include '../connection.php';
if ( !isset( $_GET[ 'id' ] ) ) {
    header( 'Location: all_students.php' );
    exit;
}
$id = ( int ) $_GET[ 'id' ];

// delete student fees first ( optional )
mysqli_query( $conn, "DELETE FROM student_fees WHERE student_id = $id" );

// delete student
mysqli_query( $conn, "DELETE FROM students WHERE id = $id" );

header( 'Location: all_students.php' );
exit;