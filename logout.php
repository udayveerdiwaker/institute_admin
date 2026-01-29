<?php
session_start();

/* Unset all session variables */
$_SESSION = [];

/* Destroy the session */
session_destroy();

/* Delete cookie if exists */
if (isset($_COOKIE['student'])) {
    setcookie('student', '', time() - 3600, '/', '', false, true);
}
if (isset($_COOKIE['exam_user'])) {
    setcookie('exam_user', '', time() - 3600, '/', '', false, true);
}


/* Redirect to login page (without .php if using htaccess) */
header("Location: login");
exit;