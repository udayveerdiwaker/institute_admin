<?php
session_start();
include 'connection.php';

$username = mysqli_real_escape_string( $conn, $_POST[ 'username' ] );
$password = $_POST[ 'password' ];

$sql = "SELECT * FROM admin_users WHERE username='$username' LIMIT 1";
$res = mysqli_query( $conn, $sql );

if ( $res && mysqli_num_rows( $res ) > 0 ) {
    $row = mysqli_fetch_assoc( $res );

    // verify password
    if ( hash( 'sha256', $password ) === $row[ 'password' ] ) {

        // set session
        $_SESSION[ 'admin_logged' ] = true;
        $_SESSION[ 'admin_user' ] = $row[ 'username' ];

        // remember me cookie
        if ( isset( $_POST[ 'remember' ] ) ) {
            setcookie( 'admin_user', $row[ 'username' ], time() + ( 86400 * 30 ), '/' );
        }

        header( 'Location: dashboard.php' );
        exit;
    }
}

header( 'Location: login.php?error=Invalid Username or Password' );
exit;