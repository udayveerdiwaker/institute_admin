<?php
include 'session.php';

$id = $_GET[ 'id' ];
mysqli_query( $conn, "DELETE FROM guests WHERE id=$id" );

header( 'Location: guest_list' );
exit;
?>