<?php
session_start();
include 'connection.php';

// Static login ( as you said )
$static_user = 'website';
$static_pass = 'websitebanye';

$user = $_POST[ 'username' ];
$pass = $_POST[ 'password' ];

if ( $user === $static_user && $pass === $static_pass ) {

    $_SESSION[ 'admin_logged' ] = true;
    $_SESSION[ 'admin_user' ] = $user;

    // Cookies for 7 days
    if ( isset( $_POST[ 'remember' ] ) ) {
        setcookie( 'admin_username', $user, time() + ( 7 * 24 * 60 * 60 ) );
        setcookie( 'admin_password', $pass, time() + ( 7 * 24 * 60 * 60 ) );
    }

    header( 'Location: dashboard.php' );
    exit();

} else {
    echo "<script>alert('Invalid Login'); window.location='login.php';</script>";
}
?>