<?php
include 'connection.php';

if ( $_POST ) {
    $gname = $_POST[ 'guest_name' ];
    $phone = $_POST[ 'phone' ];
    $addr = $_POST[ 'address' ];
    $purpose = $_POST[ 'purpose' ];
    $date = $_POST[ 'visit_date' ];
    $time = $_POST[ 'visit_time' ];
    $comment = $_POST[ 'comments' ];
    $attend = $_POST[ 'attended_by' ];

    $sql = "INSERT INTO guest_entries 
    (guest_name, phone, address, purpose, visit_date, visit_time, comments, attended_by)
    VALUES ('$gname','$phone','$addr','$purpose','$date','$time','$comment','$attend')";

    mysqli_query( $conn, $sql );
}

header( 'Location: list_guest.php' );
exit;