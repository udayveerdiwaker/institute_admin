<?php
session_start();
session_unset();
header("location:http://localhost/institute_admin/login.php");
?>