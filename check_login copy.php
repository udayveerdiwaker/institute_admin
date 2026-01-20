<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'student') {
    header("Location: login.php");
    exit;
}

// dashboard.php - full UI + PHP + Charts (monthly & yearly)
// Turn on errors for debugging (remove in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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