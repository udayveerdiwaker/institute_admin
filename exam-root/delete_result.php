<?php
include 'session.php';

$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM result WHERE id='$id'");

header("Location: results?msg=deleted");
exit;