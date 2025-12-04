<?php
// session.php
session_start();

// Simple admin login check ( call include 'session.php' on pages that require admin )
if ( !isset( $_SESSION[ 'admin_logged' ] ) || $_SESSION[ 'admin_logged' ] !== true ) {
    // redirect to admin login
    header( 'Location: login.php' );
    exit;
}