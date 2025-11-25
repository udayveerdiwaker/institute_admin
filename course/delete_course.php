<?php
include '../connection.php';
$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM courses WHERE id=$id");
header("Location: course_list.php");
exit;
?>