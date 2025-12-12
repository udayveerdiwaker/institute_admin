<?php
include "connection.php";

$id = (int)$_GET['id'];

mysqli_query($conn, "DELETE FROM expenses WHERE id=$id");

header("Location: expense_list.php");
exit;
?>